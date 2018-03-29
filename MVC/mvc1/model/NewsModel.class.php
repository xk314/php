<?php
require_once "../libs/Db.class.php";

final class NewsModel{
	private $db_arr = [
			"host" => "localhost",
			"port" =>3306,
			"db_name" => "itcast",
			"table_name" => "news",
			"db_user" => "root",
			"db_passed" => "123456",
			"db_charset" => "utf8",
	];
	private $db = null;

	public function __construct($arr = []){
		$this->db = Db::get_instance($this->db_arr);
	}
	public function delete($id){
		$sql = "delete from ". $this->db_arr['table_name']." where nid= $id";
		return $this->db->exec($sql);
	}
	public function fetchAll($sql){
		// $sql = "select * from ".$this->db_arr['table_name'];
		return $res=$this->db->fetch_all($sql,3);
	}
	public function fetchOne($sql){
		return $res=$this->db->fetch_one($sql,3);
	}


	public function allRows(){
		$sql = "select count(*) from student";
		$res = $this->db->fetch_one($sql, 1);
		return $res[0];
	}


}
?>