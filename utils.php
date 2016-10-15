<?php

function get_nurse_email($nursing_station){
   
   $dbhost = 'sql6.freemysqlhosting.net';
   $dbuser = 'sql6139629';
   $dbpass = 'FKeMD1yudJ';
   error_reporting(E_ALL ^ E_DEPRECATED);
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   $sql = "SELECT * FROM nurse_info WHERE dnurse_name='$nursing_station'";
   
   mysql_select_db('sql6139629');
   $retval = mysql_query( $sql, $conn );
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	   $nurse_email="{$row['nurse_email']}";
   }
   mysql_close($conn);
   return $nurse_email;
}
 	
function get_doctor_email($doctor){

   $dbhost = 'sql6.freemysqlhosting.net';
   $dbuser = 'sql6139629';
   $dbpass = 'FKeMD1yudJ';
   error_reporting(E_ALL ^ E_DEPRECATED);
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   $sql = "SELECT * FROM doctor_info WHERE doctor_name='$doctor'";
   
   mysql_select_db('sql6139629');
   $retval = mysql_query( $sql, $conn );
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	   $doctor_email="{$row['dr_email']}";
   }
   mysql_close($conn);
   return $doctor_email;
    
}

function get_sparkroom_id($rnum){
	
   $dbhost = 'sql6.freemysqlhosting.net';
   $dbuser = 'sql6139629';
   $dbpass = 'FKeMD1yudJ';
   $spark_rid="";
   error_reporting(E_ALL ^ E_DEPRECATED);
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   $sql = "SELECT spark_rid FROM patient_info WHERE rnum='$rnum'";
   
   mysql_select_db('sql6139629');

   $retval = mysql_query( $sql, $conn );
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
	   $spark_rid="{$row['spark_rid']}";
   }
   mysql_close($conn);
   return $spark_rid;
}
?>