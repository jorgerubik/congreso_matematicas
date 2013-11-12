<?php
$micorreo="poroyoda@gmail.com";
$contragmail="dandis01";
$asunto="COngreso de MAtematicas confirmacion";
echo "$micorreo";
echo "$contragmail";

//$username= $_POST['username'];
echo "$username";


include("class.phpmailer.php");
include("class.smtp.php");
 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "poroyoda@gmail.com";
$mail->Password = "dandis01";


$mail->From = "poroyoda@gmail.com";
$mail->FromName = "eduardo";
$mail->Subject = "Scongrso mate";
$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";
$mail->MsgHTML("Hola, te doy mi nuevo numero<br><b>xxxx</b>.");
$mail->AddAddress("lalodandi@hotmail.com", "lalodandi@hotmail.com");
$mail->IsHTML(true);
 
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Mensaje enviado correctamente";
}
