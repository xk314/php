<?php
require_once "BaseModel.class.php";
final class StudentModel extends BaseModel{
	public function __construct(){
		parent::__construct();
		$this->db_arr['table_name'] = "student";
	}
	public function delete($id){
		$sql = "delete from ". $this->db_arr['table_name']." where id= $id";
		return $this->db->exec($sql);
	
	}

	public function update($arr, $id){
		$str = "";
		foreach($arr as $key=>$value){
			$str .= "$key='$value',"; 
		}
		$str = rtrim($str,",");
		$sql = "update student set " .$str . " where id =$id";
		return $this->db->exec($sql);
	}

	public function insert($arr){
		$str = "";
		foreach($arr as $key=>$value){
			$str .= "$key='$value',"; 
		}
		$str = rtrim($str,",");
		$sql = "insert into student set " .$str;
		return $this->db->exec($sql);
	}
}
?>