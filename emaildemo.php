<?php 
 error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
 require_once "phpmailer/class.phpmailer.php";
 require_once "phpmailer/class.smtp.php";
 require_once "phpmailer/class.phpmailer.php";
 require_once "phpmailer/PHPMailerAutoload.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$email=$_POST["txtemail"];
require 'shared/classsignup.php';
$obj=new user();
$res=$obj->forgetpassword($email);
$row=$res->fetch_assoc();
$token=base64_decode($row["user_password"]);
if($res->num_rows==1)
{

$message=' your password is '.$token.'';
echo $message;

$mail = new PHPMailer(true);

// telling the class to use SMTP
$mail->IsSMTP();

// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
$mail->SMTPDebug = 0;

// enable SMTP authentication
$mail->SMTPAuth = true;

// sets the prefix to the server
$mail->SMTPSecure = 'ssl';

// sets GMAIL as the SMTP server
$mail->Host = 'smtp.gmail.com';

// set the SMTP port for the GMAIL server
$mail->Port = 465;

// your gmail address
$mail->Username = 'medskyy@gmail.com';

// your password must be enclosed in single quotes
$mail->Password = 'nopassword1234';

// add a subject line
$mail->Subject = ' verification ';

// Sender email address and name
$mail->SetFrom('medskyy@gmail.com', 'forget password link');

$email1=$email;
// reciever address, person you want to send
$mail->AddAddress($email1);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML($message);


// add attachment if any
//$mail->AddAttachment('time.png');

try {
    // send mail
	
	//don't forget to enable openssl true from php_extensions
    $mail->Send();
    $msg = 'Mail send successfully please verify your account <a href="mail.gmail.com">click me to verify</a>';
    header('location:login.php');
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}
}
else
{
    header('location:login.php');
}
}
else
{
    header('location:login.php');
}
?>
