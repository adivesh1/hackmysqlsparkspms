<?php
  //require_once('auth.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pathology Home</title>
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
					Hi Pathologist
				</div>
				<div class="dropdown-content">
					<a href="/index.php">Logout</a>
				</div>
			</div>
		</div>
		
		<div id="content">
			<div id="content_left">
			<div id="ADMIN_OPTION">
			<form action="get_test_req.php" method = 'post'>
				<input class="button" type="submit" name = "get_report_req"value='Get Report Req'></button></form>
			<form action="" method = 'post'>
				<input class="button" type="submit" name = "update_report"value='Update Report' DISABLE></button></form>
			</div>
			</div>
			<div id="content_right">
				<div id="release_box">
				  <form action="update_blood_repot_reqsult_details.php" method="post">
				    <div style="height:30px; width:400px; text-align:left;"><font color="white">PATIENT ROOM NUMBER 
					</font> <input style="height:20px; width:auto; background-color:#b2f4e0;" type="text" name="room_num_d"
              					id="room_num_id" required></div>
				  <input class="button" type="submit" name = "submit" value='Get Detail' ></button></form>
				</div>
			</div>
		</div>	
		<div id="footer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &copy;	Copyright SPMS 2016. All rights reserved.
		</div>
	</div></body>
</html>