<?php 
require('../config.php');

$queryUpdate = "";

$status = $_POST['stats'];
$dateTime = $_POST['dateTime'];
$id = "";
$custid = $_POST['cusid'];
$oid = $_POST['oid'];
$message = "";
$date = date("Y/m/d");
var_dump($_POST);
//email query
$query = "SELECT * FROM `user_table` WHERE ID = $custid";
$sql = mysqli_query($sqlcon,$query);
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$email = $row["email_add"];

if(isset($_POST['com-id'])){
    $id = $_POST['com-id'];
    $queryUpdate = "UPDATE `order_data` SET `order_status` = '$status', transaction_date='$dateTime'  WHERE `order_id` = $id"; //complete
}
else if(isset($_POST['can-id'])){
    $id = $_POST['can-id'];
    $queryUpdate = "UPDATE `order_data` SET `order_status` = '$status', transaction_date='$dateTime'  WHERE `order_id` = $id"; //cancel
}
$sqlUpdate = mysqli_query($sqlcon,$queryUpdate);

// echo header('Location: ../ordersadmin.php');
?>
