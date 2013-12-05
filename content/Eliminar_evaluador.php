<?
	$nombre_usuario = $_POST['nombre_usuario'];
	$apellido_paterno = $_POST['apellido_paterno'];
	$apellido_materno = $_POST['apellido_materno'];
	$id_usuario = $_POST['id_usuario'];

	echo "<br>Se eliminará al usuario <b>".$nombre_usuario." ".$apellido_paterno." ".$apellido_materno."</b> del comité evaluador, ¿está seguro de realizar éste movimiento?<br>";
	echo "<script>function cancel(){
		window.location.href = 'editar_evaluadores.php'
		}
		</script>";
	echo "<br><form method='post' action='eliminar_evaluador_conf.php'>
			<input type='text' id='id_usuario' name='id_usuario' value='$id_usuario' style='display:none;'>
			<input type='button' name='cancelar' value='Cancelar' onClick='cancel()'>
			<input type='submit' name='eliminar' value='Eliminar'>
		</form>";


	mysql_close();
?>