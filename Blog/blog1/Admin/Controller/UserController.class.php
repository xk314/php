<?php
namespace Admin\Controller;
use \Frame\Libs\BaseController;
use \Admin\Model\UserModel;
use \Frame\Libs\Code;
use \Frame\Libs\Page;

final class UserController extends BaseController{

	public function index(){
		$this->deny_access();
		$UserModel = UserModel::getInstance();
		//$user = $UserModel->fetchAll();
		
		$total_row =$UserModel->rowCount();
		$PAGE_SIZE = 3;
		$now_page_index = !empty($_GET["page"]) ? $_GET["page"] : 1;
		setcookie("now_page",$now_page_index);
		$total_page_num = ceil($total_row/$PAGE_SIZE);
		$star_row_index = ($now_page_index -1)*$PAGE_SIZE;
		$end_row_num = ($star_row_index+$PAGE_SIZE)>$total_row? $total_row-$star_row_index : $PAGE_SIZE;
		$sql ="select * from user limit $star_row_index,$end_row_num";
		$user=$UserModel->fetchAll($sql);
		$page = new Page($total_page_num,$now_page_index, "?c=User&a=index");
		$this->smarty->assign("page", $page);
		$this->smarty->assign("users", $user);
		$this->smarty->display("User/index.html");
	}
	public function add(){
		$this->deny_access();
		$this->smarty->display("User/add.html");
	}
	public function insert(){
		$this->deny_access();
		$arr['username'] = $_POST['username'];
		$arr['password'] = md5($_POST['password']);
		$arr['name'] = $_POST['name'];
		$arr['tel'] = $_POST['tel'];
		$arr['status'] = $_POST['status'];
		$arr['role'] = $_POST['role'];
		$arr['addate'] = time();
		if(UserModel::getInstance()->insert($arr)){
			$this->jump("添加账户成功！",3,"?c=User&a=index");
		}else{
			$this->jump("添加账户失败！",3,"?c=User&a=index");
		}

	}
	public function alter(){
		$this->deny_access();
		$id= $_GET['id'];
		$sql = "select * from user where id=$id";
		$user = UserModel::getInstance()->fetchOne($sql);
		$this->smarty->assign("user", $user);
		$this->smarty->display("User/edit.html");
	}
	public function update(){
		$id = $_POST['id'];
		$arr['username'] = $_POST['username'];
		$arr['password'] = $_POST['password'] && md5($_POST['password']);
		$arr['name'] = $_POST['name'];
		$arr['tel'] = $_POST['tel'];
		$arr['status'] = $_POST['status'];
		$arr['role'] = $_POST['role'];
		if(UserModel::getInstance()->update($id, $arr)){
			$this->jump("修改账号信息成功！",3,"?c=User&a=index");
		}else{
			$this->jump("修改账号信息失败！",3,"?c=User&a=alter&id=$id");
		}

	}

	public function delete(){
		$this->deny_access();
		$id = $_GET['id'];
		if(UserModel::getInstance()->delete($id)){
			$this->jump("删除账户成功！",3,"?c=User&a=index");
		}
	}
	public function login(){
		$this->smarty->display("User/login.html");
	}

	
	public function validate(){
		$verify = $_SESSION['code'];
		$userName = $_POST['username'];
		$passWd = md5($_POST['password']);
		$sql = "select * from user where username='$userName' and password='$passWd'";
		$arr = [];
		$res = UserModel::getInstance()->fetchOne($sql);
		if($res){
			$_SESSION['username'] = $userName;
			$_SESSION['userid'] = $res['id'];
			$arr['last_login_ip'] = $_SERVER['REMOTE_ADDR'];
			$arr['last_login_time'] = time();
			$this->jump("登录成功！", 3, "?c=Index&a=index");
		}else{
			$this->jump("登录失败！", 3, "?c=User&a=login");
		}

	}
	public function logout(){
		unset($_SESSION['uaername']);
		unset($_SESSION['userid']);
		session_destroy();
		$this->jump("退出成功！",3,"?c=User&a=login");
	}

	public function showCode(){
		$code = new Code;
		$code->show_code();
	}



}
?>