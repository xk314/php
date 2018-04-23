<?php
$page_size = 10;
$now_page = isset($_GET['page']) ? $_GET['page'] :1;

$pdo = new PDO("mysql:host=localhost;dbname=ajax;charset=utf8","root",123456);
$sql = "select count(*) from areacounty";
$stat = $pdo->prepare($sql);
$stat->execute();
$total = $stat->fetchColumn();

$sql = "select * from areacounty order by AID limit " . ($now_page-1)*$page_size . ",$page_size";
$stat = $pdo->prepare($sql);
$stat->execute();
$data = $stat->fetchAll(2);

if($now_page<=2){
    $start_page = 1;
    $end_page = 5;
}else{
    $start_page = $now_page-2;
    $end_page = $now_page+2;
}
if($now_page>=$total-2) {
    $start_page = $total-5+1;
    $end_page = $total;
}
setcookie("page",$now_page);
$str = "";
if($now_page <= 1)
    $str .= "上一页";
else
    $str .= "<a href='javascript:void(0)' xhref='page=".($now_page-1)."'>上一页</a>";

for($i=$start_page ; $i<=$end_page; $i++)
    $str .= "<a href='javascript:void(0)' xhref='page=".$i."' id='".$i."'>[$i]</a>";

if($now_page >= $total)
    $str .= "下一页";
else
    $str .= "<a href='javascript:void(0)' xhref='page=".($now_page+1)."'>下一页</a>";



echo json_encode([$data,$str]);
?>