<?php
require('geneate_blood_test_report_pdf.php');
require('spark_fun.php');
require('utils.php');

if(isset($_POST)==true && empty($_POST)==false){
	$test_name = $_POST['test_name'];
	$rnum= $_POST['rnum'];
	$resvalue =$_POST['resvalue'];
	
	/*Insert the Billing Info in Billing Database*/
	/*Connect Mysql DB*/
	$mysql_hostname = "sql6.freemysqlhosting.net";
	$mysql_user = "sql6139629";
	$mysql_password = "FKeMD1yudJ";
	$mysql_database = "sql6139629";

	$conn = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password);
   
   /*Getting total Billing Info*/
	foreach($test_name as $a => $b){
		$a+1;
   
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	/*Query to Insert Patient Information*/
	$sql = "UPDATE $mysql_database.lab_test_info set resvalue='$resvalue[$a]' where rnum='$rnum' AND test_name='$test_name[$a]'";
	//echo "Hello".$sql;
	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	   }
	}
	$conn->close();
	
	$sparkrum_id=get_sparkroom_id($rnum);
	
	/*Generate PDF FOR Invoice*/
 	$filename=generate_blood_test_pdf($rnum);	
	
	$Text="**Pathology Department Update**<br>Please find the Blood Test Report<br>For Any Clarification Regaring Report<br>Please Ping us<br>Get well Soon !!<br>";
	
	/*Send File in Spark Room*/
	send_attachment_in_spark_room($sparkrum_id,$Text,$filename);
	
	/*Generate Pdf of Bill and Post in Room*/
    header("location:pathology_home.php");
  }		
?>