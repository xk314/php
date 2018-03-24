<?php
function create_code($len=4,$w=100,$h=40){		
		$item = array_merge(range(0,9), range("a","z"), range("A", "Z"));
		$index_arr = array_rand($item, $len);
		$v_arr = array_map( function($k) use($item){return $item[$k]; },$index_arr);
		$code =implode($v_arr);//构造出含有4个随机数字或字母的字符串
		$image = imagecreatetruecolor($w, $h);
		$font_color = imagecolorallocate($image, mt_rand(0,180),mt_rand(0,180),mt_rand(0,180));
		$bg_color = imagecolorallocate($image, mt_rand(190,250),mt_rand(190,250),mt_rand(190,250));
		$font = 20;
		$length=strlen($code);
		$font_file='./fonts/8.ttf';//保存字体文件的目录需放在当前目录下
		$start_x = ($w-$font*$len)/2;
		imagefill($image, 0, 0, $bg_color);
		for($i=0; $i<$length; $i++){
			imagettftext($image, $font, rand(-40,40),$start_x+$font*$i,30,$font_color,$font_file,$code[$i]);
		}
		for($i=0; $i<200; $i++)
			imagesetpixel($image, mt_rand(0, $w), mt_rand(0, $h),$font_color);
		for($i=0; $i<7; $i++){
			$j = mt_rand(0,360);
			imagearc($image, mt_rand(0,$w), mt_rand(0,$h),mt_rand(0,$w),mt_rand(0,$w),mt_rand($j,$j+5),mt_rand($j,$j+5),$font_color);
		}
		header("content-type:image/png");
		imagepng($image);
		imagedestroy($image);

	}

	create_code();
?>