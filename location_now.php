<?php
include("connect_database.php");
$data=array();
$error=1;
$id_imei=addslashes($_POST['id_imei']);
	$sql_location=mysql_query("select * from location where id_imei=$id_imei");
	if (mysql_num_rows($sql_location)>0)
	{
		$error=0;
		$data=mysql_fetch_assoc($sql_location);
	}
	else $error=3;
$json['error']=$error;
$json['data']=$data;
echo json_encode($json);
?>