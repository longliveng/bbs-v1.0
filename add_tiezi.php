<meta charset="utf8">
<?php
session_start();
include("conn.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (empty($_POST['tsub'])){
		echo "请输入标题 和 内容！";
}else{
	$ttitle = mysql_real_escape_string(@$_POST['ttitlet']);
	$tcontent = mysql_real_escape_string(@$_POST['tcontent']);
	$user = @$_SESSION['user_name'];
	$sql = "INSERT INTO bbs_word(`title`,`content`,`user`,`time`) VALUES ('".$ttitle."','".$tcontent."','".$user."','".time()."')";
	$reply = mysql_query($sql);
	}
}
echo "文章成功发出，4喵后跳转到首页~";
header("refresh:3,url=index.php");
?>
