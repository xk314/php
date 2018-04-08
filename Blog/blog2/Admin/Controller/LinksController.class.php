<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\LinksModel;
final class LinksController extends BaseController{

	public function index(){
		$this->deny_access();
		$sql ="select * from links";
		$links = LinksModel::getInstance()->fetchAll($sql);
		$this->smarty->assign("links",$links);
		$this->smarty->display("./Links/index.html");
	}
	public function add(){
		$this->deny_access();
		$this->smarty->display("./Links/add.html");
	}
	public function insert(){
		$arr['domain'] = $_POST['domain'];
		$arr['url'] = $_POST['url'];
		$arr['orderby'] = $_POST['orderby'];
		if(LinksModel::getInstance()->insert($arr)){
			$this->jump("添加链接成功！",3,"?c=Links&a=index");
		}else{
			$this->jump("添加链接失败！",3,"?c=Links&a=index");
		}
	}

	public function edit(){
		$this->deny_access();
		$id = $_GET['id'];
		$sql = "select * from links where id=$id";
		$link = LinksModel::getInstance()->fetchOne($sql);
		$this->smarty->assign("link",$link);
		$this->smarty->display("./Links/edit.html");
	}
	public function update(){
		$id = $_POST['id'];
		$arr['domain'] = $_POST['domain'];
		$arr['url'] = $_POST['url'];
		$arr['orderby'] = $_POST['orderby'];
		if(LinksModel::getInstance()->update($id, $arr)){
			$this->jump("修改链接信息成功！",3,"?c=Links&a=index");
		}else{
			$this->jump("修改链接信息失败！",3,"?c=Links&a=alter&id=$id");
		}
	}

	public function delete(){
		$this->deny_access();
		$id = $_GET['id'];
		if(LinksModel::getInstance()->delete($id)){
			$this->jump("删除链接成功！",3,"?c=User&a=index");
		}
	}
}
?>