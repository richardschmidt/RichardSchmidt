<?php

// example on using PHPMailer with GMAIL

include("php/class.phpmailer.php");
include("php/class.smtp.php"); // note, this is optional - gets called from main class if not already loaded

$mail             = new PHPMailer();

$body             = file_get_contents('contents.html');

$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port

$mail->Username   = "richardschmidt07@gmail.com";  // GMAIL username
$mail->Password   = "R07S09s27";            // GMAIL password

$mail->From       = "replyto@yourdomain.com";
$mail->FromName   = "Webmaster";
$mail->Subject    = "New visitor to the site";
$mail->AltBody    = "This is the body when user views in plain text format"; //Text Body
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML($body);

$mail->AddReplyTo("richardschmidt07@gmail.com","Webmaster");

// $mail->AddAttachment("/path/to/file.zip");             // attachment
// $mail->AddAttachment("/path/to/image.jpg", "new.jpg"); // attachment

$mail->AddAddress("richardschmidt07@yahoo.com","Richard Schmidt");

$mail->IsHTML(true); // send as HTML

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message has been sent";
}

?>
