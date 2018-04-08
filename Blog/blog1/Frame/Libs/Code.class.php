<?php
namespace Frame\Libs;
//创建验证码
final class Code{
	private $code_len = 0;
	private $width = 0;
	private $hight = 0;
	private $font = 0;
	private $font_file = "";
	public function __construct($code_len=4, $width=100, $hight=40,$font=20,$font_file='./Public/Public/fonts/8.ttf'){
		$this->code_len = $code_len;
		$this->width = $width;
		$this->hight = $hight;
		$this->font = $font;
		$this->font_file = $font_file;
	}

	private function get_code_item(){
		$item = array_merge(range(0,9), range("a","z"), range("A", "Z"));
		$index_arr = array_rand($item, $this->code_len);
		$v_arr = array_map( function($k) use($item){return $item[$k]; },$index_arr);
		$code =implode($v_arr);//构造出含有4个随机数字或字母的字符串
		return $code;
	}

	private function make_code($code=[]){
		$image = imagecreatetruecolor($this->width, $this->hight);
		$font_color = imagecolorallocate($image, mt_rand(0,180),mt_rand(0,180),mt_rand(0,180));
		$bg_color = imagecolorallocate($image, mt_rand(190,250),mt_rand(190,250),mt_rand(190,250));
		$start_x = ($this->width-$this->font*$this->code_len)/2;
		imagefill($image, 0, 0, $bg_color);
		for($i=0; $i<$this->code_len; $i++){
			imagettftext($image, $this->font, rand(-40,40),$start_x+$this->font*$i,30,$font_color,$this->font_file,$code[$i]);
		}
		for($i=0; $i<200; $i++)
			imagesetpixel($image, mt_rand(0, $this->width), mt_rand(0, $this->hight),$font_color);
		for($i=0; $i<7; $i++){
			$j = mt_rand(0,360);
			imagearc($image, mt_rand(0,$this->width), mt_rand(0,$this->hight),mt_rand(0,$this->width),mt_rand(0,$this->width),mt_rand($j,$j+5),mt_rand($j,$j+5),$font_color);
		}
		header("content-type:image/png");
		return $image;

	}

	public function show_code(){
		$code = $this->get_code_item();
		$_SESSION['code'] = $code;
		$image = $this->make_code($code);
		imagepng($image);
	}
}

?>