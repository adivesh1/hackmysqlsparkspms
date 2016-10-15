<?php
 //require_once('auth.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Blood Test Report</title>
		<script type="text/javascript" src="javascript/script.js"></script>
		<link rel="stylesheet" href="css/main.css"/>
		<style>body{background:black url(images/img_bg.jpg) no-repeat center top fixed}

			table {
			width:100%;
					margin-left:15px;
					margin-top:30px;
					}
			table, th, td {
					border: 1px solid black;
					border-collapse: collapse;
					}
			th, td {
				padding: 5px;
				text-align: center;
					}
			table#t01 tr:nth-child(even) {
			background-color: #eee;
					}
			table#t01 tr:nth-child(odd) {
			background-color:#fff;
					}
			table#t01 th {
			background-color: black;
			color: white;
					}
</style>
		</style>
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
			<form action="" method = 'post'>
				<input class="button" type="submit" name = "register_patient"value='Get Report Req'></button></form>
			<form action="" method = 'post'>
				<input class="button" type="submit" name = "Release Patient"value='Update Report'></button></form>
			</div>
			</div>
			<div id="content_right">
        <div id="schedule_test_box">
		    <form action="pathology_schedule_blood_collection_time.php" method="post">
		    Blood Collection Time : <input type='time' style="width=50px" name="schedule_time">
			Room Number : <input style="width=10px" name="rnum" placeholder="Enter Room Number">
			<input class="schedule_button" type="submit" name="time_schedule" value="Schedule Test">
			</form>
		</div>
        <table>
		 <tr id="report_req_table"> 
		     <th>Blood Test</th>
			 <th>Result</th>
			 <th>Ref Value</th>
			 <th>Units</th>
		 </tr>
<!-- call php function for getting the detail-->

<?php

   $dbhost = 'sql6.freemysqlhosting.net';
   $dbuser = 'sql6139629';
   $dbpass = 'FKeMD1yudJ';
   error_reporting(E_ALL ^ E_DEPRECATED);
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
	$room_num=$_POST['room_num_d'];
      
	 mysql_select_db('sql6139629');
     $sql="SELECT test_name,Resvalue,Refvalue,units FROM sql6139629.lab_test_info where rnum='$room_num'";
	 
	 $result = mysql_query($sql);
          If(mysql_num_rows($result)>0)
          {
            while($row=mysql_fetch_array($result))
            { 
		      $test_name=$row['test_name'];
			  $Resvalue=$row['Resvalue'];
			  $Refvalue=$row['Refvalue'];
			  $units=$row['units'];
		     echo
			  "<tr id= 'test_data'>
			   <td>$test_name</td>
			   <td>$Resvalue</td>
               <td>$Refvalue</td>
               <td>$units</td>
              </tr>";
            }
          }
   mysql_close($conn);

?>
		</table>
	    </div><!-- Content Right-->
        </div><!-- Content Close-->		
		<div id="footer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &copy;	Copyright SPMS 2016. All rights reserved.
		</div>
		</div>
     </body>
</html>