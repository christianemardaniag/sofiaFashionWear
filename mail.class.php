<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
class Mail
{
    private $mail;
    private $userType;
    private $conn;
    private const SERVER_EMAIL = 'spacemonkeydev@outlook.com';

    function __construct($userType)
    {
        require("config.php");
        $this->userType = $userType;
        $this->conn = $sqlcon;
        $this->mail = new PHPMailer(true);

        // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.office365.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = self::SERVER_EMAIL;
        $this->mail->Password   = 'nv%Iy90$3J&7';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;
    }

    public function sendMail($recipient, $subject, $body)
    {
        try {
            $this->mail->setFrom(self::SERVER_EMAIL, 'Sofia Fashion Wear');
            $this->mail->addAddress($recipient);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->send();
            echo "Success";
        } catch (Exception $e) {
            return "Failed";
            // return (object) [
                // 'status' => false,
                // 'msg' => 'Message could not be sent. Mailer Error: {' . $this->mail->ErrorInfo . '}'
            // ];
        }
    }

    public function sendNewPassword($recipient)
    {
        if ($id = $this->isEmailRegistered($recipient)) {
            $newPassword = $this->generateRandomPassword();
            $body = " <table><tbody>";
            $body .= "<tr><td style='background-color: #6290C8; color: white; padding: 10px 10px; font-size: 20px; font-weight: 600;'>Sofia Fashion Wear</td></tr>";
            $body .= "<tr><td>";
            $body .= "<h3>Good day!</h3>";
            $body .= "<p style='font-size: 20px;'>We have successfully reset your password</p>";
            $body .= "<p>You may now sign in to the Sofia Fashion Wear using your new password below :</p>";
            $body .= "</td></tr>";
            $body .= "<tr><td>";
            $body .= "<div>password: <b>$newPassword</b></div>";
            $body .= "</td></tr>";
            $body .= "<tr><td><p>*Note:Please check your spelling and case.</p></td></tr>";
            $body .= "</tbody></table>";
            $this->sendMail($recipient, "Sofia Fashion Wear: Reset Password", $body);
            $this->updatePassword($id, $newPassword);
        } else {
            return "Failed";
            // return (object) [
            //     'status' => false,
            //     'msg' => 'You have entered unregistered email address!'
            // ];
        }
    }

    private function generateRandomPassword(): string
    {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz!@#$%&*';
        return substr(str_shuffle($data), 0, 8);
    }

    private function isEmailRegistered($email): string
    {
        $query = "SELECT ID FROM $this->userType WHERE email_add='$email'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            return $row['ID'];
        }
        return false;
    }

    private function updatePassword($id, $newPass)
    {
        $query = "UPDATE $this->userType SET `password`='$newPass' WHERE `ID`='$id'";
        return mysqli_query($this->conn, $query);
    }
}
