<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - GPSTracking</title>
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
		<link rel="stylesheet" href="css/style.css">
</head>
<body> 
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
	    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
	<script src="js/index.js"></script>
</body>
</html>
<?php
session_start();
require_once('mysql.php');
if (!isset($_POST['user'])||!isset($_POST['pass']))
	echo '<br>'.'Please fill full the information!';
else
if (isset($_POST['user'])&&isset($_POST['pass']))	
{
	$user =addslashes(mysql_real_escape_string($_POST['user']));
	$pass =md5(sha1(md5($_POST['pass'])));
	$sql = mysql_query("select * from user where user = '$user'");
	if (mysql_num_rows($sql)>0)//KIểm tra user có tồn tại không
	{
		$admin = @mysql_fetch_array($sql);
		if ($admin['pass'] == $pass)//Kiểm tra pass có đúng không
		{
			$_SESSION['user_id']= $admin['id'];
			echo $_SESSION['user_id'];
			header("Location: index.php");
		}
		else echo '<br>'.'Wrong password';
	}
	else echo '<br>'."Do not exist!";
}