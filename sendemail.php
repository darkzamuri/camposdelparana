<?php
/**require_once('recaptchalib.php'); 

 $secret  = "6Lf96iMUAAAAAFvvmhC4cckqA2Vc7qZtim8MnBmE";

 $post_data = http_build_query(
    array(
        'secret' => $secret,
        'response' => $_POST['g-recaptcha-response'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    )
);
 $opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $post_data
    )
);

$context  = stream_context_create($opts);
$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
$result = json_decode($response);
**/
if (!$_POST['email']) {
    // What happens when the CAPTCHA was entered incorrectly
    
    header('Location: http://camposdelparana.com.ar?error=true&catchap=true');
    exit;
  } else {
  	$name =  $_POST['name'];
	$email =  $_POST['email'];
	$telefono =  $_POST['telefono'];
	$message =  $_POST['message'];
    // Your code here to handle a successful verification
  // the message
$msg = "Nombre  :".$name."<br> Email : ".$email."<br> Telefono :".$telefono."<br> Mensaje :".$message;

// use wordwrap() if lines are longer than 70 characters

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

//$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = 'user@example.com';                 // SMTP username
//$mail->Password = 'secret';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($email, $name);
$mail->addAddress('alpinasjucar@gmail.com', 'Alpinas Jucar');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('julinondedeu@hotmail.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Solicitud';
$mail->Body    = $msg;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    header('Location: http://camposdelparana.com.ar?message=true');
    exit;
} else {
     header('Location: http://camposdelparana.com.ar?error=true&email=true');
  }


// send email
 // if(mail("alpinasjucar@gmail.com","Solicitud",$msg)){
   // header('Location: http://camposdelparana.com.ar?message=true');
   // exit;
 // }
 // else {
   //  header('Location: http://camposdelparana.com.ar?error=true&email=true');
  //}
  }


?>