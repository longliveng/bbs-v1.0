<meta charset="utf8">
<?php
$conn = mysql_connect("localhost","root","");
if (!$conn) {
  exit("链接数据库失败！");
}
//连接到chan17
$chan17_db = mysql_select_db("chan17",$conn);
if (!$chan17_db) {
	die("没有连接到chan17:".mysql_error());
}
mysql_query("SET NAMES UTF8") or die(mysql_error());

?>
