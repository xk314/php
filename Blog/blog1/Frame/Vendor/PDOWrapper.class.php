<?php
namespace Frame\Vendor;
use \PDO;
use \Exception;
use \PDOException;
final class PDOWrapper{
	private $db_type;
	private $db_name;
	private $db_passwd;
	private $db_user;
	private $db_host;
	private $db_port;
	private $db_charset;
	private $db_pdo = NULL;

	public function __construct(){
		$this->db_host = $GLOBALS['config']['db_host'];
		$this->db_port = $GLOBALS['config']['db_port'];
		$this->db_type = $GLOBALS['config']['db_type'];
		$this->db_name = $GLOBALS['config']['db_name'];
		$this->db_user = $GLOBALS['config']['db_user'];
		$this->db_passwd = $GLOBALS['config']['db_passwd'];
		$this->db_charset = $GLOBALS['config']['db_charset'];
		$this->createPdo();
		$this->setErrMode();//设置PDO对象发生错误时的报错方式

	}

	private function createPdo(){
		$dsn = "$this->db_type:dbname=$this->db_name;host=$this->db_host;port=$this->db_port;charset=$this->db_charset";
		try{
			$this->db_pdo = new PDO($dsn, $this->db_user, $this->db_passwd);
		}catch(Exception $e){
			echo "连接数据库失败！".$e->getMessage()."<br>";
			echo "发生错误的文件：" .$e->getFile()."<br>";
			echo "发生错误的行数：".$e->getLine()."<br>";
		}
	}
	//设置PDO对象的报错方式，以抛出异常的模式进行报错
	private function setErrMode(){
		$this->db_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}

	public function fetchOne($sql){
		try{
			$pdoStatement = $this->db_pdo->query($sql);
			return $pdoStatement->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "sql语句出错！".$e->getMessage()."<br>";
			echo "发生错误的文件：" .$e->getFile()."<br>";
			echo "发生错误的行数：".$e->getLine()."<br>";
		}
	}
	public function fetchAll($sql){
		try{
			$pdoStatement = $this->db_pdo->query($sql);
			return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			echo "sql语句出错！".$e->getMessage()."<br>";
			echo "发生错误的文件：" .$e->getFile()."<br>";
			echo "发生错误的行数：".$e->getLine()."<br>";
		}
	}
}
?>