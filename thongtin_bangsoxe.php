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
if (!isset($_POST['user'])||!isset($_POST['bangsoxe'])||!isset($_POST['bangsoxe_new'])) 
	echo '<br>'.'Please fill full the information!';
else
if (isset($_POST['user'])&&isset($_POST['bangsoxe'])&&isset($_POST['bangsoxe_new']))	
{
	$user =addslashes(mysql_real_escape_string($_POST['user']));
	$bangsoxe_new =addslashes(mysql_real_escape_string($_POST['bangsoxe_new']));
	$bangsoxe =addslashes(mysql_real_escape_string($_POST['bangsoxe']));
	$sql = mysql_query("select * from user where user = '$user'");
	if (mysql_num_rows($sql)>0)
	{
		$row_user = @mysql_fetch_array($sql);
		$id_user=$row_user['id'];
		$sql_imei = mysql_query("select * from imei where user_id = '$id_user'");
		$row_imei = @mysql_fetch_array($sql_imei);
		if ($row_imei['bangsoxe'] == $bangsoxe)
		{
			$id=$row_imei['id'];
			$change=mysql_query("UPDATE `imei` SET `bangsoxe`= '$bangsoxe_new' where `id` = '$id'");
			$change1=mysql_query("UPDATE `khoanhvung` SET `bangsoxe`= '$bangsoxe_new' where `bangsoxe` = '$bangsoxe'");
			if (($change)&&($change1)) header("Location: thongtincanhan.php");
			else echo 'Can not change your liense plate!';
		}
		else echo '<br>'.'Wrong license plate';
	}
	else echo '<br>'."Do not exist!";
}
?>