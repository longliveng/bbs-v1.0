<?php
session_start();
echo "<meta charset='utf8' />";
//if ($_GET['action']=="logut") {
  unset($_SESSION['user_name']);
	unset($_SESSION['user_password']);
	echo "账户注销成功。";
	header("refresh:3,url=login.html");
	exit;
//}
