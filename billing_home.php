<?php
  //require_once('auth.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Account Home</title>
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
					Hi Account
				</div>
				<div class="dropdown-content">
					<a href="/index.php">Logout</a>
				</div>
			</div>
		</div>
		
		<div id="content">
			<div id="content_left">
			
			<!-- Home Page Link for account pages -->
			<div id="home_icon">
			<a href="billing_home.php"><img src="images/home_icon.jpg"></img></a>
			</div>
			
			<div id="ADMIN_OPTION">
			<form action="serach_bill.php" method = 'post'>
				<input class="button" type="submit" name = "get_patient_info"value='Prep Discharge'></button></form>		
			<form action="new_blood_test_req.php" method = 'post'>
			     <input class="button" type="submit" name = "add_new_bill"value='New Blood Test'></button></form>
			<form action="new_bill.php" method = 'post'>
				<input class="button" type="submit" name = "add_new_bill"value='Add New Bill'></button></form>
			</div>
			</div>
			<div id="content_right"></div>
		</div>	
		<div id="footer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &copy;	Copyright SPMS 2016. All rights reserved.
		</div>
	</div></body>
</html>