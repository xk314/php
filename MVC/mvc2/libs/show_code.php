<?php
header("content-type:image/png");
require_once "./Code.class.php";
$image = new Code($len=4,$w=100,$h=40);
$image->show_code();
?>