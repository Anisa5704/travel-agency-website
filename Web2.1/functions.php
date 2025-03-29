
<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:/xampp/phpMyAdmin/vendor/autoload.php';
require 'C:/xampp/htdocs/Web2.1/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/Web2.1/PHPMailer/src/SMTP.php';
require 'C:/xampp/htdocs/Web2.1/PHPMailer/src/Exception.php';


function sendEmail($text)
{
//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
//Server settings
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'explorealbaniawithus@gmail.com';                     //SMTP username
        $mail->Password = 'ekel gbab fput wmmp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
        $mail->setFrom('explorealbaniawithus@gmail.com', 'Travel Albania');
        $mail->addAddress('deaa.laci@gmail.com', 'Dea Laçi');     //Add a recipient

        echo "SMTP server connection successful!<br>";

//Attachments (currently commented out, can be uncommented if needed)
// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body = 'Your email address has been verified successfully!!';

        $result = $mail->send();

echo 'Message has been sent';
        return true;


    } catch (Exception $e) {
echo "Mailer Error: {$mail->ErrorInfo}";
    }
        return false;

}

