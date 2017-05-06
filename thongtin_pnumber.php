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
if (!isset($_POST['user'])||!isset($_POST['pnumber'])||!isset($_POST['pnumber_new'])) 
	echo '<br>'.'Please fill full the information!';
else
if (isset($_POST['user'])&&isset($_POST['pnumber'])&&isset($_POST['pnumber_new']))	
{
	$user =addslashes(mysql_real_escape_string($_POST['user']));
	$pnumber_new =addslashes(mysql_real_escape_string($_POST['pnumber_new']));
	$pnumber =addslashes(mysql_real_escape_string($_POST['pnumber']));
	$sql = mysql_query("select * from user where user = '$user'");
	if (mysql_num_rows($sql)>0)
	{
		$row = @mysql_fetch_array($sql);
		if ($row['pnumber'] == $pnumber)
		{
			$id=$row['id'];
			$change=mysql_query("UPDATE `user` SET `pnumber`= '$pnumber_new' where `user` = '$user'");
			if ($change) header("Location: thongtincanhan.php");
			else echo 'Can not change your pnumber!';
		}
		else echo '<br>'.'Wrong pnumber';
	}
	else echo '<br>'."Do not exist!";
}