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
if (!isset($_POST['user'])||!isset($_POST['pass'])||!isset($_POST['pass_new'])) 
	echo '<br>'.'Please fill full the information!';
else
if (isset($_POST['user'])&&isset($_POST['pass'])&&isset($_POST['pass_new']))	
{
	$user =addslashes(mysql_real_escape_string($_POST['user']));
	$pass_new =md5(sha1(md5($_POST['pass_new'])));
	$confirmpass_new =md5(sha1(md5($_POST['confirmpass_new'])));
	$pass =md5(sha1(md5($_POST['pass'])));
	$sql = mysql_query("select * from user where user = '$user'");
	if (mysql_num_rows($sql)>0)// kiem tr tai khoan
	{
		$row = @mysql_fetch_array($sql);
		if ($row['pass'] == $pass)// kiem tra mat khau
		{
			$id=$row['id'];
			if($pass_new==$confirmpass_new)
			{
			$change=mysql_query("UPDATE `user` SET `pass`= '$pass_new' where `id` = '$id'");
			if ($change) header("Location: thongtincanhan.php");
			else echo 'Can not change your password!';
			}
			else echo 'Confirm password is wrong';
		}
		else echo '<br>'.'Wrong password';
	}
	else echo '<br>'."Do not exist!";
}
?>