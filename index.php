<?php
//Start session
session_start();	
//Unset the variables stored in session
unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_FIRST_NAME']);
unset($_SESSION['SESS_LAST_NAME']);
?>
<?php
ob_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<script type="text/javascript" src="javascript/script.js"></script>
		<link rel="stylesheet" href="css/main.css"/>
		<style>body{background:black url(images/img_bg.jpg) no-repeat center top fixed}</style>
	</head>
	<body><div id="main">
		<div id="header">
			<div id="logo">
				<img width="150px" height="150" src="images/logo.jpg"></img>
			</div>
			<div id="middle">
				<div id="title">Smart Patient Monitoring System</div>
			</div>
			<div id="user_div" class="dropdown">
				
				<div id="user_icon_div">
					<img id="user_icon" width="100px" height="100" alt="User" src="images/user_icon.jpg"></img>
				</div>
				
				<div id="username_div">
					Login
				</div>
			</div>
		</div>
		
		<div id="content">
			<div id="login_form">
				<form method = "post" action="login_exec.php">
					<div style="width:400px; height:10px"></div>
					<div style="height:30px; width:400px; text-align:center;">Username:<input style="height:20px; width:auto; background-color:#b2f4e0;" type="text" name="username" id="username_field" value="" required></div>
					<div style="width:400px; height:10px"></div>
					<div style="height:30px; width:400px; text-align:center;">Password:<input style="height:20px; width:auto; background-color:#b2f4e0;" type="password" name="password" id="password_field" value="" required></div>
					<div style="width:400px; height:10px"></div>
					<div style="height:auto; width:auto; margin-left:160px;"><input style="height:30px; width:80px; font-size:18px; background-color:#101f44; color:#bee8b0;" type="SUBMIT" name = "submit" value="Login"></div>
				</form>
			</div>
		</div>
		
		<div id="footer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &copy;	Copyright SPMS 2016. All rights reserved.
		</div>
	</div></body>
</html>