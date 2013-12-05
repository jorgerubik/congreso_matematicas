<script>
		function Back(){
			window.location.href = 'menu_evaluadores.php'
		}
</script>

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

		$tipotrabajo = 'oral';

		$id_trabajo = $_POST['id_ponencia'];
		$comentario_aceptado = $_POST['comentario_aceptado'];
		// echo $comentario_aceptado."<br>";
		$comentario_rechazado = $_POST['comentario_rechazado'];
		// echo $comentario_rechazado."<br>";
		$evaluacion = $_POST['evaluacion'];
		// echo $evaluacion."<br>";
			
		$query_info_trabajo = "SELECT titulo_oral, id_modalidad, id_categoria FROM ponencias_oral WHERE id_ponencia_oral = '".$id_trabajo."'";
		$r = mysql_query($query_info_trabajo);

		if (!$r) {
			// echo "No se ejecutó el query: $query_info_trabajo <br>";
			trigger_error(mysql_error(), E_USER_ERROR);
		}
		else {
			$row_info_trabajo = mysql_fetch_assoc($r);
			$titulo_trabajo = $row_info_trabajo['titulo_oral'];
			// echo $titulo_trabajo."<br>";
			$id_modalidad = $row_info_trabajo['id_modalidad'];
			// echo $id_modalidad."<br>";
			$id_categoria = $row_info_trabajo['id_categoria'];
			// echo $id_categoria."<br><br>";
		}

		$query_autores = "SELECT RFC FROM autores WHERE id_trabajo = '".$id_trabajo."'";
		$r_autores = mysql_query($query_autores);

		if (!$r_autores) {
			echo "No se ejecutó el query: $query_autores <br>";
			trigger_error(mysql_error(), E_USER_ERROR);
		}
		else {
			$i = 0;
			while ($row_RFC = mysql_fetch_assoc($r_autores)) {
				$RFC = $row_RFC['RFC'];
				$query_autores_nombre = "SELECT nombre_usuario, apellido_paterno, apellido_materno FROM usuarios WHERE RFC= '".$RFC."'";
				$r_autores_nombre = mysql_query($query_autores_nombre);
				if (!$r_autores_nombre) {
					echo "No se ejecutó el query: $query_autores_nombre <br>";
					trigger_error(mysql_error(), E_USER_ERROR);
				}
				else{
					while($row_autores_nombre = mysql_fetch_assoc($r_autores_nombre)){
						$nombre_usuario[$i] = $row_autores_nombre['nombre_usuario'];
						// echo $nombre_usuario[$i]." ";
						$apellido_paterno[$i] = $row_autores_nombre['apellido_paterno'];
						// echo $apellido_paterno[$i]." ";
						$apellido_materno[$i] = $row_autores_nombre['apellido_materno'];
						// echo $apellido_materno[$i]."<br>";
						$i++;
					}
					
				}	
			}
		}

		if($evaluacion == "ACEPTADO"){
			$query_registro_evaluacion = "UPDATE ponencias_oral SET aceptado_resumen_oral = 'SI', observaciones_oral = '".$comentario_aceptado."' WHERE id_ponencia_oral = '".$id_trabajo."'";
			$r_registro_evaluacion = mysql_query($query_registro_evaluacion);
			echo "<form action='lista_trabajos.php' method='POST'>";
			echo "El trabajo que usted evaluó como <b>aceptado</b>, se ha registrado correctamente, ¿desea evaluar otro trabajo?<br/>";
			echo "<input type='text' name='tipotrabajo' value='oral' style='display:none;'/>";
			echo "<input type='submit' name='evaluar_otro' value='Si, evaluar otro trabajo'/>";
			echo "<input type='button' name='regresar' value='No, regresar al menú de evaluación de trabajos' onClick='Back()'/>";
			echo "</form>";
		}
		else if ($evaluacion == "RECHAZADO") {
			$query_registro_evaluacion = "UPDATE ponencias_oral SET aceptado_resumen_oral = 'NO', observaciones_oral = '".$comentario_rechazado."' WHERE id_ponencia_oral = '".$id_trabajo."'";
			$r_registro_evaluacion = mysql_query($query_registro_evaluacion);
			echo "<form action='lista_trabajos.php' method='POST'>";
			echo "El trabajo que usted evaluó como <b>rechazado</b>, se ha registrado correctamente, ¿desea evaluar otro trabajo?<br/>";
			echo "<input type='text' name='tipotrabajo' value='oral' style='display:none;'/>";
			echo "<input type='submit' name='evaluar_otro' value='Si, evaluar otro trabajo'/>";
			echo "<input type='button' name='regresar' value='No, regresar al menú de evaluación de trabajos' onClick='Back()'/>";
			echo "</form>";
		}

		mysql_close();
?>