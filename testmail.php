<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
//mail("premsingh.j@gmail.com","My subject",$msg);
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
	use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
	require 'PHPMailer/src/Exception.php'; 
    require 'PHPMailer/src/PHPMailer.php'; 
    require 'PHPMailer/src/SMTP.php'; 
    

    $mail = new PHPMailer(true);

try {
//Server settings


// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "contact@vermiliondecors.com";            // SMTP account username example
$mail->Password   = "V3rm!l!0n@123";            // SMTP account password example

// Content
$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->setFrom('Noreply@zg.com', 'Noreply'); 
        $mail->addReplyTo('Noreply@zg.com', 'Noreply'); 
        
        // Add a recipient 
        // $mail->addAddress($_POST['email']);
        $mail->addAddress("premsingh.j@gmail.com");
$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}