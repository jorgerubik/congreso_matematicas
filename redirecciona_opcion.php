<?php

$operacion = $_POST['operacion'];

if($operacion == 'alta'){
	header("Location: alta_rol.php");
}
if($operacion == 'baja'){
	header("Location: baja_rol.php");
}
if($operacion == 'cambio'){
	header("Location: cambio_rol.php");
}

?>