<?php
session_start();
if (isset($_SESSION['user_id']))
	header("Location: index.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - GPSTracking</title>
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
	<link rel="stylesheet" href="css/style.css">
</head>

<body> 
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
	<div class="login">
		<div class="login-header">
			<h1>Login</h1>
		</div>
		<form action="login.php" method="POST">
			<div class="login-form">
				<h3>Username:</h3>
				<input type="text" placeholder="Username" name="user" required/><br>
				<h3>Password:</h3>
				<input type="password" placeholder="Password" name="pass" required/><br>
				<input type="image" name="Login" src="../images/Login.png" value="Submit" /></br>
				<a class="sign-up" href = "dangky_form.php">Sign Up!</a></br>
				<a class="download" href = "gps.apk" target="blank"><font color = "#FFFFFF">Download file gps.apk</font></a></br>
				<br>
			</div>
		</form>
	</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
	<script src="js/index.js"></script>
</body>
</html>