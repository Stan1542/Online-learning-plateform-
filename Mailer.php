<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mail.mydevhub.co.za"; // Or the SMTP server name provided by cPanel
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Or PHPMailer::ENCRYPTION_SMTPS if using SSL
$mail->Port = 587; // Use 465 if using SSL
$mail->Username = "edulearnadmin@edu-learn.mydevhub.co.za";
$mail->Password = "Stan1542@";

$mail->isHtml(true);

return $mail;
?>