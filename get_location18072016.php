<?php
require_once('connect_database.php');
function getaddress($lat,$lng)
{
$url =  "http://maps.googleapis.com/maps/api/geocode/json?latlng=".trim($lat).",".trim($lng)."&sensor=false";
$json = @file_get_contents($url);
$data=json_decode($json);
$status = $data->status;
if($status=="OK")
return $data->results[0]->formatted_address;
else
return "Không có vị trí";
}
$user = addslashes(mysql_real_escape_string($_POST['user']));
$pass = md5(sha1(md5($_POST['pass'])));
$so_imei = addslashes(mysql_real_escape_string($_POST['imei']));
$lat = addslashes(mysql_real_escape_string($_POST['lat']));
$lng = addslashes(mysql_real_escape_string($_POST['lng']));
$sql = mysql_query("select * from user where user = '$user'");
$lat=str_replace(",",".",$lat);
$lng=str_replace(",",".",$lng);
if (mysql_num_rows($sql)>0)
	{
		$admin = @mysql_fetch_array($sql);
		if ($admin['pass'] == $pass)
		{
			
			$user_id = $admin['id'];
			//$a = mysql_query("INSERT INTO `imei`(`user_id`,`so_imei`) VALUES ('$user_id','$so_imei')");
			$tmp = mysql_fetch_array(mysql_query("select * from `imei` where so_imei='$so_imei'"));
			$id_imei=$tmp['id'];
$vitri=getaddress($lat,$lng);
			$b = mysql_query("UPDATE `location` SET `lat`= '$lat' ,`lng`= '$lng' , `date`= '$today' , `time`= '$time' , `vitri`= '$vitri' , `tocdo`= 40  WHERE `id_imei` =  $id_imei ");
			$c = mysql_query("INSERT INTO `tracking`(`id_imei`,`lat`, `lng`, `date`, `time`, `vitri`, `tocdo`) VALUES ( $id_imei , '$lat' , '$lng' , '$today' , '$time' , '$vitri' , 40)");
echo  'Success';
			
		}
		else echo 'Wrong password';
	}
	else echo "None";
?>