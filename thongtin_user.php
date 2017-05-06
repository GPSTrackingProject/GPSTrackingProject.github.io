<html>
<head>
    <title>GPS Tracking</title>
</head>
<body> 
</body>
</html>
<?php
session_start();
require_once('mysql.php');
if (!isset($_POST['user'])||!isset($_POST['pass'])||!isset($_POST['user_new'])) 
	echo '<br>'.'Please fill full the information!';
else
if (isset($_POST['user'])&&isset($_POST['pass'])&&isset($_POST['user_new']))	
{
	$user =addslashes(mysql_real_escape_string($_POST['user']));
	$user_new =addslashes(mysql_real_escape_string($_POST['user_new']));
	$pass =md5(sha1(md5($_POST['pass'])));
	$sql = mysql_query("select * from user where user = '$user'");
	if (mysql_num_rows($sql)>0)//KIểm tra user có tồn tại không
	{
		$row = @mysql_fetch_array($sql);
		if ($row['pass'] == $pass)//Kiểm tra pass có đúng không
		{
			$id=$row['id'];
			$change=mysql_query("UPDATE `user` SET `user`= '$user_new' where `id` = '$id'");
			if ($change) header("Location: thongtincanhan.php");
			else echo 'Can not change your username!';
		}
		else echo '<br>'.'Wrong password';
	}
	else echo '<br>'."Do not exist!";
}