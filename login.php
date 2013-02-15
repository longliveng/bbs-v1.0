<!--<meta charset="utf8"> -->
<?php
session_start();
//引用数据库
include ("conn.php");

//登陆时判断字段是否为空。。
// if (!isset($_POST['submit2'])) {
//   exit("请输入用户名or密码。");
//}
if (!isset($_POST['user_id'])) {
	echo "没有用户名<br>";
}
if (!isset($_POST['passw'])) {
	echo '没有密码<br>';
}

$user_name = @$_POST['user_id'];
$user_password = @$_POST['passw'];

//获取账号密码
$sql = mysql_query('SELECT * FROM lms_user WHERE user_id = "' . $user_name . '"');
$row = mysql_fetch_assoc($sql);
if ($user_password == $row['user_password']) {
	$_SESSION['user_name'] = $user_name;
	$_SESSION['user_password'] = $user_password;
	echo $_SESSION['user_name']."欢迎登陆**网！<br/><br>";
	//exit;
}else{
	echo "登陆失败,请重新登陆。<br>";
}
echo "查看所有留言内容：<br><a href='index.php'>戳我，查看所有文章。</a>";
// //检测是否登陆？
// if (!isset($_SESSION['user_name'])){
// 	header("location:login.php");
//}

?>

