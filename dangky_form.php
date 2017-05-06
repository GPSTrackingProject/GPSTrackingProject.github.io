<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sign up - GPSTracking</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="carbonForm">
	<h1>Signup</h1>
    <form action="dangky.php" method="post">
    <div class="fieldContainer">
        <div class="formRow">
            <div class="label">
                <label for="name">Name:</label>
            </div>
            <div class="field">
                <input type="text" name="user" required/>
            </div>
        </div>                
        <div class="formRow">
            <div class="label">
                <label for="pass">Password:</label>
            </div>
            <div class="field">
                <input type="password" name="pass" required/>
            </div>
        </div>
		<div class="formRow">
            <div class="label">
                <label for="email">Email:</label>
            </div>          
            <div class="field">
                <input type="text" name="email" required />
            </div>
        </div>	
		<div class="formRow">
            <div class="label">
                <label for="pnumber">Phone:</label>
            </div>          
            <div class="field">
                <input type="text" name="pnumber" required />
            </div>
        </div>		
    </div> <!-- Closing fieldContainer -->    
    <div class="signupButton">
        <input type="submit" name="Sign up" id="submit" value="Sign up" required/>
    </div>    
    </form>       
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
