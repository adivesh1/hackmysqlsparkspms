<?php
require_once('auth.php');

include 'spark_fun.php';
include 'utils.php';

 if ( isset($_POST['admin_patient']) ) {
  
  // clean user inputs to prevent sql injections
  $fname = trim($_POST['fname']);
  $fname = strip_tags($fname);
  $fname = htmlspecialchars($fname);
  
  $lname = trim($_POST['lname']);
  $lname = strip_tags($lname);
  $lname = htmlspecialchars($lname);
  
  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $address1 = trim($_POST['address1']);
  $address1 = strip_tags($address1);
  $address1 = htmlspecialchars($address1);
  
  $address2 = trim($_POST['address2']);
  $address2 = strip_tags($address2);
  $address2 = htmlspecialchars($address2);
  
  $nursing_station = trim($_POST['nursing_station']);
  $nursing_station = strip_tags($nursing_station);
  $nursing_station = htmlspecialchars($nursing_station);
  
  $doctor = trim($_POST['doctor']);
  $doctor = strip_tags($doctor);
  $doctor = htmlspecialchars($doctor);
  
  $department = trim($_POST['department']);
  $department = strip_tags($department);
  $department = htmlspecialchars($department);
  
  $room_number = trim($_POST['room_number']);
  $room_number = strip_tags($room_number);
  $room_number = htmlspecialchars($room_number);
  
  $amount_collection=trim($_POST['room_number']);
  $amount_collection=strip_tags($room_number);
  $amount_collection=htmlspecialchars($room_number);
  
  /*Spark_room Name*/
  $spark_rname="SPMS"."_".$fname."_".$lname."_".$room_number;
  $spark_rid="";
  $nurse_email="";
  $doctor_email="";
  
   /*Create Spark Room for the Patient*/
   $spark_rid=create_room($spark_rname);
   
   $nurse_email=get_nurse_email($nursing_station);
   $doctor_email=get_doctor_email($doctor);

  /*Add Patient to Spark Room*/
   add_preson_in_spark_room($spark_rid,$email,$room_number);
   
   /*Add Nurse to Spark Room*/
   add_preson_in_spark_room($spark_rid,$nurse_email,$room_number);

   /*Add Doctor to Spark Room*/
   add_preson_in_spark_room($spark_rid,$doctor_email,$room_number);
   
   /*Connect Mysql DB*/
	$mysql_hostname = "sql6.freemysqlhosting.net";
	$mysql_user = "sql6139629";
	$mysql_password = "FKeMD1yudJ";
	$mysql_database = "sql6139629";

   $conn = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password);
   
   if ($conn->connect_error){
	   die("Connection failed: " . $conn->connect_error);
   }
	/*Query to Insert Patient Information*/
    $sql = "INSERT INTO $mysql_database.patient_info(fname,lname,phone,email,address1,
		address2,nursing_station,doctor,department,rnum,spark_rname,spark_rid)VALUES('$fname','$lname','$phone','$email',
		'$address1','$address2','$nursing_station','$doctor','$department','$room_number','$spark_rname','$spark_rid')";
	
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
	
	/*Update Initial Amount in Billing DB*/
	$conn = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password);
   
   if ($conn->connect_error){
	   die("Connection failed: " . $conn->connect_error);
   }
   $currdate=date('d-M-y_h-i');
   $paticular="Initial Deposite";
   
   $sql ="INSERT INTO $mysql_database.bill_info(rnum,date,title,rate,qty,amount)VALUES('$room_number','$currdate','$paticular',
	       '$amount_collection','1','$amount_collection')";
			
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

  $conn->close();
  
  $Text="**Registration Department Update**<br>New Patient Is admitted<br>For Any Clarification Please Ping us<br>Get well Soon !!<br>";
  send_smg_in_spark_room($spark_rid,$Text);
  header("location:admin_home.php");
 }
?>