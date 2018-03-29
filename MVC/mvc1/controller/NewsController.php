<?php
	header("content-type:text/html;charset=utf8");
	require_once "../model/NewsModel.class.php";
	require_once "../libs/Page.class.php";
	$NewsModel = new NewsModel;
	$total_row = $NewsModel->allRows();
	$PAGE_SIZE= 5;
	$total_page_num = ceil($total_row/$PAGE_SIZE);
	$now_page_index = !empty($_GET["page"]) ? $_GET["page"] : 1;
	setcookie("news_now_page",$now_page_index);
	$page = new Page($total_page_num,$now_page_index, "");//创建分页类对象
	$star_row_index = ($now_page_index -1)*$PAGE_SIZE;
	$end_row_num = ($star_row_index+$PAGE_SIZE)>$total_row? $total_row-$star_row_index : $PAGE_SIZE;

	$sql ="select * from news limit $star_row_index,$end_row_num";
	$result = $NewsModel->fetchAll($sql);



$ac = !empty($_GET['ac'])? $_GET['ac'] : "index";
if($ac=="index"){
	include_once "../views/NewsViews.html";//目前这种方式还是通过php变量的方式对模板进行渲染
}else if($ac=="delete"){
	$id = $_GET['id'];
	if($NewsModel->delete($id)){
		echo "$id删除成功！";
		header("refresh:1;url=?");
		die();
	}else{echo "$id删除失败！";
		header("refresh:1;url=?");
		die();}
}else if($ac=="alter"){
	$id = $_GET['id'];
	$sql = "select * from news where nid=$id";
	$result = $NewsModel->fetchOne($sql);
	include_once '../views/NewsAlterViews.html';
}
echo "<pre>";
print_r($_POST);
die();
	
?>