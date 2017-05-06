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
$sql = mysql_query("UPDATE `khoanhvung` SET `lat2`= '$lat' ,`lng2`= '$lng' WHERE `bangsoxe` =  '$bangsoxe' ");
echo 'Chọn điểm thứ hai thành công click hoàn thành để xem vùng được khoanh';
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
	redirectTo("khoanhvung3.php?bangsoxe="+bangsoxe);
}
</script>
</head>
<body>
<button id='btntieptuc' onclick="btntieptucclick()">Hoàn thành</button>
</body>
</html>			