<?php 
require_once('mysql.php');
$bangsoxe = addslashes(mysql_real_escape_string($_GET['bangsoxe']));
//$bangsoxe ='60AL-01907';
$sql_1= mysql_query("select * from khoanhvung where bangsoxe='$bangsoxe'");
$rowlocation=mysql_fetch_array($sql_1);
$lat=$rowlocation['lat'];
$lng=$rowlocation['lng'];
$lat2=$rowlocation['lat2'];
$lng2=$rowlocation['lng2'];
$lat_td = (((float)$lat)+((float)$lat2))/2;
$lng_td = (((float)$lng)+((float)$lng2))/2;
//$lat = '10.9545432662573';
//$lng = '106.830630115056';		
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
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript">
	var map;
	var marker;
	var _marker
	var infowindow;	
	var event;
	var location;
	var _location;
	var _lat;
	var _lng;
	var markersArray = [];
	var a;
	var b;
	var c;
	var d;
	var flightPath;
	var myTrip;
	
	function initialize() {
		//var latlng = new google.maps.LatLng(<?php echo $lat.','.$lng;?>);
		_location = new google.maps.LatLng(<?php echo $lat.','.$lng;?>);
		a = new google.maps.LatLng(<?php echo $lat.','.$lng;?>);
		b = new google.maps.LatLng(<?php echo $lat.','.$lng2;?>);
		c = new google.maps.LatLng(<?php echo $lat2.','.$lng2;?>);
		d = new google.maps.LatLng(<?php echo $lat2.','.$lng;?>);
		td = new google.maps.LatLng(<?php echo $lat_td.','.$lng_td;?>);
		var mapOptions = {
    zoom: 15,
    center: td
  }
map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
/*marker = new google.maps.Marker({
position: b,
});	
marker.setMap(map);*/

path_1=[ a, b, c, d, a ];
	flightPath = new google.maps.Polygon({
    path: path_1,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    //icon: 'car.png',
    strokeWeight: 2,
	fillColor:"#FF0000",
	fillOpacity:0.4
	});
	flightPath.setMap(map);
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
                <div class="thumbnail">
                    <!-- đánh dâu-->
					<div id="map_canvas">
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
