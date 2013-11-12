<?php
$destinatario="arock_arock@hotmail.com";
$asunto="xD";
$mensaje="prueba de correo electronico XD";


$cabezera="From ioda_34@hotmail.com".\r\n."Reply to webmaster.com";


mail();
if(mail($detninatario,$asunto,$mensaje,$cebezera)){
	echo="exito";
}else{
echo=":C"
}


?>
