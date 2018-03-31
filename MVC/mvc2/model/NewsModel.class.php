<?php
require_once "BaseModel.class.php";
final class NewsModel extends BaseModel{
	public function __construct(){
		parent::__construct();
		$this->db_arr['table_name'] = "news";
	}
	public function delete($id){
		$sql = "delete from ". $this->db_arr['table_name']." where nid= $id";
		return $this->db->exec($sql);
	}
	
}
?>