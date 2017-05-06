<?php
session_start();
require_once('mysql.php');
if(!isset($_SESSION['user_id']))
{
	header("Location:login_form.php");
}
$id_imei=$_GET['imei'];
$bangsoxe=$_GET['bangsoxe'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date=date("d-m-Y");
if (isset($_GET['date']))
{
	$date=$_GET['date'];
}
if (!is_numeric($id_imei)) die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCPQ9dB20pXTAIzaSyCPQ9dB20pXTDrm8iQlR_8GBhfxwGRiijoDrm8iQlR_8GBhfxwGRiijo&sensor=FALSE"> </script>
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
	var infowindow;
	var image = 'car.png';
	var markersArray = [];
	var flightArray=[];
	var markerHientai;
	var i_hientai;
	var flightPath;
	var path_1=[];
// them marker
function hienMarker()
{
	var i=i_hientai;
	path_1=[ flightArray[i-1], flightArray[i] ];
	flightPath = new google.maps.Polyline({
    path: path_1,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    icon: 'car.png',
    strokeWeight: 2
	});
	flightPath.setMap(map);
	markersArray[i-1]["marker"].setVisible(false);
	markersArray[i]["marker"].setMap(map);
	i_hientai++;
}
	var a=1;
function btnxemlaiclick()
{
	i_hientai=1;
	if (a == 1)
	{
		if(flightArray.length>=1)
		{
			markersArray[0]["marker"].setMap(map);
			for ( var i =1; i<flightArray.length;i++)
			{
				setTimeout(function() {hienMarker();}, i*250);
				a++;
			}
			if (flightArray.length==a)
			{
				setTimeout(function() {a=0;}, i*250);
			}
		}
	}
}
<?php
$sql_quatrinh=mysql_fetch_array(mysql_query("select lat, lng from tracking where id_imei=$id_imei and date='$date'"));
?>
function initialize() 
{
	var latlng = new google.maps.LatLng(<?php echo $sql_quatrinh['lat'].','.$sql_quatrinh['lng']; ?>);
	var mapOptions = 
	{
		zoom: 15,
		center: latlng
	}
	map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
	<?php
	$sql=mysql_query("select * from tracking where id_imei=$id_imei and date='$date'");
	while ($row_location=mysql_fetch_array($sql))
	{
		$lat = $row_location['lat'];
		$lng = $row_location['lng'];
		$tocdo = $row_location['tocdo'];
		$vitri = $row_location['vitri'];
		$date = $row_location['date'];
		$time = $row_location['time'];
		$bangsoxe=$_GET['bangsoxe'];
		echo 'addMarker(new google.maps.LatLng('.$lat.','.$lng.'), "'.$bangsoxe.'","'.$tocdo.'","'.$vitri.'","'.$date.' '.$time.'");';
	}
	?>   
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
<?php include('menu2.php');?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
				<?php include('left2.php');?>
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
