<?php
require_once('mysql.php');
$bangsoxe= addslashes(mysql_real_escape_string($_POST['bangsoxe']));
$location = addslashes(mysql_real_escape_string($_POST['location']));
$location = str_replace("(","",$location);
$location = str_replace(")","",$location);
$location = str_replace(",","",$location);
$location = explode(' ',$location);
$lat = $location[0];
$lng = $location[1];
$khoanhvung = mysql_query("select * from khoanhvung where bangsoxe='$bangsoxe'");
if (mysql_num_rows($khoanhvung)>0)
{
	$sql = mysql_query("UPDATE `khoanhvung` SET `lat`= '$lat' ,`lng`= '$lng' WHERE `bangsoxe` =  '$bangsoxe' ");
	echo 'Chọn điểm thứ nhất thành công click tiếp tục để chọn điểm thứ hai';
}
else
{
	$sql2 = mysql_query("INSERT INTO `khoanhvung`(`bangsoxe`,`lat`,`lng`) VALUES('$bangsoxe' , '$lat', '$lng')");
	echo 'Chọn điểm thứ nhất thành công click tiếp tục để chọn điểm thứ hai';
}
?>	
<html>
<head>
<script>
var bangsoxe = <?php echo json_encode($bangsoxe); ?>;
//bangsoxe = <?php echo $bangsoxe; ?>;
function redirectTo(location)
{
     window.location=location;
}
function btntieptucclick()
{
	redirectTo("khoanhvung2.php?bangsoxe="+bangsoxe);
}
</script>
</head>
<body>
<button id='btntieptuc' onclick="btntieptucclick()">Tiếp tục</button>
</body>
</html>	