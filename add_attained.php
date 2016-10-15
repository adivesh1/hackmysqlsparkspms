<?php
  //require_once('auth.php');
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
			
			<!-- Home Page Link for admin pages -->
			<div id="home_icon">
			<a href="admin_home.php"><img src="images/home_icon.jpg"></img></a>
			</div>
			
			<div id="ADMIN_OPTION">
			<form action="new_patient.php" method = 'post'>
				<input class="button" type="submit" name = "register_patient"value='Admit Patient'></button></form>
			<form action="search_patient.php" method = 'post'>
				<input class="button" type="submit" name = "Release Patient"value='Search Patient'></button></form>
			<form action="" method = 'post'>
				<input class="button" type="submit" name = "Add_New-Attained"value='Add New Attained' DISABLE></button></form>
			</div>
			</div>
			<div id="content_right">
			   <h1 style="color:#bee8b0;text-align:center; margin-top:70px"> Enter Attained Details<h1>
			   <form action="add_in_spark.php" metho="POST">
			   <div id = "attained">
			      <input style="width:70px" class="attained_rnum"  type="text" name= "rnum" placeholder="Enter Room Number">
				  <input style="width:300px" class="attained_rnum" type="email" name="attianed_email" placeholder="Enter Email ID"><br>
				  <input class="button" type="submit" name="add_attained" value="Add Attained">	 
			   </div>
			  </form>
			</div>
			
		</div>	
		<div id="footer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &copy;	Copyright SPMS 2016. All rights reserved.
		</div>
	</div></body>
</html>