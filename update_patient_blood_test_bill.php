<?php

require('generate_bill_pdf.php');
require('spark_fun.php');
require('utils.php');

  if(isset($_POST)==true && empty($_POST)==false){
	$paticular = $_POST['paticular'];
	$rate = $_POST['rate'];
	$rnum= $_POST['rnum'];
	
	/*Insert the Billing Info in Billing Database*/
	/*Connect Mysql DB*/
	$mysql_hostname = "sql6.freemysqlhosting.net";
	$mysql_user = "sql6139629";
	$mysql_password = "FKeMD1yudJ";
	$mysql_database = "sql6139629";

	$conn = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password);
   
   /*Getting total Billing Info*/
	foreach($paticular as $a => $b){
		$a+1;
	
	$currdate=date('d-M-y_h-i');
   
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	/*Query to Insert Patient Information*/
	$sql = "INSERT INTO $mysql_database.bill_info(rnum,date,title,rate,qty,amount)VALUES('$rnum','$currdate','$paticular[$a]',
		'$rate[$a]','1','$rate[$a]')";

	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	   }
	
	/*Query to Insert Patient Information*/
	$sql = "INSERT INTO $mysql_database.lab_test_info(rnum,test_name,Resvalue,Refvalue,units)VALUES('$rnum','$paticular[$a]',
		'NA','1','NA')";
	
		if($conn->query($sql) === TRUE){
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	   
	}
	/*Make an Entry in Pathology*/
	
	$sparkrum_id=get_sparkroom_id($rnum);
	
	echo $sparkrum_id;
	
	/*Generate PDF FOR Invoice*/
	$filename=generate_bill_pdf($rnum);	
	
	$Text="**Accounts Department Update**<br>Please Find receipt which You Need to Pay Against Blood Test<br>For Any Clarification Regaring Bill Please Ping us<br>Get well Soon !!<br>";
	 
	 echo $filename;
	/*Send File in Spark Room*/
	send_attachment_in_spark_room($sparkrum_id,$Text,$filename);
	$conn->close();
	
	/*Generate Pdf of Bill and Post in Room*/
	header("location:billing_home.php");
  }				
?>