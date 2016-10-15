<?php
require('utils.php');
require('spark_fun.php');

 $time=$_POST['schedule_time'];
 $rnum=$_POST['rnum'];
 
 $spark_rid=get_sparkroom_id($rnum); /*hardCode the Room Number*/
 
 $msg="**Pathology Department Update**<br>Blood Sample Collection Schedule at<br>".$time."<br>Get Well Soon!!";
 
 send_smg_in_spark_room($spark_rid,$msg);
 
 header("location:pathology_home.php");
?>
