<?php
 require_once('auth.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>New Patient Admission</title>
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
				<input class="button" type="submit" name = "register_patient"value='New Patient'></button></form>
			<form action="search_patient.php" method = 'post'>
				<input class="button" type="submit" name = "Release Patient"value='Patient Info'></button></form>
			</div>
			</div>
<?php
/*Global Variable*/
$get_fname = "";
$get_lname = "";
$get_pnum= "";
$get_email= "";
$get_addr1= "";
$get_addr2= "";
$get_nursing_stat= "";
$get_doctor_name= "";
$get_spark_room= "";
$get_spark_id= "";
$get_total_bill= "";
$get_rnum="";
$get_department="";
$auth=false;

   $dbhost = 'sql6.freemysqlhosting.net';
   $dbuser = 'sql6139629';
   $dbpass = 'FKeMD1yudJ';
   error_reporting(E_ALL ^ E_DEPRECATED);
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   $room_num=$_POST['room_num_d'];
   
   $sql = "SELECT * FROM patient_info WHERE rnum='$room_num'";
   
   mysql_select_db('sql6139629');
   $retval = mysql_query( $sql, $conn );
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	   $get_fname = "{$row['fname']}";
	   $get_lname = "{$row['lname']}";
	   $get_pnum= "{$row['phone']}";
	   $get_email= "{$row['email']}";
	   $get_addr1= "{$row['address1']}";
       $get_addr2= "{$row['address2']}";
	   $get_nursing_stat= "{$row['nursing_station']}";
	   $get_doctor_name= "{$row['doctor']}";
	   $get_department="{$row['department']}";
	   $get_rnum="{$row['rnum']}";
	   $get_spark_room="{$row['spark_rname']}";
	   $auth=TRUE;
   }
   mysql_close($conn);
   
if(!$auth){
echo "<script>
alert('Room Number InCorrect');
window.location.href='search_patient.php';
</script>";
}
?>
			<div id="content_right">
				<div id="new_patient_form">
					<form method = "post" action="discharge_patient.php">
						<div class="new_patient_field_div">
							First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="fname" value='<?php echo $get_fname; ?>' readonly="true" />
						</div>				
						<div class="new_patient_field_div">
							Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="lname" value='<?php echo $get_lname; ?>' readonly="true" />
						</div>
						<div class="new_patient_field_div">
							Phone Number:&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="tel" name="phone" value='<?php echo $get_pnum; ?>' readonly="true" />
						</div>				
						<div class="new_patient_field_div">
							Email Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="email" name="email" value='<?php echo $get_email; ?>' readonly="true" />
						</div>				
						<div class="new_patient_field_div">
							Address Line 1:&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="address1" value='<?php echo $get_addr1; ?>' readonly="true" />
						</div>				
						<div class="new_patient_field_div">
							Address Line 2:&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="address2" value='<?php echo $get_addr2 ?>' readonly="true" />
						</div>				
						<div class="new_patient_field_div">
							Nursing Station:&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="nursing_station" value='<?php echo $get_nursing_stat; ?>' readonly="true" list = "nursing_stat"/>
						</div>				
						<div class="new_patient_field_div">
							Doctor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input class="new_patient_field_input" type="text" name="doctor" value='<?php echo $get_doctor_name; ?>' readonly="true" />
							
						</div>				
						<div class="new_patient_field_div">
							Room Number:&nbsp;&nbsp;<input class="new_patient_field_input" name="room_number" id="ROOM_NUMBER" value='<?php echo $get_rnum; ?>' readonly="true" />
						</div>
						<div class="new_patient_field_div">
							Department:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input class="new_patient_field_input" type="text" name="doctor" value='<?php echo $get_department; ?>' readonly="true"/>
							
						</div>	
						<div class="spark_room">
							Spark Room Name:<input class="new_patient_field_input" name="spark_room_name" id="spark_room_id" value='<?php echo $get_spark_room; ?>' readonly="true" />
						</div>
						<div class="discharge_button">
							&nbsp;&nbsp;&nbsp;&nbsp;<input style="margin-top:50px; margin-left:180px;" class="button" type="submit" value="Discharge Patient" name="admin_patient" value="" readonly="true" />
						</div>						
					</form>
				</div>
			</div>
		</div>
		
		<div id="footer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &copy;	Copyright SPMS 2016. All rights reserved.
		</div>
	</div></body>
</html>