<?php
namespace Frame;
abstract class Frame{
	public static function run(){
		self::initCharset(); //设置响应头信息
		self::initConfig();  //加载相应应用的配置文件
		self::initRoute();    //接受地址栏参数，完成路由常量初始化
		self::initConst();   //设置本次应用的目录信息
		self::initAutoLoad();  //注册类自动加载函数
		self::initDispatch();  //根据本次请求地址栏中的参数来将请求分发给对应控制器的对应方法
	}

	private static function initCharset(){
		header("content-type:text/html;charset=utf-8");
		session_start(['cookie_lifetime'=>300,
			'read_and_close'=>true,]);
		session_save_path(ROOT_PATH."Public".DS."session".DS);
		//设置本次响应的头信息
	}

	private static function initConfig(){
		//从当前应用的配置目录中获取其对应的数据库配置和默认路由配置信息,并将其导入到全局变量中
		$GLOBALS['config'] = require_once(APP_PATH.DS."Conf".DS."Config.php");
	}

	private static function initRoute(){
		//根据地址栏参数及对应应用的配置信息，将本次具体的路由参数设置为常量
		$p = isset($_GET['p']) ? $_GET['p'] : $GLOBALS['config']['default_platform'];
		$c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['default_controller'];
		$a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'];
		isset($_GET['page']) &&define("PAGE", $_GET['page']);;
		define("PLAT", $p);
		define("CONTROLLER", $c);
		define("ACTION", $a);
	}

	private static function initConst(){
		//将本次响应处理过程中需要多次用到的数据常量化
		define("FRAME_PATH", ROOT_PATH."Frame".DS);//将框架目录常量化
		define("VIEW_PATH", APP_PATH."View".DS);//将本次应用的控制器对应的视图目录常量化，视图文件与控制器的方法名同名
		//访问常量时一定不要使用引号
	}

	private static function initAutoLoad(){
		//注册类自动加载函数。每个类的都必须定义在对应的命名空间中，
		//这个命名空间的名字和该类文件相对于ROOT_PATH的路径同名。
		spl_autoload_register(function($className){
			$file_path = ROOT_PATH.str_replace("\\", DS, $className).".class.php";
			file_exists($file_path) && require_once($file_path);
		});
	}

	private static function initDispatch(){
		//根据本次请求的应用名(平台名)，控制器名来构造本次控制器对应的控制器类名(命名空间下的形式)
		$controllerClassName = "\\".PLAT."\\"."Controller"."\\".CONTROLLER."Controller";
		$action = ACTION;
		$controller = new $controllerClassName;
		//根据本次请求的地址栏参数和应用对应的默认配置来调用对应控制器对象的对应方法。
		$controller->$action();

	}
}

