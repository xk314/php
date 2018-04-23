<?php
$filename = isset($_GET['filename']) ? $_GET['filename']: "";

$data = file_get_contents("./city/".$filename.".json");
echo ($data);
?>