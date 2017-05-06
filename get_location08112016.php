<?php
require_once('connect_database.php');

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

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
$sql_user = mysql_query("select * from user where user = '$user'");
$lat=str_replace(",",".",$lat);
$lng=str_replace(",",".",$lng);

if (mysql_num_rows($sql_user)>0)
	{
		$admin = @mysql_fetch_array($sql_user);
		if ($admin['pass'] == $pass)
		{
			
			$user_id = $admin['id'];
			$tmp = mysql_fetch_array(mysql_query("select * from imei where so_imei='$so_imei'"));
			$id_imei=$tmp['id'];
			$vitri=getaddress($lat,$lng);			
			$sql_tracking= mysql_fetch_array(mysql_query("select * from location where id_imei = '$id_imei'"));
			$pre_lat=$sql_tracking['lat'];
			$pre_lng=$sql_tracking['lng'];
			$pre_time=$sql_tracking['time'];
			$pre_date=$sql_tracking['date'];
			$pre_lat=str_replace(",",".",$pre_lat);
			$pre_lng=str_replace(",",".",$pre_lng);
			$pre_tocdo=$sql_tracking['tocdo'];
			$distance = distance($lat,$lng,$pre_lat,$pre_lng,'K');
			$tgian=strtotime($datetime)-strtotime($pre_time.' '.$pre_date);
			$sql_1= mysql_query("select * from khoanhvung where bangsoxe='60AL-01907'");
			$rowlocation=mysql_fetch_array($sql_1);
			$lat1=$rowlocation['lat'];
			$lng1=$rowlocation['lng'];
			$lat2=$rowlocation['lat2'];
			$lng2=$rowlocation['lng2'];
			if ($tgian>20)
			{
			$tgian = $tgian/3600;
			$tocdo = round($distance/$tgian); 
			if ($tocdo-$pre_tocdo<20)
			{
			$b = mysql_query("UPDATE `location` SET `lat`= '$lat' ,`lng`= '$lng' , `date`= '$today' , `time`= '$time' , `vitri`= '$vitri' , `tocdo`= '$tocdo'  WHERE `id_imei` =  '$id_imei' ");
			$c = mysql_query("INSERT INTO `tracking`(`id_imei`,`lat`, `lng`, `date`, `time`, `vitri`, `tocdo`) VALUES('$id_imei' , '$lat' , '$lng' , '$today' , '$time' , '$vitri' , '$tocdo')");
			//echo $lat1;echo $lng1;
			//echo $lat2;echo $lng2;
			if ($lat1>lat2)
			{
				if ($lng1>$lng2)
				{
					if (($lng>$lng1 || $lng<$lng2)|| ($lat>$lat1 || $lat<$lat2) )
					{
						//gui mail
						//include('sendmail.php');
echo 'Xe đã ra khỏi vùng quy định';
					}					
				}
				if ($lng1<$lng2)
				{
					if (($lng<$lng1 || $lng>$lng2)|| ($lat>$lat1 || $lat<$lat2) )
					{
						//gui mail
						//include('sendmail.php');
echo 'Xe đã ra khỏi vùng quy định';
					}	
				}
			}
			if ($lat1<lat2)
			{
				if ($lng1>$lng2)
				{
					if (($lng>$lng1 || $lng<$lng2)|| ($lat<$lat1 || $lat>$lat2) )
					{
						//gui mail
						//include('sendmail.php');
echo 'Xe đã ra khỏi vùng quy định';
					}					
				}
				if ($lng1<$lng2)
				{
					if (($lng<$lng1 || $lng>$lng2)|| ($lat<$lat1 || $lat>$lat2) )
					{
						//gui mail
						//include('sendmail.php');
echo 'Xe đã ra khỏi vùng quy định';
					}	
				}
			}
			
			echo  'Success';
			}
			}
			
			
		}
		else echo 'Wrong password';
	}
	else echo "None";

?>