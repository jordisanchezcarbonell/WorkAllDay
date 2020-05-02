<?php
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
if(isset($_POST['Enviar'])) {
try {
    $email=$_POST['email'] ;

    //Server settings
    $mail->isSMTP();  // set SMTP
	$mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true; // Enable SMTP auth
	$mail->Username = "kazukunsc2@gmail.com";
	$mail->Password = "Yokazukun23";
	$mail->SMTPSecure = "tls";
    $mail->Port = 587; // TCP port

    //Recipients
    $mail->setFrom('info@domain.com', 'Web Contact'); // FROM
    $mail->addAddress('admin@domain.com', 'Admin - Domain'); // TO

    // message that will be displayed when everything is OK :)
    $okMessage = 'Thank you for your message. We will get back to you soon!';

    // If something goes wrong, we will display this message.
    $errorMessage = 'There was an error. Please try again later!';

    //Content
    $mail->isHTML(true); // Set to HTML
    $mail->Subject = 'Contact Form Message';
	$mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph </br></p>".
	"<br><b> Nombre: </b> ".$_POST['first_name'].
	"<br><b> Apellido: </b>".$_POST['last_name']."</br>".
	"<br><b> Email: </b>".$email.
	"<br><b> Telefono: </b>".$_POST['telephone'].
	"<br><b> Descripcion: </b>".$_POST['comments'] ;
    $mail->send();
    $responseArray = array('type' => 'success', 'message' => $okMessage);
} catch (Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
} catch (Error $e) {
    // should log the fatal
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}

}