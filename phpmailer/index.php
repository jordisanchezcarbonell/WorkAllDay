 <!--BOOSTRAP-->
 <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous">
 		<h1>hola</h1>

<?php


//CONFIGURAR PROP EMAIL

/*##########Script Information#########
  # Purpose: Send mail Using PHPMailer#
  #          & Gmail SMTP Server 	  #
  # Created: 24-11-2019 			  #
  #	Author : Hafiz Haider			  #
  # Version: 1.0					  #
  # Website: www.BroExperts.com 	  #
  #####################################*/

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
if(isset($_POST['Enviar'])) {

		$email=$_POST['email'] ;
//Create instance of PHPMailer
	$mail = new PHPMailer(true);
	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "kazukunstatexhackeronetester@gmail.com";
//Set gmail password
	$mail->Password = "Kazukun23";
//Email subject
	$mail->Subject = "Test email using PHPMailer";
//Set sender email
	$mail->setFrom("kazukunscssss2@gmail.com");
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph </br></p>".
	"<br><b> Nombre: </b> ".$_POST['name'].
	"<br><b> Apellido: </b>".$_POST['last_name']."</br>".
	"<br><b> Email: </b>".$email.
	"<br><b> Telefono: </b>".$_POST['phone'].
		"<br><b> subject: </b>".$_POST['subject'].

	"<br><b> content: </b>".$_POST['content'] ;
//Add recipient 
//AQUI VA NUESTRO CORREO 
//CAMBIAAAR 
	$mail->addAddress("pro.arantxa.ordoyo@gmail.com");
//Finally send email

	if ( $mail->send() ) {

		
		//echo '<script language="javascript">alert("Mensaje Enviado");window.location.href="../index.html"</script>';

		$mail->addAddress($email);
		$mail->Body = "Hola " .$_POST['first_name'].",<br>".
		"Gracias por contactarnos! Nuestros representantes de soporte revisarán tu mensaje y lo reenviarán a la mejor indicada.".
		" <br>Nos pondremos en contacto en un plazo de 48 horas.".
		
		"<br>Si tu problema no puede esperar, también puedes comunicarse con nosotros a llamando al 555-555-555-5555.".
		"<br>Un saludo cordial, ".
		"<br>[Tu nombre]" ;
		$mail->send();
	//	header("location:pagina.php");

		header("location:../index.html");
		//die("Mensaje enviado");
	
	
	}else{
		echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
	}
//Closing smtp connection
	$mail->smtpClose();
	echo "Message could not be sent. Mailer Error:";
	
}