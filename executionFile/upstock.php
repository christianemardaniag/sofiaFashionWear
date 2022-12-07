<?php 
require('../config.php');

$id = $_POST['check-id'];
$small = $_POST['check-small'];
$medium = $_POST['check-medium'];
$large = $_POST['check-large'];
$dateTime = $_POST['dateTime'];

$queryUpdate = "UPDATE `product_data` SET 
small = $small, medium = $medium, large = $large, release_date='$dateTime' WHERE `product_id` = $id"; //update product

$sqlUpdate = mysqli_query($sqlcon,$queryUpdate); 

echo header('Location: ../productsadmin.php');
?>
