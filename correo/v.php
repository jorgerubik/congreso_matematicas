<?php


include("class.phpmailer.php");
include("class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 25;
$mail->Username = "ness.reaper@gmail.com ";
$mail->Password = "ask514ion497";

$mail->From = "ness.reaper@gmail.com@hotmail.com";
$mail->FromName = "Nombre ";
$mail->Subject = "Solicito informacion de servicios";
$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";
$mail->MsgHTML("Hola, te doy mi nuevo numero<br><b>xxxx</b>.");
$mail->AddAddress("ness_reaper@gmail.com", "ness_reaper@gmail.com");
$mail->IsHTML(true);

if(!$mail->Send()) {
echo "Error: " . $mail->ErrorInfo;
} else {
echo "Mensaje enviado correctamente";
}

?>
