<meta charset="utf8">
<?php
session_start();
if (!isset($_GET['id'])) {
  die("没有ID<br>");
}
$wid=$_GET['id'];
include("conn.php");
$all_post = mysql_query("SELECT * FROM bbs_word WHERE id={$wid}") or var_dump(mysql_error());
//var_dump("SELECT * FROM group WHERE id={$wid}");
$post = mysql_fetch_array($all_post);
?>
<style type="text/css">
#title {
	font-family: "黑体";
	font-size: 20px;
	color: #000;
	background-color: #03F;
	height: 60px;
	background-position: center center;
	text-align: center;
}
#content {
	font-family: "宋体";
	font-size: 16px;
	font-weight: normal;
	background-color: #9FC;
}
#comment {
	font-family: "宋体";
	font-size: 16px;
	background-color: #CCC;
	border: 2px solid #F00;
}
#all_comm {
	font-family: "黑体";
	font-size: 15px;
	color: #000;
	border: 1px solid #0C0;
}
#comment h3 {
	text-align: center;
}
</style>

<div id="title">
<?php 
echo $post['title']."<br>";
echo "<div style='float:right;'>".date('Y-m-d h:i:s',$post['time'])."</div>";
?>
</div>
<div id="content">
	<div id="content_play">
		
	</div>
<title><?php echo $post['title'] ?></title>
<?php
echo "<br>".nl2br($post['content']);
?>
</hr>
</div>
    <div id="all_comm">
    	<?php
    	$id = $_GET['id'];
    	$all_comm = mysql_query("SELECT * FROM bbs_comm WHERE word_id=".$id);
    	while ($all = mysql_fetch_array($all_comm)) {
    		print "
    		第{$all['id']}条留言        ".date("Y-m-d H:i:s",$all['time']).
    		"<br>
    		by  {$all['user']}  "."<br><br>".
    		nl2br($all['content'])."<br>
    		<hr>";
    	}
    	?>
    </div>
<div id="comment">
  <h3>回复文章</h3>
<hr>
<?php
if (!isset($_SESSION['user_name'])){
	echo "你还没登陆，请先登录！   <a href='login.html'>点击登陆</a>";

	exit;
}
	include("top_user.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (empty($_POST['reply'])) {
			echo "请输入回复:";
		}else{
		$content = mysql_real_escape_string(@$_POST['reply']);
		$word_id = $_GET['id'];
		$user = @$_SESSION['user_name'];

		$sql = "INSERT INTO bbs_comm (`word_id`,`content`,`user`,`time`) VALUES ('".$word_id."','".$content."','".$user."','".time()."')";
		$reply_db = mysql_query($sql) or mysql_error();
		}
	}
// }else{
// 		include("top_user.php");
// 		exit
// 	}

	?>

<form action="" method="post">
		<textarea name="reply" rows="10"></textarea>
		<input type="submit" name="submit" value="提交" />
		</form>
</div>
