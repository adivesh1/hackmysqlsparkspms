<?php

require('utils.php');
require('spark_fun.php');

if( isset($_POST['submit']) ){
	
	$rnum = trim($_POST['rnum']);
	$rnum = strip_tags($rnum);
	$rnum = htmlspecialchars($rnum);

	$attianed_email = trim($_POST['attianed_email']);
	$attianed_email = strip_tags($attianed_email);
	$attianed_email = htmlspecialchars($attianed_email);
	
$spark_rid="";

$Text="**Registration Update**<br>A New Patient Attendant $attianed_email has been added<br>Get Well Soon !!";

$spark_rid=get_sparkroom_id($rnum);

echo $spark_rid."<br>";
echo $attianed_email."<br>";
echo $rnum."<br>";

add_preson_in_spark_room($spark_rid,$attianed_email,$rnum);

send_smg_in_spark_room($spark_rid,$Text);

header("location:admin_home.php");
}
?>