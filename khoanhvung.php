<?php
session_start();
require_once('mysql.php');
if(!isset($_SESSION['user_id']))
{
	header("Location:login_form.php");
}
$user_id=$_SESSION['user_id'];
	$row =array();
	$imei='';
	$sql= mysql_query("select * from imei where user_id = '$user_id'");
	while ($rowimei=mysql_fetch_array($sql))
	{
		$imei = $rowimei['so_imei'];
		$bangsoxe = $rowimei['bangsoxe'];
		array_push($row,$rowimei);
	}

foreach ($row as $value)
  {
	$id_imei = $value['id'];
  }
$sql_1= mysql_query("select * from location where id_imei='$id_imei'");
$rowlocation=mysql_fetch_array($sql_1);
$lat=$rowlocation['lat'];
$lng=$rowlocation['lng'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCPQ9dB20pXTAIzaSyCPQ9dB20pXTDrm8iQlR_8GBhfxwGRiijoDrm8iQlR_8GBhfxwGRiijo&sensor=FALSE"> </script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<style>
      #map_canvas { height: 600px }
</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi"></script>
	<script type="text/javascript">
	var map;
	var marker;
	var infowindow;	
	var event;
	var location;
	var _lat;
	var _lng;
	var markersArray = [];
	var flightArray=[];
	
	function initialize() {
		var latlng = new google.maps.LatLng(<?php echo $lat.','.$lng;?>);
		//var latlng = new google.maps.LatLng(10.9545432662573,106.830630115056);
		var mapOptions = {
    zoom: 15,
    center: latlng
  }
map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
google.maps.event.addListener(map, 'click', function(event) {
	$(function(){
    var inputVal = $('input').val(placeMarker(event.latLng));
});
placeMarker(event.latLng);
});
//hàm placeMarker() sẽ thay thế 1 điểm được click bằng 1 marker và infowindow có chứa thông tin về tọa độ của điểm
function placeMarker(location) {
marker = new google.maps.Marker({
position: location,
map: map,
});
_lat = location.lat();
_lng = location.lng();
/*infowindow = new google.maps.InfoWindow({
content: 'Latitude: ' + _lat +
'<br>Longitude: ' + _lng
});
infowindow.open(map,marker);*/
return location;
}

	}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GPS Tracking</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
<?php include('menu.php');?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
				<?php include('left_khoanhvung.php');?>
                <div class="thumbnail">
                    <!-- đánh dâu-->
					<div id="map_canvas" class="col-md-9">
					</div>
				</div>
        </div>
	</div>
    <!-- /.container -->

    <div class="container">

        <hr>
		
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; GPS Tracking by Nguyễn Huy Tùng</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
