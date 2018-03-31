<?php
abstract class BaseModel{
	protected $db_arr = [
			"host" => "localhost",
			"port" =>3306,
			"db_name" => "itcast",
			"db_user" => "root",
			"db_passed" => "123456",
			"db_charset" => "utf8",
	];
	protected $db = null;

	public function __construct(){
		$this->db = Db::get_instance($this->db_arr);
	}
	public function fetchAll($sql){
		// $sql = "select * from ".$this->db_arr['table_name'];
		return $res=$this->db->fetch_all($sql,3);
	}
	public function fetchOne($sql){
		return $res=$this->db->fetch_one($sql,3);
	}
	public function allRows(){
		$sql = "select count(*) from ". $this->db_arr['table_name'];
		$res = $this->db->fetch_one($sql, 1);
		return $res[0];
	}
	public function update($arr, $id){
		$str = "";
		foreach($arr as $key=>$value){
			$str .= "$key='$value',"; 
		}
		$str = rtrim($str,",");
		$sql = "update ". $this->db_arr['table_name']." set " .$str . " where nid =$id";
		return $this->db->exec($sql);
	}

	public function insert($arr){
		$str = "";
		$arr['addate'] = !empty($arr['addate']) ? $arr['addate'] : time();
		foreach($arr as $key=>$value){
			$str .= "$key='$value',"; 
		}
		$str = rtrim($str,",");
		$sql = "insert into ". $this->db_arr['table_name']." set " .$str;
		return $this->db->exec($sql);
	}
}
?>