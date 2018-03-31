<?php
final class NewsController extends BaseController{
	private $NewsModel = NULL;
	private $NewsPage = NULL;//分页功能对象
	private $total_rows = 0;
	private $PAGE_SIZE= 5;
	private $now_page_index = 1;
	public function __construct(){
		$this->NewsModel = FactoryModel::getinstance('NewsModel');
		$this->total_rows = $this->NewsModel->allRows();
		$this->now_page_index = !empty($_GET["page"]) ? $_GET["page"] : 1;
	}
	public function show_page(){//用于在视图中显示分页
		$total_page_num = ceil($this->total_rows/$this->PAGE_SIZE);
		setcookie("news_now_page",$this->now_page_index);
		$this->NewsPage = new Page($total_page_num,$this->now_page_index, "");//创建分页类对象
		$this->NewsPage->show_page("NewsController");
	}
	public function index(){
		$star_row_index = ($this->now_page_index -1)*$this->PAGE_SIZE;
		$end_row_num = ($star_row_index+$this->PAGE_SIZE)>$this->total_rows? $this->total_rows-$star_row_index : $this->PAGE_SIZE;
		$sql ="select * from News limit $star_row_index,$end_row_num";
		$result = $this->NewsModel->fetchAll($sql);
		$page = $this;//使当前对象可以在视图中进行访问
		$total_row = $this->total_rows;
		include_once "./views/NewsViews.html";//
	}

	public function delete(){
		$id = $_GET['id'];
		if($this->NewsModel->delete($id))
			$this->redirect("NID = "."$id 删除成功！",2,"?c=NewsController");
		else $this->redirect("NID = "."$id 删除失败！",2,"?c=NewsController");		
	}

	public function alter(){
		$id = $_GET['id'];
		$sql = "select * from news where nid=$id";
		$result = $this->NewsModel->fetchOne($sql);
		include_once './views/NewsAlterViews.html';
	}

	public function update(){
		$id = $_POST['id'];
		$arr['title'] = $_POST['title'];
		$arr['author'] = $_POST['author'];
		$arr['source'] = $_POST['source'];
		$arr['keywords'] = $_POST['keywords'];
		$arr['hits'] = $_POST['hits'];
		$arr['addate'] = strtotime($_POST['addate']);
		if($this->NewsModel->update($arr, $id))
			$this->redirect("NID = "."$id 修改成功！",2,"?c=NewsController"); //变量名和汉字连起来的话 会将其整体视为一个变量名
		else $this->redirect("NID = "."$id 修改失败！",2,"?c=NewsController");
	}

	public function add(){
		include_once "./views/NewsAddViews.html";
	}
	public function insert(){
		$arr['title'] = $_POST['title'];
		$arr['author'] = $_POST['author'];
		$arr['source'] = $_POST['source'];
		$arr['keywords'] = $_POST['keywords'];
		$arr['hits'] = $_POST['hits'];
		$arr['addate'] = strtotime($_POST['addate']);
		if($this->NewsModel->insert($arr))
			$this->redirect("添加新闻成功！",2,"?c=NewsController"); 
		else
			$this->redirect("添加新闻失败！",2,"?c=NewsController");
	}

}


// if($ac=="index"){
// 	$news->index();
// }else if($ac=="delete"){
// 	$news->delete();
// }else if($ac=="alter"){
// 	$news->alter();
// }else if($ac == "update"){
// 	$news->update();
// }elseif ($ac=='add') {
// 	$news->add();	
// }elseif ($ac=='insert'){
// 	$news->insert();
// }
