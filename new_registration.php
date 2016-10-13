<?php

require_once('auth.php');

include 'spark_fun.php';

/*Global variable*/
$nurse_email="";
$doctor_email="";
 
/*variable for Patient Details*/
$reg_fname="";
$reg_lname="";
$reg_phun="";
$reg_email="";
$reg_address1="";
$reg_address2="";
$reg_nursing_stat= "";
$reg_doctor_name= "";
$reg_department="";
$reg_rnum="";
$reg_sparkroom_name="";
$reg_sparkroom_id="";

if ($_POST['admin_patient'])
 {
	$reg_fname=$_POST['fname'];
	$reg_lname=$_POST['lname'];
	$reg_phun=$_POST['phone'];
	$reg_email=$_POST['email'];
	$reg_address1=$_POST['address1'];
	$reg_address2=$_POST['address2'];
	$reg_nursing_stat=$_POST['nursing_station'];
	$reg_doctor_name=$_POST['doctor'];
	$reg_department=$_POST['department'];
	$reg_rnum=$_POST['room_number'];
	$reg_sparkroom_name=$reg_fname."_".$reg_lname."_".$reg_rnum;
    
	/*Creating Spark Room */
	$reg_sparkroom_id=create_room($reg_sparkroom_name);
	
	/*Add Patient to Spark Room*/
	add_preson_in_spark_room($reg_sparkroom_id,$reg_email);
	
	
	$nurse_email=get_nurse_email($reg_nursing_stat);
	/*Add Nurse to Spark Room*/
	add_preson_in_spark_room($reg_sparkroom_id,$nurse_email);
	
	$doctor_email=get_doctor_email($reg_doctor_name);
	/*Add Doctor to Spark Room*/
	add_preson_in_spark_room($reg_sparkroom_id,$doctor_email);
	
	
	$full_string=$reg_fname.",".$reg_lname.",".$reg_phun.",".$reg_email.",".$reg_address1.",".$reg_address2.",".$reg_nursing_stat.",".$reg_doctor_name.",".$reg_department.",".$reg_rnum.",".$reg_sparkroom_name.",".$reg_sparkroom_id."\n";
	/*Storing the Information in db file*/
    $myfile = fopen("dbfile/patient_information.db", "a");
    fwrite($myfile,$full_string);
	fclose($myfile);
	
	
	echo "<script>
	alert('Spark Room Create Successfully with Name $doctor_email,$reg_sparkroom_name');
	</script>";
	header("location:admin_home.php");
 }
/**********************************************************************************
 *    Function Name : get_nurse_email
 *    Description : This function will fetch the Nurse email from DB
 *    Parameters  : 
 **********************************************************************************/	
function get_nurse_email($reg_nursing_stat){
	/*Get the Nurse_email id and doctor email id*/
	$file_handle = fopen("dbfile/nurse_information.db", "r");
		while (!feof($file_handle)) {
		 $line = fgets($file_handle);
		 $words= explode( ",", $line );
			if($reg_nursing_stat == $words[0]) {
				// User authenticated correctly
				return $words[1];
				break;
				}
		}
		fclose($file_handle);
}
/**********************************************************************************
 *    Function Name : get_doctor_email
 *    Description : This function will fetch the doctor email from DB
 *    Parameters  : 
 **********************************************************************************/	
function get_doctor_email($reg_doctor_name){
	/*Get the Nurse_email id and doctor email id*/
	$file_handle = fopen("dbfile/doctor_information.db", "r");
	  while (!feof($file_handle)) {	    
		 $line = fgets($file_handle);
		 if(isset($line)){
		 $words= explode( ",", $line );
			if($reg_doctor_name == $words[0]) {
				// User authenticated correctly
				return $words[1];
				break;
				}
		}
		}
	fclose($file_handle);
}
?>
