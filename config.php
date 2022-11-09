<?php
// $host = 'sql200.epizy.com';
// $users = 'epiz_32668333';
// $password = '3Ej70ylc4N5WT';
$host = 'localhost';
$users = 'root';
$password = '';
$database = 'epiz_32668333_sofiadb';
$sqlcon = mysqli_connect($host, $users, $password, $database);
date_default_timezone_set("Asia/Hong_Kong");
if (mysqli_connect_error()) {
  echo "Error: Unable to connect to MySQL <br>";
  echo "Message: " . mysqli_connect_error() . "<br>";
} 
?>
