<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign up - GPSTracking</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>
<?php
	require_once("connect_database.php");
	if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['pnumber']))
	{
	$user=addslashes(mysql_real_escape_string($_POST['user']));
	$pass=md5(sha1(md5($_POST['pass'])));
	$email=addslashes(mysql_real_escape_string($_POST['email']));
	$pnumber=addslashes(mysql_real_escape_string($_POST['pnumber']));
       if ($user!=''&&$email!=''&&$pnumber!='')
        {
			$sql=mysql_query("select * from user where user='$user'");
			if (mysql_num_rows($sql)<=0)
			{
				$a=mysql_query("insert into user (user,pass,email,pnumber) values('$user','$pass','$email','$pnumber')");
				if (@$sql)
				{
					echo "Successful!";	
					header ("Location: login_form.php");
				}
				else echo"There is an error in the sign up process!";
			}		
			else echo 'User already exists!';
        }
		else echo "Fill full the information!";
	}
	else echo "Fill full the information!";
?>