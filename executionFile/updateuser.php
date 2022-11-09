<?php
require('../config.php');

$id = $_POST['uid'];
$name = $_POST['uname'];
$add = $_POST['uad'];
$email = $_POST['uem'];
$phone = $_POST['upn'];
// $username = $_POST['usname'];
// $password = md5($_POST['upass']);

$queryUpdate = "";


$queryUpdate = "UPDATE `user_table` SET
        `name`='$name',`address`='$add',`email_add`='$email', `phoneno` = '$phone'
        WHERE `ID` = '$id'"; //update user

$sqlUpdate = mysqli_query($sqlcon, $queryUpdate);

echo header('Location: ../usersadmin.php');
