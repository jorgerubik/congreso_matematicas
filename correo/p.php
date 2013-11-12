 <?php

     error_reporting(E_STRICT);
     

     require_once('PHPMailer_5.2.1/class.phpmailer.php');

     $mail             = new PHPMailer();
     //$body             = $_POST['msg'];
	$body ="ola k ase";
     $mail->IsSMTP(); // telling the class to use SMTP
     $mail->SMTPDebug  = $_POST['verbose'];        // enables SMTP debug information (for testing) 1 = errors and messages 2 = messages only
     $mail->SMTPAuth   = true;                     // enable SMTP authentication
     $mail->SMTPSecure = "ssl";                    // sets the prefix to the servier
     $mail->Host       = "smtp.gmail.com";         // sets GMAIL as the SMTP server
     $mail->Port       = 465;                      // set the SMTP port for the GMAIL server

     $mail->Username   = "ness.reaper@gmail.com";    // GMAIL username
     $mail->Password   = "ask514ion497"; // GMAIL password

     $mail->SetFrom('', 'Cualquiercosa');
     $mail->Subject    = "Mensaje desde PHP";
     $mail->MsgHTML($body);

     $address = "arock_arock@hotmail.com";
     $mail->AddAddress($address, "yo mismo");

     // $mail->AddAttachment("archivo adjunto");      // attachment
     $mail->Timeout=60;

     if(!$mail->Send())
        echo "Mailer Error: " . $mail->ErrorInfo;
     else
        echo "Mensaje enviado!";

?> 
