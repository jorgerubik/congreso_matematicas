<?
requiere("class.phpmailer.php");

$mail= new PHPMailer();
validacion de smtp

$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->Username="ness.reaper@gmail.com";
$mail->Password="ask514ion497";
$mail->host="localhost";
$mail->From="ness.reaper@gmail.com";




?>
