<fieldset>
	<legend>Lista de trabajos</legend>
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
			
			$query_oral = "SELECT id_ponencia_oral, id_modalidad, titulo_ponencia_oral FROM ponencias_oral";
			$r_oral = mysql_query($query_oral);
			if (!$r_oral) {
				echo "No se ejecutó el query: $query_oral <br>";
				trigger_error(mysql_error(), E_USER_ERROR);
			}
			else {
				echo "<h4>PONENCIAS ORALES</h4>";
				echo "<table border = 1>";
				echo "<tr><th>Modalidad</th><th>Título</th></tr>";
				while ($row_oral = mysql_fetch_assoc($r_oral)) {
					echo "<tr>";
					echo "<td>".$row_oral['id_modalidad']."</td><td>".$row_oral['titulo_ponencia_oral']."</td>";
					echo "<td><form action = 'detalles_trabajo.php' method = 'post'>
						<input type = 'text' name = 'id_ponencia' value = '".$row_oral['id_ponencia_oral']."' style = 'display:none;'>
						<input type = 'submit' name = 'ver' value = 'Ver detalles'>
						</td>";
					echo "</tr>";
				}
				echo "</table><br>";
			}

			$query_cartel = "SELECT id_ponencia_cartel, id_modalidad, titulo_ponencia_cartel FROM ponencias_cartel";
			$r_cartel = mysql_query($query_cartel);
			if (!$r_cartel) {
				echo "No se ejecutó el query: $query_cartel <br>";
				trigger_error(mysql_error(), E_USER_ERROR);
			}
			else {
				echo "<h4>CARTELES</h4>";
				echo "<table border = 1>";
				echo "<tr><th>Modalidad</th><th>Título</th></tr>";
				while ($row_cartel = mysql_fetch_assoc($r_cartel)) {
					echo "<tr>";
					echo "<td>".$row_cartel['id_modalidad']."</td><td>".$row_cartel['titulo_ponencia_cartel']."</td>";
					echo "<td><form action = 'detalles_trabajo.php' method = 'post'>
						<input type = 'text' name = 'id_ponencia' value = '".$row_cartel['id_ponencia_cartel']."' style = 'display:none;'>
						<input type = 'submit' name = 'ver' value = 'Ver detalles'>
						</td>";
					echo "</tr>";
				}
				echo "</table><br>";
			}

			$query_taller = "SELECT id_ponencia_taller, titulo_ponencia_taller FROM ponencias_taller";
			$r_taller = mysql_query($query_taller);
			if (!$r_taller) {
				echo "No se ejecutó el query: $query_taller <br>";
				trigger_error(mysql_error(), E_USER_ERROR);
			}
			else {
				echo "<h4>TALLERES</h4>";
				echo "<table border = 1>";
				echo "<tr><th>Título</th></tr>";
				while ($row_taller = mysql_fetch_assoc($r_taller)) {
					echo "<tr>";
					echo "<td>".$row_taller['titulo_ponencia_taller']."</td>";
					echo "<td><form action = 'detalles_trabajo.php' method = 'post'>
						<input type = 'text' name = 'id_ponencia' value = '".$row_taller['id_ponencia_taller']."' style = 'display:none;'>
						<input type = 'submit' name = 'ver' value = 'Ver detalles'>
						</td>";
					echo "</tr>";
				}
				echo "</table><br>";
			}

			$query_curso = "SELECT id_ponencia_curso, titulo_ponencia_curso FROM ponencias_curso";
			$r_curso = mysql_query($query_curso);
			if (!$r_curso) {
				echo "No se ejecutó el query: $query_curso <br>";
				trigger_error(mysql_error(), E_USER_ERROR);
			}
			else {
				echo "<h4>CURSOS</h4>";
				echo "<table border = 1>";
				echo "<tr><th>Título</th></tr>";
				while ($row_curso = mysql_fetch_assoc($r_curso)) {
					echo "<tr>";
					echo "<td>".$row_curso['titulo_ponencia_curso']."</td>";
					echo "<td><form action = 'detalles_trabajo.php' method = 'post'>
						<input type = 'text' name = 'id_ponencia' value = '".$row_curso['id_ponencia_curso']."' style = 'display:none;'>
						<input type = 'submit' name = 'ver' value = 'Ver detalles'>
						</td>";
					echo "</tr>";
				}
				echo "</table><br>";
			}
			
			mysql_close();
		?>
		
</fieldset>
<br>
<script>
function back(){
	window.location.href = 'menu_evaluadores.php'
}
</script>
<input type='button' name='regresar' value='Regresar' onClick='back()'>