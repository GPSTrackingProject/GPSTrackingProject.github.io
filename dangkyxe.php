<?php
require_once('connect_database.php');
$user = addslashes(mysql_real_escape_string($_POST['user']));
$pass = md5(sha1(md5($_POST['pass'])));
$imei = addslashes(mysql_real_escape_string($_POST['imei']));
$bangsoxe = addslashes(mysql_real_escape_string($_POST['bangsoxe']));
$sql = mysql_query("select * from user where user = '$user'");
if (mysql_num_rows($sql)>0)
	{
		$admin = @mysql_fetch_array($sql);
		if ($admin['pass'] == $pass)
		{
			$user_id = $admin['id'];
			$a = mysql_query("INSERT INTO `imei`(`user_id`, `bangsoxe`, `so_imei`) VALUES ('$user_id','$bangsoxe','$imei')");
			if ($a)
			{
				$id_imei=mysql_insert_id();
				$tmp=mysql_query("insert into location (id_imei,lat,lng) values($id_imei,'0','0')");
				echo 'Successful';
			}
			else echo 'Incomplete';
		}
		else echo 'Wrong password';
	}
	else echo "None";

?>