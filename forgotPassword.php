<?php
include('mail.class.php');

if (isset($_POST['forgotPassword'])) {
    $userType = $_POST['forgotPassword'];
    $email = $_POST['email'];
    $mail = new Mail($userType);
    echo ($mail->sendNewPassword($email));
}
