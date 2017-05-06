<?php
session_start();
require_once('mysql.php');
if(!isset($_SESSION['user_id']))
{
	header("Location:login_form.php");
}
$id_imei=$_GET['imei'];
$bangsoxe=$_GET['bangsoxe'];
if (!is_numeric($id_imei)) die;
$sql = mysql_query("select * from location where id_imei=$id_imei");
   while ($row_location=mysql_fetch_array($sql))
   {
	$img = $row_location['image'];
	echo $img;
   }
?>

<html>
<head>
<title>GPS Tracking</title>
<script>
init_reload();
function init_reload(){setInterval( function(){window.location.reload();},30000);}
</script>
</head>
<body>
<!-- <img src = "../IMG_5863[1].JPG" width ="480" height = "800"> -->
</body>
</html>