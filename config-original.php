<?php
$mysql_hostname = "localhost";
$mysql_user = "Admin";
$mysql_password = "3Sz5cp7MvLzPvbr3";
$mysql_database = "porject1";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong1");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

?>
