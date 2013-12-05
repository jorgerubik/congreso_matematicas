<?
//conexión con servidor
	require('script/bd.php');
//conectar con el servidor
	$conn = mysql_connect("$host", "$user", "$pass");

	if (!$conn) {
		echo "No se posible conectar al servidor. <br>";
		trigger_error(mysql_error(), E_USER_ERROR);
	}
	mysql_query("SET NAMES utf8");
	# seleccionar BD
	$rdb = mysql_select_db($db);

	if (!$rdb) {
		echo "No se puede seleccionar la BD. <br>";
		trigger_error(mysql_error(), E_USER_ERROR);
	}
////////////////////////// FUNCIÓN PARA EJECUTAR QUERY

	// function exe_query($query){
		
	// 	$r = mysql_query($query);
	// 	if (!$r) {
	// 		echo "No se ejecutó el query: $query <br>";
	// 		trigger_error(mysql_error(), E_USER_ERROR);
	// 	}
	// 	return $r;
		
	// }

	$id_usuario = $_POST['id_usuario'];
	$exitos = 0;
	
	$query_delete = "DELETE FROM modalidad_evaluador WHERE id_usuario = '".$id_usuario."'";
	$r_delete = mysql_query($query_delete);
	if (!$r_delete) {
		echo "No se ejecutó el query: $query_delete <br>";
		trigger_error(mysql_error(), E_USER_ERROR);
	}
	else{
		$exitos++;
	}

	// Aquí hay que checar como hacer para que a los admins que eliminemos como evaluadores no se les asigne nivel 0

	$query_update = "UPDATE usuario_rol SET id_rol = 0 WHERE id_usuario = '".$id_usuario."'";
	$r_update = mysql_query($query_update);
	if (!$r_update) {
		echo "No se ejecutó el query: $query_update <br>";
		trigger_error(mysql_error(), E_USER_ERROR);
	}
	else{
		$exitos++;
	}

	if ($exitos == 2) {
		echo "<br>El usuario ha sido eliminado satisfactoriamente del comité evaluador.";
	}
		

	mysql_close();
?>

<script>
	function back(){
		window.location.href = 'editar_evaluadores.php'
	}
	function back1(){
		window.location.href = 'registro_trabajos.php'
	}
</script>
<br>
<input type='button' name='regresar_edicion' value='Regresar a la edici&oacute;n de evaluadores' onClick='back()'>
<input type='button' name='regresar_principal' value='Regresar al men&uacute; principal' onClick='back1()'>