<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendors/PHPMailer/src/Exception.php';
require '../vendors/PHPMailer/src/PHPMailer.php';
require '../vendors/PHPMailer/src/SMTP.php';

try{
    sendMail($_POST);
    die;
} catch(Exception $exception) {
    echo "There was an error submitting your form";
    die;
}
function sender($body){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.gravitysplash.co.za';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'deune@gravitysplash.co.za';                     //SMTP username
        $mail->Password   = '*nvJ63pTyeP@hWjm';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('deune@gravitysplash.co.za', 'GravitySplash');
        $mail->addAddress('deune@gravitysplash.co.za');               //Name is optional
        $mail->addReplyTo('deune@gravitysplash.co.za', 'Information');
        $mail->addCC('dwayne@gravitysplash.co.za');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Request from GravitySplash contact form';
        $mail->Body    = $body;
        $mail->AltBody = $body;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function sendMail($post){
    $recaptcha_secret = "6Lf7WfQmAAAAAL_gbWtyveTREZbClwx9p8e_P6-b";
    $recaptcha_token = $post["token"];
    $recaptcha_verified = verifyRecaptcha($recaptcha_token, $recaptcha_secret);

    if(!$recaptcha_verified){
        printMessage("error", "ReCaptcha Verification Failed");
        die;
    }

    $form_name = $post["name"];
    $form_email = $post["email"];
    $form_number = $post["number"];
    $form_company = $post["company"];
    $form_message = $post["message"];

    if($form_name ==""){
        printMessage("error", "Please enter your name");
        die;
    }

    if($form_email ==""){
        printMessage("error", "Please enter your email address");
        die;
    }

    if($form_number ==""){
        printMessage("error", "Please enter your contact number");
        die;
    }

    if($form_message ==""){
        printMessage("error", "Please enter your message");
        die;
    }


    $body = "<p><strong>Name:</strong> " . $form_name;
    $body .= "<p><strong>Email:</strong> " . $form_email;
    $body .= "<p><strong>Company:</strong> " . $form_company;
    $body .= "<p><strong>Contact Number:</strong> " . $form_number ;
    $body .= "<p><strong>Message:</strong></p>";
    $body .= "<p>".$form_message."</p>";

    $mail_sent = sender($body);

    if(!$mail_sent){
        $mailresult = array("error", "There was a problem sending you message");
    } else {
        $mailresult = array("success", "Your message was sent successfully");
    }

    return $mailresult;
}
function verifyRecaptcha($token, $secret){

    $fields = "secret=" . $secret . "&response=" . $token;

    $ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

    $responseJson = curl_exec($ch);
    $response = json_decode($responseJson);

    return $response->success;
}
