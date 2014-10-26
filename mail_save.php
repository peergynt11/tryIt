<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                               // Enable verbose debug output

/*
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted

$mail->Host = 'smtp.1und1.de';                        // Specify main and backup SMTP servers
$mail->Port = 993;                                    // TCP port to connect to
$mail->Username = 'bernd@vierhuf.de';                 // SMTP username
$mail->Password = '';                           // SMTP password

$mail->From = 'bernd.vierhuf@siemens.com';
$mail->addAddress('bernd.vierhuf@siemens.com', 'BV');     // Add a recipient
*/


$mail->Host = 'mail.siemens.de';                        // Specify main and backup SMTP servers
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->Port = 25;                                    // TCP port to connect to
$mail->From = 'bernd.vierhuf@siemens.com';
$mail->FromName = 'Mailer';
$mail->addAddress('bernd.vierhuf@siemens.com', 'BV');     // Add a recipient

// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    $imapStream = imap_open("{mail.siemens.de}" . "SENT" , "bernd.vierhuf@siemens.com", "");
//    $imapStream = imap_open("{imap.1und1.de:993}" . "SENT" , "bernd@vierhuf.de", "");
}