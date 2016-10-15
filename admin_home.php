<?php
  require_once('auth.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Home</title>
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
					Hi Admin
				</div>
				<div class="dropdown-content">
					<a href="/index.php">Logout</a>
				</div>
			</div>
		</div>
		
		<div id="content">
			<div id="content_left">
			<div id="ADMIN_OPTION">
			<form action="new_patient.php" method = 'post'>
				<input class="button" type="submit" name = "register_patient"value='Admit Patient'></button></form>
			<form action="search_patient.php" method = 'post'>
				<input class="button" type="submit" name = "Release Patient"value='Search Patient'></button></form>
			</div>
			</div>
			<div id="content_right"></div>
		</div>	
		<div id="footer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &copy;	Copyright SPMS 2016. All rights reserved.
		</div>
	</div></body>
</html>