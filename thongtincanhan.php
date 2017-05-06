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
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<script type="text/javascript" src="js/function.js"></script>
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
				<?php include('left3.php');?>
                <div class="thumbnail">
                    <!-- đánh dâu-->
<table id="example" width= 50%>
<tr>
    <th>&nbsp;</th>
    <th>Mục</th>
    <th>Thông tin</th>
</tr>
<tr>
    <td><a href="thongtinform_user.php">Sửa</a></td>
    <td>Tài khoản</td>
    <?php
	$sql_3= mysql_query("select * from user where id='$user_id'");
	while ($rowuser=mysql_fetch_array($sql_3))
					{
					$user = $rowuser['user'];
					echo '<td>'.$user.'</td>';
					}
	?>
</tr>
<tr>
    <td><a href="thongtinform_pass.php">Sửa</a></td>
    <td>Mật khẩu</td>
    <td>...</td>
</tr>
<tr>
   <td><a href="thongtinform_email.php">Sửa</a></td>
    <td>Email</td>
	<?php
	$sql_3= mysql_query("select * from user where id='$user_id'");
	while ($rowuser=mysql_fetch_array($sql_3))
					{
					$email = $rowuser['email'];
					echo '<td>'.$email.'</td>';
					}
	?>
</tr>
<tr>
   <td><a href="thongtinform_pnumber.php">Sửa</a></td>
    <td>Số điện thoại</td>
	<?php
	$sql_3= mysql_query("select * from user where id='$user_id'");
	while ($rowuser=mysql_fetch_array($sql_3))
					{
					$pnumber = $rowuser['pnumber'];
					echo '<td>'.$pnumber.'</td>';
					}
	?>
</tr>
 <?php				 
					$sql_2= mysql_query("select * from imei where user_id='$user_id'");
					$i=0;
					while ($rowimei=mysql_fetch_array($sql_2))
					{
					$i++;
					$imei = $rowimei['so_imei'];
					$bangsoxe = $rowimei['bangsoxe'];
					echo '<tr>';
                                        echo '<td><a href="thongtinform_bangsoxe.php">Sửa</a></td><td>Tên đối tượng '.$i.'</td>';
                                        echo '<td>'.$bangsoxe.'</td>';
                                        echo '<tr>';
					echo '<tr>';
					echo '<th>&nbsp;</th><td>Số imei đối tượng '.$i.'</td>';
					echo '<td>'.$imei.'</td>';
					echo '</tr>';
					}
?>

</table>
<style>
table#example {
    border-collapse: collapse;
	font-size: 150%;
}
#example tr {
    background-color: #eee;
    border-top: 1px solid #fff;
}
#example tr:hover {
    background-color: #ccc;
}
#example th {
    background-color: #fff;
}
#example th, #example td {
    padding: 3px 5px;
}
#example td:hover {
    cursor: pointer;
}
</style>
<script>
$(document).ready(function() {

    $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});
</script>

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
