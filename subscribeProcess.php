<?php
session_start();
require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

if (isset($_GET["e"])) {
    $e = $_GET["e"];

    if (empty($e)) {
        echo ("Please enter your email address");
    } else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
        echo ("Please enter a valid email address");
    } else {
        $user_check = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "'");
        $num = $user_check->num_rows;

        if ($num == 1) {
            echo ("You have already subscribed");
        } else {
            $date = date("Y-m-d H:i:s");

            Database::iud("INSERT INTO `user`(`email` , `date`) 
            VALUES ('" . $e . "','" . $date . "')");

            echo ("Success");

            // Email sending logic (Gmail)
            // Enter your email address and app password

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'Your-Email';
            $mail->Password = 'Your-App-Password';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('Your-Email', 'Thank you for Subscribing');
            $mail->addReplyTo('Your-Email', 'Thank you for Subscribing');
            $mail->addAddress($e);
            $mail->isHTML(true);
            $mail->Subject = 'Subscription Confirmation';
            $bodyContent = '

            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        padding: 20px;
                    }
                    .email-container {
                        max-width: 600px;
                        background: #ffffff;
                        margin: auto;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                        text-align: center;
                    }
                    .header {
                        background: #1877F2;
                        color: white;
                        padding: 15px;
                        font-size: 24px;
                        font-weight: bold;
                        border-radius: 8px 8px 0 0;
                    }
                    .content {
                        padding: 20px;
                        font-size: 18px;
                        color: #333333;
                    }
                    .footer {
                        background: #f4f4f4;
                        padding: 10px;
                        font-size: 14px;
                        color: #777777;
                        border-radius: 0 0 8px 8px;
                    }
                    .button {
                        background: #1877F2;
                        color: #ffffff;
                        text-decoration: none;
                        padding: 10px 20px;
                        font-size: 16px;
                        border: none;
                        cursor: pointer;
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <div class="email-container">
                    <div class="header">Thank You!</div>
                    <div class="content">
                        <p>We appreciate you joining our community.</p>
                        <p>Stay tuned for the latest updates and exclusive content.</p>
                        <a href="https://github.com/lakshithamadumal" target="_blank">
                            <button class="button">Visit Our Website</button>
                        </a>
                    </div>
                    <div class="footer">
                        Copyright © 2025 | All Rights Reserved
                    </div>
                </div>
            </body>
            </html>';

            $mail->Body = $bodyContent;

            if (!$mail->send()) {
                echo ("Verification code sending failed");
            }
        }
    }
} else {
    echo ("Please enter your email address");
}



 // Email sending logic (Website)
// Enter your website domain email address and app password
 /*
   
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if (isset($_GET["e"])) {
    $e = filter_var($_GET["e"], FILTER_SANITIZE_EMAIL);

    if (empty($e)) {
        echo "Please enter your email address";
    } else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address";
    } else {
        $user_check = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "'");
        $num = $user_check->num_rows;

        if ($num == 1) {
            echo ("You have already subscribed");
        } else {
            $date = date("Y-m-d H:i:s");

            try {
                Database::iud("INSERT INTO `user`(`email` , `date`) 
                VALUES ('" . $e . "','" . $date . "')");

                echo ("Success");

                $mail = new PHPMailer(true);
            
                $mail->IsSMTP();
                $mail->Host = 'mail.Your-Web-Site.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'info@Your-Web-Site.com';
                $mail->Password = 'info@Your-Web-Site.com_Password';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                $mail->setFrom('info@Your-Web-Site.com', 'Thank you for Subscribing');
                $mail->addReplyTo('info@Your-Web-Site.com', 'Thank you for Subscribing');
                $mail->addAddress($e);
                $mail->isHTML(true);
                $mail->Subject = 'Subscription Confirmation';
                $bodyContent = '
                <!DOCTYPE html>
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            padding: 20px;
                        }
                        .email-container {
                            max-width: 600px;
                            background: #ffffff;
                            margin: auto;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                            text-align: center;
                        }
                        .header {
                            background:rgb(90, 5, 8);
                            color: white;
                            padding: 15px;
                            font-size: 24px;
                            font-weight: bold;
                            border-radius: 8px 8px 0 0;
                        }
                        .content {
                            padding: 20px;
                            font-size: 18px;
                            color: #333333;
                        }
                        .footer {
                            background: #f4f4f4;
                            padding: 10px;
                            font-size: 14px;
                            color: #777777;
                            border-radius: 0 0 8px 8px;
                        }
                        .button {
                            background:rgb(90, 5, 8);
                            color: #ffffff;
                            text-decoration: none;
                            padding: 10px 20px;
                            font-size: 16px;
                            border: none;
                            cursor: pointer;
                            font-weight: bold;
                        }
                    </style>
                </head>
                <body>
                    <div class="email-container">
                    <div class="header">Thank You!</div>
                    <div class="content">
                        <p>We appreciate you joining our community.</p>
                        <p>Stay tuned for the latest updates and exclusive content.</p>
                        <a href="https://github.com/lakshithamadumal" target="_blank">
                            <button class="button">Visit Our Website</button>
                        </a>
                    </div>
                    <div class="footer">
                        Copyright © 2025 | All Rights Reserved
                    </div>
                </div>
                </body>
                </html>';

                $mail->Body = $bodyContent;

                if (!$mail->send()) {
                    echo ("Email sending failed: " . $mail->ErrorInfo);
                }
            } catch (Exception $e) {
                echo ("Error: " . $e->getMessage());
            }
        }
    }
} else {
    echo ("Please enter your email address");
}

            
*/
