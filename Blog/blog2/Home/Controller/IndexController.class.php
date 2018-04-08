<?php
namespace Home\Controller;

use \Frame\Libs\BaseController;
use \Home\Model\CategoryModel;
use \Home\Model\LinksModel;
use \Home\Model\ArticleModel;
use \Frame\Libs\Page;

//类的自动加载通过命名空间来实现，实例化类的对象时需要使用完全限定的方式，或者通过use导入相应命名空间下的类。
final class IndexController extends BaseController{
	
	public function index(){
		//$this->deny_access();
		//获取文章分类信息
		$sql = "select category2.*,count(article.id) as article_num from category2 
				left join article on category2.id=article.category_id
				group by category2.id
				limit 10";
		$categorys = CategoryModel::getInstance()->fetchAll($sql);
		$categorys = CategoryModel::getInstance()->categoryList($categorys);


		//友情链接信息
		$sql = "select * from links";
		$links = LinksModel::getInstance()->fetchAll($sql);


		//文章按月统计
		$sql = "select date_format(from_unixtime(addate),'%Y年%m月') as yearmonth,count(id) as num
				from article 
				group by yearmonth 
				order by yearmonth desc
				limit 10";
		$article_month = ArticleModel::getInstance()->fetchAll($sql);


		//主体文章显示
		$where = " 2>1";
		$url = "?c=Index&a=index";
		$category_id = 0;
		$title = "";
		$yearmonth ="";
		$having="";
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
		if(!empty($_REQUEST['yearmonth'])){
			$yearmonth = $_REQUEST['yearmonth'];
			$having=" having yearmonth='$yearmonth'";
			$url .="&yearmonth=".$_REQUEST['yearmonth'];
		}



		$sql ="select article.*, category2.classname, user.username,date_format(from_unixtime(article.addate),'%Y年%m月') as yearmonth from article
				left join category2 on article.category_id = category2.id 
				left join user on article.user_id = user.id 
				where $where
				$having
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

	

		$sql ="select article.*, category2.classname, user.username,date_format(from_unixtime(article.addate),'%Y年%m月') as yearmonth from article
				left join category2 on article.category_id = category2.id 
				left join user on article.user_id = user.id 
				where $where
				$having
				order by article.top desc, orderby desc
				limit $star_row_index,$end_row_num";
		$article = ArticleModel::getinstance()->fetchAll($sql);
		$page = new Page($total_page_num,$now_page_index, $url);

		$this->smarty->assign("page", $page);
		$this->smarty->assign("articles",$article);
		$this->smarty->assign("article_month", $article_month);
		$this->smarty->assign("linkarr", $links);
		$this->smarty->assign("classarrs", $categorys);
		$this->smarty->display("./Index/index.html");
	}

	public function content(){
		$id = $_GET['id'];
		$sql ="select article.*, category2.classname, user.username,date_format(from_unixtime(article.addate),'%Y年%m月') as yearmonth from article
				left join category2 on article.category_id = category2.id 
				left join user on article.user_id = user.id
				where article.id=$id ";
		$article = ArticleModel::getinstance()->fetchOne($sql);
		print_r($article);
		$this->smarty->assign('article',$article);
		$this->smarty->display("./index/content.html");
	}
}
?>