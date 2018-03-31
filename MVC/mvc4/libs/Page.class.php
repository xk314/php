<?php
final class Page {
	private $page_total_num = 0;
	private $now_page_index = 0;
	private $url = "";

	public function __construct($page_total_num, $now_page_index, $url){
		$this->page_total_num = $page_total_num;
		$this->now_page_index = $now_page_index;
		$this->url = $url;
	}
	public function echo_js(){
		$str = "<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css'>";
		$str1 = "<script type='text/javascript' src='bootstrap/js/jq.js'></script>";
		$str2 = "<script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>";
		$str3 = "<script type='text/javascript'>";
		$str4 = "window.onload = function(){
			var id = document.cookie.split('='')[1];
			document.getElementById(id).style.color='red';
			}
			</script>";
		echo $str.$str1.$str2.$str3.$str4;

		// js函数不能成功输出
	}

	public function show_page($controller){ //当不传参数时，默认执行student的index方法
		$str = "<ul class='pager'>";
		$str .= "<li><a href='$this->url?c=$controller&page=1'>首页</a></li>";
		$page_index = $this->now_page_index==1 ? 1:$this->now_page_index-1;
		
		$str .= "<li><a href='$this->url?c=$controller&page=$page_index'>上一页</a></li>";
		echo $str;
		for($i=1; $i<=$this->page_total_num; $i++){
				if($i>$this->page_total_num ) break;
				if(abs($i-$this->now_page_index)<=3 ||($i<=7 && $this->now_page_index<4))
					echo "<li><a id=$i href='$this->url?c=$controller&page=$i'>$i</a></li>";
		}
		$page_index = $this->now_page_index==$this->page_total_num? $this->page_total_num:$this->now_page_index+1;
		echo "<li><a href='$this->url?c=$controller&page=$this->page_total_num'>下一页</a></li>";
		echo "<li><a href='$this->url?c=$controller&page=$this->page_total_num'>尾页</a></li><ul>";

	}

}

		


	
?>