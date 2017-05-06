<?php
$db_host = "127.6.125.130"; 
$db_name    = 'php';
$db_username    = 'adminSBwwLCE';
$db_password    = 'Xmfi5gjR9wvC';
@mysql_connect("{$db_host}", "{$db_username}", "{$db_password}") or die("Kh�ng the ket noi database");
@mysql_select_db("{$db_name}") or die("Kh�ng the chon database");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$today=date("d-m-Y");// ngay hien tai
$time=date("H:i:s");// gio hien tai
$datetime=date("H:i:s d-m-Y");
?>