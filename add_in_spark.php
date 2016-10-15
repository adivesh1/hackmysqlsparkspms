<?php

require('utils.php');
require('spark_fun.php');

$rnum=$_POST['rnum'];
$attianed_email=$_POST['attianed_email'];
$spark_rid="";

$Text="**Registration Update**<br>A New Patient Attained $attianed_email has Being Add<br>Get Well Soon !!";

$spark_rid=get_sparkroom_id($rnum);

add_preson_in_spark_room($spark_rid,$attianed_email);

send_smg_in_spark_room($spark_rid,$Text);

header("location:admin_home.php");

?>