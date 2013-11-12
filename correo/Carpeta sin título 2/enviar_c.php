<?php
if(isset($POST_['asunto'])&& !empty($POST_['asunto']))&&
if(isset($POST_['mensaje'])&& !empty($POST_['mensaje']))&&
	{
	$destino="arock_arock@hotmail.com";
$asunto="prueba";

$desde=" From: "."mi iphone 5s";

$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje']:
	mail($destino,$asunto,$mensaje,$desde);
	echo "correo enviado";
	}else{
echo "error al enviar";}
?>
