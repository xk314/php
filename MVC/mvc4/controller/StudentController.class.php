<?php
final class StudentController extends BaseController{
	private $StudentModel = NULL;
	private $StudentPage = NULL;//分页功能对象
	private $total_rows = 0;
	private $PAGE_SIZE= 5;
	private $now_page_index = 1;
	public function __construct(){
		$this->StudentModel = FactoryModel::getinstance('StudentModel');
		$this->total_rows = $this->StudentModel->allRows();
		$this->now_page_index = !empty($_GET["page"]) ? $_GET["page"] : 1;
	}

	public function show_page(){//用于在视图中显示分页
		$total_page_num = ceil($this->total_rows/$this->PAGE_SIZE);
		setcookie("now_page",$this->now_page_index);
		$this->StudentPage = new Page($total_page_num,$this->now_page_index, "");//创建分页类对象
		$this->StudentPage->show_page();
	}

	public function index(){
		$star_row_index = ($this->now_page_index -1)*$this->PAGE_SIZE;
		$end_row_num = ($star_row_index+$this->PAGE_SIZE)>$this->total_rows? $this->total_rows-$star_row_index : $this->PAGE_SIZE;
		$sql ="select * from student limit $star_row_index,$end_row_num";
		$result = $this->StudentModel->fetchAll($sql);
		$page = $this;//使当前对象可以在视图中进行访问
		$total_row = $this->total_rows;
		include_once "./views/StudentViews.html";//
	}

	public function delete(){
		$id = $_GET['id'];
		if($this->StudentModel->delete($id))
			$this->redirect("$id 删除成功！");
		else $this->redirect("$id 删除失败！");
	}

	public function alter(){
		$id = $_GET['id'];
		$sql = "select * from student where id=$id";
		$result = $this->StudentModel->fetchOne($sql);
		include_once './views/StudentAlterViews.html';
	}

	public function update(){
		$id = $_POST['id'];
		$arr['name'] = $_POST['name'];
		$arr['sex'] = $_POST['sex'];
		$arr['age'] = $_POST['age'];
		$arr['edu'] = $_POST['edu'];
		$arr['salary'] = $_POST['salary'];
		$arr['bonus'] = $_POST['bonus'];
		$arr['city'] = $_POST['city'];
		if($this->StudentModel->update($arr, $id))
			$this->redirect("$id 修改成功！"); //变量名和汉字连起来的话 会将其整体视为一个变量名
		else $this->redirect("$id 修改失败！");
	}

	public function add(){
		include_once "./views/StudentAddViews.html";
	}
	public function insert(){
		$arr['name'] = $_POST['name'];
		$arr['sex'] = $_POST['sex'];
		$arr['age'] = $_POST['age'];
		$arr['edu'] = $_POST['edu'];
		$arr['salary'] = $_POST['salary'];
		$arr['bonus'] = $_POST['bonus'];
		$arr['city'] = $_POST['city'];
		if($this->StudentModel->insert($arr))
			$this->redirect( "添加成功！");
		else $this->redirect("添加失败！");
	}
}

// 目前这种方式还是通过php变量的方式对模板进行渲染


// if($ac=="index"){
// 	$student->index();
// }else if($ac=="delete"){
// 	$student->delete();
// }else if($ac=="alter"){
// 	$student->alter();
// }else if($ac == "update"){
// 	$student->update();
// }elseif ($ac=='add') {
// 	$student->add();
// }elseif ($ac=='insert'){
// 	$student->insert();
// }

