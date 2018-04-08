<?php
namespace Home\Model;
use \Frame\Libs\BaseModel;

final class LinksModel extends BaseModel{

	private $table_name = "links";
	
	public function fetchOne($sql){
		return $this->pdo->fetchOne($sql);
	}
	public function fetchAll($sql){
		return $this->pdo->fetchAll($sql);
	}

	
}
?>