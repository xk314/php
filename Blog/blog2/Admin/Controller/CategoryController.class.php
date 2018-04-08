<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\CategoryModel;

final class CategoryController extends BaseController{

	public function index(){
		$this->deny_access();
		$sql = "select category2.*,count(article.id) as num from category2 left join article on category2.id=article.category_id
				group by category2.id";
		$res = CategoryModel::getinstance()->fetchAll($sql);
		$res = CategoryModel::getInstance()->categoryList($res);
		$this->smarty->assign("arrs",$res);
		$this->smarty->display("./Category/index.html");
	}

	public function edit(){
		$this->deny_access();
		$id = $_GET['id'];
		$sql = "select * from category2 where id=$id";
		$classarr = CategoryModel::getInstance()->fetchOne($sql);

		$sql = "select * from category2";
		$res = CategoryModel::getinstance()->fetchAll($sql);
		$res = CategoryModel::getInstance()->categoryList($res);
		$this->smarty->assign("classarr",$classarr);
		$this->smarty->assign("classarrs",$res);
		$this->smarty->display("./Category/edit.html");
	}

	public function update(){
		$this->deny_access();
		$id = $_GET['id'];
		$arr['classname'] = $_POST['classname'];
		$arr['pid'] = $_POST['pid'];
		$arr['orderby'] = $_POST['orderby'];
		if(CategoryModel::getInstance()->update($id, $arr)){
			$this->jump("修改分类信息成功！",3,"?c=Category&a=index");
		}else{
			$this->jump("修改分类信息失败！",3,"?c=Category&a=edit&id=$id");
		}
	}

	public function delete(){
		$this->deny_access();
		$id = $_GET['id'];
		if(CategoryModel::getInstance()->delete($id)){
			$this->jump("删除分类成功！",3,"?c=Category&a=index");
		}else{
			$this->jump("删除分类失败！",3,"?c=Category&a=index");
		}
	}
	public function add(){
		$this->deny_access();
		$sql = "select * from category2";
		$res = CategoryModel::getinstance()->fetchAll($sql);
		$res = CategoryModel::getInstance()->categoryList($res);
		$this->smarty->assign("classarrs",$res);
		$this->smarty->display("./Category/add.html");
	}
	public function insert(){
		$arr['classname'] = $_POST['classname'];	
		$arr['orderby'] = $_POST['orderby'];
		$arr['pid'] = $_POST['pid'];
		if(CategoryModel::getInstance()->insert($arr)){
			$this->jump("添加分类成功！",3,"?c=Category&a=index");
		}else{
			$this->jump("添加分类失败！",3,"?c=Categoryr&a=index");
		}
	}
}
?>