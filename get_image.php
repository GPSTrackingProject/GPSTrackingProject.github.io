<?php
require_once('connect_database.php');
$id_imei = addslashes(mysql_real_escape_string($_POST['id_imei']));
$imgFilename = "IMG_5863[1].JPG";
$fh = fopen($imgFilename, "rb");
$imgData = fread($fh, filesize($imgFilename));
fclose($fh);
$sql = mysql_query("UPDATE `php`.`location` SET `image` = 'abc.jpg' WHERE `location`.`id_imei` = $id_imei");
echo $sql;
?>