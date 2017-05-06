<?php
$location = '(10.888939483882936, 106.75106048583984)';
$location = str_replace("(","",$location);
$location = str_replace(")","",$location);
$location = str_replace(",","",$location);
$location = explode(' ',$location);
echo $location;
echo '<br>';
$lat = $location[0];
$lng = $location[1];
echo $lat;
echo '<br>';
echo $lng;
?>