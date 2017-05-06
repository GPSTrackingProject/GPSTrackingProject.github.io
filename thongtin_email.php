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
if (!isset($_POST['user'])||!isset($_POST['email'])||!isset($_POST['email_new'])) 
	echo '<br>'.'Please fill full the information!';
else
if (isset($_POST['user'])&&isset($_POST['email'])&&isset($_POST['email_new']))	
{
	$user =addslashes(mysql_real_escape_string($_POST['user']));
	$email_new =addslashes(mysql_real_escape_string($_POST['email_new']));
	$email =addslashes(mysql_real_escape_string($_POST['email']));
	$sql = mysql_query("select * from user where user = '$user'");
	if (mysql_num_rows($sql)>0)
	{
		$row = @mysql_fetch_array($sql);
		if ($row['email'] == $email)
		{
			$id=$row['id'];
			$change=mysql_query("UPDATE `user` SET `email`= '$email_new' where `user` = '$user'");
			if ($change) header("Location: thongtincanhan.php");
			else echo 'Can not change your email!';
		}
		else echo '<br>'.'Wrong email';
	}
	else echo '<br>'."Do not exist!";
}