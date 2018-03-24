<?php
	header("content-type:text/html;charset='utf8'");


// 文章标题，作者，类型（新闻，八卦，财经，科技），是否立即发布，插图，摘要，内容。




?>
<!DOCTYPE html>
<html>
<head>
	<title>插入文章</title>
</head>
<body>
	<table width="60%" align="center" border="1px" rules="all" bgcolor="#eee">
		<form name="inser_article" action="./insert.php" method="post" enctype="multipart/form-data">
			<tr>
				<td>文章标题</td>
				<td><input type="text" name="title"></input></td>
			</tr>
			<tr>
				<td>作者</td>
				<td><input type="text" name="author"></input></td>
			</tr>
			<tr>
				<td>文章类型</td>
				<td>
					<select name="cat_name">
						<option value="新闻" selected>新闻</option>
						<option value="八卦">八卦</option>
						<option value="财经">财经</option>
						<option value="科技">科技</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>是否立即发布</td>
				<td>
					<input type="radio" name="is_show" value="是" checked>立即发布</input>
					<input type="radio" name="is_show" value="否">存为草稿</input>
				</td>
			</tr>
			<tr>
				<td>上传插图</td>
				<td><input type="file" name="upload"></input></td>
			</tr>
			<tr>
				<td>文章摘要</td>
				<td><textarea name="descr" cols="30" rows="5"></textarea></td>
			</tr>
			<tr>
				<td>文章内容</td>
				<td><textarea name="comment" cols="30" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" value="提交" ></input></td>
			</tr>
		</form>
	
	</table>


</body>
</html>
