<meta charset="utf8">
<?php
@session_start();
if (isset($_SESSION['user_name'])) {
  echo "欢迎你 ".$_SESSION['username']."   ";
	echo "<a href='logout.php'>退出登陆</a>";
}else{
    echo "你还没登陆，请先登录！ <br><a href='login.html'>点击登陆</a>           也可以注册一下哦~ <a href='sign.php'>点击注册</a>";
}

?>
