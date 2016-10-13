<?php
$mysql_hostname = "sql6.freemysqlhosting.net";
$mysql_user = "sql6139629";
$mysql_password = "FKeMD1yudJ";
$mysql_database = "sql6139629";
$prefix = "";
error_reporting(E_ALL ^ E_DEPRECATED);
//$connection = mysqli_connect($mysql_hostname, $mysql_user,$mysql_password,$mysql_database);
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>

