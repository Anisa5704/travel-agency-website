
<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:/xampp/phpMyAdmin/vendor/autoload.php';
require 'C:/xampp/htdocs/Web2.1/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/Web2.1/PHPMailer/src/SMTP.php';
require 'C:/xampp/htdocs/Web2.1/PHPMailer/src/Exception.php';



//Funksion i validimit te te dhenave ne admin role
function adminValidate($inputData){
    global $conn;
    return mysqli_real_escape_string($conn, $inputData);

}




// Function that 'cleans' the input form empty spaces and that validates the data
function validate($data)
{
    //It deletes the empty spaces before and after
    $data = trim($data);
    //It deletes the undesired characters
    $data = stripslashes($data);
    //It 'transforms' the unique characters into HTML entities to avoid XSS
    $data = htmlspecialchars($data);
    return $data;
}


//Function that allows us to send the codes via gmail using PHPMailer
function sendEmail($email, $verification_code) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'explorealbaniawithus@gmail.com';
        $mail->Password = 'ekel gbab fput wmmp';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('explorealbaniawithus@gmail.com', 'Travel Albania');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = '<p>Your code is: <b>' . $verification_code . '</b></p>';

        return $mail->send();
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

