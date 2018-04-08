<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\CategoryModel;
use \Admin\Model\ArticleModel;
use \Frame\Libs\Page;

final class ArticleController extends BaseController{

	public function index(){
		$this->deny_access();
		//获取全部的分类信息
		$sql = "select * from category2";
		$res = CategoryModel::getinstance()->fetchAll($sql);
		$res = CategoryModel::getInstance()->categoryList($res);
		$this->smarty->assign("classarrs",$res);   //用于分类查询下拉框的显示


		// $sql ="select article.*, category.classname, user.username from article
		// 		left join category on article.category_id = category.id 
		// 		left join user on article.user_id = user.id";
		// $article = ArticleModel::getinstance()->fetchAll($sql);
		// $this->smarty->assign("articles",$article);
		$where = " 2>1";
		$url = "";
		$category_id = 0;
		$title = "";
		if(!empty($_REQUEST['category_id'])) {
			$where .=" and category_id ='".$_REQUEST['category_id']."'";
			$url .="&category_id=".$_REQUEST['category_id'];
			$category_id = $_REQUEST['category_id'];
		}
		if(!empty($_REQUEST['keyword'])){
			$where .=" and title like'%".$_REQUEST['keyword']."%'";
			$url .="&keyword=".$_REQUEST['keyword'];
			$title = $_REQUEST['keyword'];
		}

		$sql ="select article.*, category2.classname, user.username from article
				left join category2 on article.category_id = category2.id 
				left join user on article.user_id = user.id 
				where $where
				order by article.top desc, orderby desc
				";
		$total_row =ArticleModel::getinstance()->rowCount($sql);
		$PAGE_SIZE = 5;
		$now_page_index = !empty($_GET["page"]) ? $_GET["page"] : 1;
		setcookie("now_page",$now_page_index);
		$total_page_num = ceil($total_row/$PAGE_SIZE);
		$star_row_index = $total_page_num==0 ? 0:($now_page_index -1)*$PAGE_SIZE;
		$end_row_num = ($star_row_index+$PAGE_SIZE)>$total_row? $total_row-$star_row_index : $PAGE_SIZE;
		$end_row_num = $end_row_num<=0? 0:$end_row_num;

	

		$sql ="select article.*, category2.classname, user.username from article
				left join category2 on article.category_id = category2.id 
				left join user on article.user_id = user.id 
				where $where
				order by article.top desc, orderby desc
				limit $star_row_index,$end_row_num";
		$article = ArticleModel::getinstance()->fetchAll($sql);
		$this->smarty->assign("articles",$article);

		$page = new Page($total_page_num,$now_page_index, "?c=Article&a=index&category_id=$category_id&keyword=$title");

		$this->smarty->assign("page", $page);


		$this->smarty->display("./Article/index.html");
	}

	public function add(){
		$this->deny_access();
		$sql = "select * from category2";
		$res = CategoryModel::getinstance()->fetchAll($sql);
		$res = CategoryModel::getInstance()->categoryList($res);
		$this->smarty->assign("classarrs",$res);
		$this->smarty->display("./Article/add.html");
	}
	public function insert(){
		$arr['category_id'] = $_POST['category_id'];
		$arr['title'] = $_POST['title'];
		$arr['orderby'] = $_POST['orderby'];
		$arr['top'] = $_POST['top'];
		$arr['content'] = $_POST['content'];
		$arr['addate'] = time();
		$arr['user_id'] = $_SESSION['userid'];
		if(ArticleModel::getInstance()->insert($arr)){
			$this->jump("添加文章成功！",3,"?c=Article&a=index");
		}else{
			$this->jump("添加文章失败！",3,"?c=Article&a=index");
		}

	}

	public function edit(){
		$this->deny_access();
		$id = $_GET['id'];
		$sql = "select * from article where id=$id";
		$article = ArticleModel::getInstance()->fetchOne($sql);

		$sql = "select * from category2";
		$res = CategoryModel::getinstance()->fetchAll($sql);
		$res = CategoryModel::getInstance()->categoryList($res);
		$this->smarty->assign("classarrs",$res);

		$this->smarty->assign("article", $article);
		$this->smarty->display("./Article/edit.html");
	}

	public function update(){
		$id = $_POST['id'];
		$arr['category_id'] = $_POST['category_id'];
		$arr['title'] = $_POST['title'];
		$arr['orderby'] = $_POST['orderby'];
		$arr['top'] = $_POST['top'];
		$arr['content'] = $_POST['content'];
		if(ArticleModel::getInstance()->update($id, $arr)){
			$this->jump("修改文章信息成功！",3,"?c=Article&a=index");
		}else{
			$this->jump("修改文章信息失败！",3,"?c=Article&a=edit&id=$id");
		}

	}

	public function delete(){
		$this->deny_access();
		$id = $_GET['id'];
		if(ArticleModel::getInstance()->delete($id)){
			$this->jump("删除文章成功！",3,"?c=Article&a=index");
		}
	}
	public function show(){
		$id=$_GET['id'];
		echo "展示文章";
	}
}
?>