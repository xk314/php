<?php

// $db_arr = [
// 			"host" => "localhost",
// 			"port" =>3306,
// 			"db_name" => "itcast",
// 			"table_name" => "";
// 			"db_user" => "root",
// 			"db_passed" => "123456",
// 			"db_charset" => "utf8",
// 	];
	final class Db{
		private static $db = null;
		private $host;
		private $port;
		private $db_name;
		private $table_name;
		private $db_user;
		private $db_passed;
		private $db_charset;
		private $db_link;
		private function __construct($config=[]){
			$this->host = isset($config["host"]) ? $config["host"] : "localhost";
			$this->post = isset($config["port"]) ? $config["port"] : 3306;
			$this->db_charset = isset($config["db_charset"]) ? $config["db_charset"] : "utf8";
			$this->db_name = isset($config["db_name"]) ? $config["db_name"] : die("未选择数据库！");
			$this->db_user = isset($config["db_user"]) ? $config["db_user"] : die("未指定用户名！");
			$this->db_passwd = isset($config["db_passed"]) ? $config["db_passed"] : die("为指定密码！");
			$this->db_link = $this->connect();
			$this->db_select();
			$this->db_setcharset();	
		}
		private function __clone(){
			return "当前对象不支持克隆！";
		}
		private function db_select(){
			mysql_select_db($this->db_name, $this->db_link) || die("选择数据库失败！");
		}
		private function db_setcharset(){
			$sql = "set names ". $this->db_charset;
			$this->exec($sql) || die("设置字符集失败！");
		}
		public function exec($sql){
			$sql = strtolower($sql);
			//die($sql);
			substr($sql, 0, 6) !== "select" || die("该函数不支持select语句!");
			return mysql_query($sql, $this->db_link);
		}
		private function connect(){
			$db_link = @mysql_connect($this->host.":".$this->port, $this->db_user, $this->db_passwd);
			return !$db_link ? die("数据库连接失败！") : $db_link;
		}

		public static function get_instance($db_arr){
			empty($db_arr) && die("不完整的数据库信信息！");
			return self::$db instanceof self ? self::$db : self::$db=new self($db_arr);
		}

		private function query($sql){
			$sql = strtolower($sql);
			substr($sql, 0, 6) !== "select" && die("该函数不支持非select语句！");
			return mysql_query($sql, $this->db_link);
		}

		public function fetch_all($sql, $arr_type=3){
			$result = $this->query($sql);
			$result===false && die("查询失败！");
			$types = array(
				1 => MYSQL_NUM,
				2 => MYSQL_BOTH,
				3 => MYSQL_ASSOC
			);
			$res = [];
			while($line = mysql_fetch_array($result, $arr_type[$arr_type])){
				$res[] = $line;
			}
			mysql_free_result($result);
			return $res;	
		}

		public function fetch_one($sql, $arr_type=3){
			$result = $this->query($sql);
			$result ===false && die("111查询失败！");
			$types = array(
				1 => MYSQL_NUM,
				2 => MYSQL_BOTH,
				3 => MYSQL_ASSOC
			);
			return mysql_fetch_array($result, $types[$arr_type]);
		}

		public function fetch_res_num($sql){
			$res = $this->fetch_all($sql);
			return count($res);

		}

		public function close(){
			mysql_close($this->db_link);
			self::$db = NULL;
		}
	}
?>