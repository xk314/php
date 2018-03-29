<?php
	header("content-type:text/html;charset=utf8");
	require_once "../model/StudentModel.class.php";
	require_once "../libs/Page.class.php";
	$StudentModel = new StudentModel;
	$total_row = $StudentModel->allRows();
	$PAGE_SIZE= 5;
	$total_page_num = ceil($total_row/$PAGE_SIZE);
	$now_page_index = !empty($_GET["page"]) ? $_GET["page"] : 1;
	setcookie("now_page",$now_page_index);
	$page = new Page($total_page_num,$now_page_index, "");//创建分页类对象
	$star_row_index = ($now_page_index -1)*$PAGE_SIZE;
	$end_row_num = ($star_row_index+$PAGE_SIZE)>$total_row? $total_row-$star_row_index : $PAGE_SIZE;

	$sql ="select * from student limit $star_row_index,$end_row_num";
	$result = $StudentModel->fetchAll($sql);
include_once "../views/StudentViews.html";//目前这种方式还是通过php变量的方式对模板进行渲染
	
?>