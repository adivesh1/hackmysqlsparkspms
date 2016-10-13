<?php

require('generate_bill_pdf.php');
require('spark_fun.php');
require('utils.php');

  if(isset($_POST)==true && empty($_POST)==false){
	$paticular = $_POST['paticular'];
	$rate = $_POST['rate'];
	$qty = $_POST['qty'];
	$total = $_POST['total'];
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
		'$rate[$a]','$qty[$a]','$total[$a]')";

	if($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	   }
	}
	$conn->close();
	
	$sparkrum_id=get_sparkroom_id($rnum);
	
	/*Generate PDF FOR Invoice*/
	$filename=generate_bill_pdf($rnum);
	
	echo $filename;
	echo $sparkrum_id;
	
	$Text="**Thanks For Visting SPMS You Current Payment Dues are Posted**";
	
	/*Send File in Spark Room*/
	send_attachment_in_spark_room($sparkrum_id,$Text,$filename);
	
	/*Generate Pdf of Bill and Post in Room*/
	//header("location:billing_home.php");
  }				
?>