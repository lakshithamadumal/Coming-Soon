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

            // Email sending logic (Optional)

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
