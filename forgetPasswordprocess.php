<?php
include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$email = $_POST["e"];
$vcode = uniqid();

$rs = Database:: search("SELECT * FROM `employee` WHERE `email` = '".$email."'");
$num = $rs->num_rows;

if ($num > 0) {
    // user found 
    Database::iud("UPDATE `employee` SET `v_code` = '".$vcode."' WHERE `email` = '".$email."' ");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'tharux.me@gmail.com';                     //SMTP username
        $mail->Password = 'yxietzqujwjcnjuu';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('tharux.me@gmail.com', 'lezafarming');
        $mail->addAddress($email);     //Add a recipient
        $mail->addReplyTo('info@example.com', 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset your account password';
        $mail->Body = '<table style="width: 100%; font-family: sans-serif;">
    <tbody>
        <tr>
            <td align="center">
                <table style="max-width: 600px;">
                    <tr>
                        <td align="center">
                            <a href="#" style="font-size: 35px; font-weight: bold; color: green; text-decoration: none;">Leza farming</a>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h1 style="font-size: 25px; line-height: 45px; font-weight: 600;">Reset Your Password</h1>
                            <p style="margin-bottom: 24px;">You Can Change Your Pasword By clicking the below.</p>

                            <div>
                                <a href="http://localhost/farmshop/resetPassword.php?vcode='.$vcode.'" style="text-decoration: none; display: inline-block; border-radius: 8px; background-color: green; 
                                color: white; padding: 15px;">
                                    <span>Reset Password</span>
                                </a>
                            </div>

                            <p style="margin-top: 24px;">If You Didn\'t ask to reset passwrd, you can ignore this email</p>
                            <hr>
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <p style="font-weight: 500px;">&copy; Lezafarming || All Right Reserved.</p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>';

        $mail->send();
        echo 'Success';
    } catch (Exception $email) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    echo("User not found, please check your email");
}

?>