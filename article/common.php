<?php
	//header("content-type:text/html;charset=utf8");
	// $arr = [
	// 	"host" => "localhost:3306",
	// 	"user" => "root",
	// 	"passwd" => 123456,
	// 	"db" => "article",
	// 	"charset" => "utf8",
	// ];
	include "conf.php";
	/**
	 * [connect description]
	 * @param  array  $arr [description]
	 * @return [type]      [description]
	 */
	function connect($arr=[]){
		if(empty($arr)){
			return "请输入连接数据库必须的信息！";
		}
		($link = @mysql_connect($arr["host"], $arr["user"], $arr["passwd"])) || die("连接数据库失败！");
		//数据库连接成功后，返回一个mysql link资源类型的数值。失败是返回false
		//前面不加括号时，在连接数据库失败时，$link 中的值为true
		 mysql_query("set names ".$arr["charset"], $link) || die("设置字符集失败！");
		//返回值为真假
		mysql_query("use ".$arr["db"], $link) || die("选择数据库失败！");
		return $link;
	}
	$link = connect($db_arr);




	function redirect($url="", $msg="", $time=3){
		header("refresh:$time,url='$url'");
		die("<h2>$msg".",".$time."秒后离开！"."</h2>");
	}


	function judge_upload_file($up_file, $SAVE_DIR = "./upload"){
		
		if(!empty($upload_file_seting)){
				//对上传文件进行判断
		}
		if($up_file["error"] != 0){
			$error_msg = "";
			switch ($up_file["error"]) {
				case 1: $error_msg = "文件超过2M"; break;
				case 3: $error_msg = "文件部分上传"; break;
				case 4: $error_msg = "未选择文件"; break;
				case 6: $error_msg = "临时目录出错"; break;
				case 7: $error_msg = "写入失败"; break;
			}
		return ["error_msg" => $error_msg, "save_path" =>""];
		}
		$save_sub_dir = date("Y-m");
		file_exists($SAVE_DIR."/".$save_sub_dir) || mkdir($SAVE_DIR."/".$save_sub_dir) || die("创建目录$save_sub_dir失败！");
		$file_type = strrchr($up_file["name"], ".");
		$save_name = uniqid("article__", true).$file_type;
		//echo "$SAVE_DIR"."$save_name";
		$save_path = $SAVE_DIR."/".$save_sub_dir."/".$save_name;
		if(@move_uploaded_file($up_file["tmp_name"], $save_path)){
			return ["error_msg" => "", "save_path" => $save_path];
		}else{
			return ["error_msg" => "移动文件失败！", "save_path" =>""];
		}

	}


function create_code($len=4,$w=100,$h=40){		
		$item = array_merge(range(0,9), range("a","z"), range("A", "Z"));
		$index_arr = array_rand($item, $len);
		$v_arr = array_map( function($k) use($item){return $item[$k]; },$index_arr);
		$code =implode($v_arr);//构造出含有4个随机数字或字母的字符串
		$image = imagecreatetruecolor($w, $h);
		$font_color = imagecolorallocate($image, mt_rand(0,180),mt_rand(0,180),mt_rand(0,180));
		$bg_color = imagecolorallocate($image, mt_rand(190,250),mt_rand(190,250),mt_rand(190,250));
		$font = 20;
		$length=strlen($code);
		$font_file='./fonts/8.ttf';//保存字体文件的目录需放在当前目录下
		$start_x = ($w-$font*$len)/2;
		imagefill($image, 0, 0, $bg_color);
		for($i=0; $i<$length; $i++){
			imagettftext($image, $font, rand(-40,40),$start_x+$font*$i,30,$font_color,$font_file,$code[$i]);
		}
		for($i=0; $i<200; $i++)
			imagesetpixel($image, mt_rand(0, $w), mt_rand(0, $h),$font_color);
		for($i=0; $i<7; $i++){
			$j = mt_rand(0,360);
			imagearc($image, mt_rand(0,$w), mt_rand(0,$h),mt_rand(0,$w),mt_rand(0,$w),mt_rand($j,$j+5),mt_rand($j,$j+5),$font_color);
		}
		header("content-type:image/png");
		imagepng($image);
		imagedestroy($image);

	}

final class Page {
	private $page_total_num = 0;
	private $now_page_index = 0;
	//private $page_size = 0;
	private $url = "";

	public function __construct($page_total_num, $now_page_index, $url){
		$this->page_total_num = $page_total_num;
		$this->now_page_index = $now_page_index;
		$this->url = $url;
	}
	public function echo_js(){
		$str = "<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css'>";
		$str1 = "<script type='text/javascript' src='bootstrap/js/jq.js'></script>";
		$str2 = "<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>";
		$str3 = "<script type='text/javascript'>";
		$str4 = "window.onload = function(){
			var id = document.cookie.split('='')[1];
			document.getElementById(id).style.color='red';
			}
			</script>";
		echo $str.$str1.$str2.$str3.$str4;
	}

	public function show_page(){
		$str = "<ul class='pager'>";
		$str .= "<li><a href='$this->url?page=1'>首页</a></li>";
		$page_index = $this->now_page_index==1 ? 1:$this->now_page_index-1;
		
		$str .= "<li><a href='$this->url?page=$page_index'>上一页</a></li>";
		echo $str;
		for($i=1; $i<=$this->page_total_num; $i++){
				if($i>$this->page_total_num ) break;
				if(abs($i-$this->now_page_index)<=3 ||($i<=7 && $this->now_page_index<4))
					echo "<li><a id=$i href='$this->url?page=$i'>$i</a></li>";
		}
		$page_index = $this->now_page_index==$this->page_total_num? $this->page_total_num:$this->now_page_index+1;
		echo "<li><a href='$this->url?page=$this->page_total_num'>下一页</a></li>";
		echo "<li><a href='$this->url?page=$this->page_total_num'>尾页</a></li></ul>";

	}

}
?>


