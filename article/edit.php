<?php
	header("content-type:text/html;charset=utf8");
	include "common.php";
	!isset($_GET["id"]) && redirect("./index.php","参数非法");
	$id = $_GET["id"];
	$sql = "select * from article where aid=$id";
	$res = mysql_query($sql, $link);
	if(!$res || mysql_num_rows($res)==0){
		redirect("./index.php","参数非法");
	}
	$result = mysql_fetch_assoc($res);
	mysql_free_result($res);
	mysql_close($link);

?>
<!DOCTYPE html>
<html>
<head>
	<title>插入文章</title>
</head>
<body>
	<table width="60%" align="center" border="1px" rules="all" bgcolor="#eee">
		<form name="update_article" action="./update.php" method="post" enctype="multipart/form-data">
			<tr>
				<td>文章标题</td>
				<td><input type="text" name="title" value="<?=$result['title']?>"></input></td>
			</tr>
			<tr>
				<td>作者</td>
				<td><input type="text" name="author" value="<?=$result['author']?>"></input></td>
			</tr>
			<tr>
				<td>文章类型</td>
				<td>
					<select name="cat_name">
						<option value="新闻" <?php echo $result['cat_name']=="新闻" ? "selected" : "";?>>新闻</option>
						<option value="八卦" <?php echo $result['cat_name']=="八卦" ? "selected" : "";?>>八卦</option>
						<option value="财经" <?php echo $result['cat_name']=="财经" ? "selected" : "";?>>财经</option>
						<option value="科技" <?php echo $result['cat_name']=="科技" ? "selected" : "";?>>科技</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>是否立即发布</td>
				<td>
					<input type="radio" name="is_show" value="是" <?php echo $result['is_show']=="是" ? "checked" : "";?>>立即发布</input>
					<input type="radio" name="is_show" value="否" <?php echo $result['is_show']=="否" ? "checked" : "";?>>存为草稿</input>
				</td>
			</tr>
			<tr><td><img src="<?=$result['pic']?>"></td></tr>
			
			<tr>
				<td>文章摘要</td>
				<td><textarea name="descr" cols="30" rows="5"><?=$result['description']?></textarea></td>
			</tr>
			<tr>
				<td>文章内容</td>
				<td><textarea name="comment" cols="30" rows="10"><?=$result['comment']?></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交" ></input></td>
			</tr>
			<input type="hidden" name="id" value="<?=$result['aid']?>"></input>
		</form>
	
	</table>


</body>


<!-- 富文本编辑器ueditor -->
<script charset="utf-8" src="./ueditor/kindeditor-min.js"></script>
<script charset="utf-8" src="./ueditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
    editor = K.create('textarea[name="comment"]', {
        allowFileManager : true
    });
});
</script>
<!-- 富文本编辑器ueditor -->
</html>