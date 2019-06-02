<?php
    class Mail{
        public function sendMail($receiverMailId,$receiverName,$senderMailId,$senderName,$subject,$body){
            require_once './phpmailer/PHPMailerAutoload.php';
        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        // Set PHPMailer to use the sendmail transport
        $mail->isSMTP();
        // $mail->SMTPDebug = 2;
        // $mail->Debugoutput = 'html';
        $mail->SMTPAuth=true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'medskyy@gmail.com';
        $mail->Password = 'nopassword1234';
        //Set who the message is to be sent from
        $mail->setFrom($senderMailId, $senderName);
        //Set an alternative reply-to address
        $mail->addReplyTo($senderMailId,$senderName);
        //Set who the message is to be sent to
        $mail->addAddress($receiverMailId, $receiverName);
        //Set the subject line
        $mail->Subject = $subject;
        $mail->msgHTML($body);
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        // $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        // $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        // $mail->addAttachment('images/phpmailer_mini.gif');

        //send the message, check for errors
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
        }
    }
?>
