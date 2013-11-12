<?php
 
require("class.phpmailer.php");
require("class.smtp.php");
 
//Especificamos los datos y configuración del servidor
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
 
//Nos autenticamos con nuestras credenciales en el servidor de correo Gmail
$mail->Username = "ness.reaper@gmail.com";
$mail->Password = "ask514ion497";
 
//Agregamos la información que el correo requiere
$mail->From = "ness.reapero@gmail.com";
$mail->FromName = "ness";
$mail->Subject = "Enviar Mail con PHPMailer";
$mail->AltBody = "";
$mail->MsgHTML("<h1>Hola Mundo!</h1>");
$mail->AddAttachment("adjunto.txt");
$mail->AddAddress("destinatario@hotmail.com", "Usuario Prueba");
$mail->IsHTML(true);
 
//Enviamos el correo electrónico
$mail->Send();
?>
