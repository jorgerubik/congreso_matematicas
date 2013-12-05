<fieldset>
	<legend>Lista de evaluadores</legend>
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
			
			$cont_usuarios = 0;

			$query = "SELECT id_usuario FROM usuario_rol WHERE id_rol = 3";
			$r = mysql_query($query);

			if (!$r) {
				echo "No se ejecutó el query: $query <br>";
				trigger_error(mysql_error(), E_USER_ERROR);
			}
			else {
				echo "<table border = '1'><tr><th>NOMBRE DEL EVALUADOR</th><th>MODALIDADES</th></tr>";
				while ($row = mysql_fetch_assoc($r)) {
					$query_usuarios = "SELECT nombre_usuario, apellido_paterno, apellido_materno FROM usuarios WHERE id_usuario = '".$row['id_usuario']."'";
					$r_usuarios = mysql_query($query_usuarios);
					if (!$r_usuarios) {
						echo "No se ejecutó el query: $query_usuarios <br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						$row_usuarios = mysql_fetch_assoc($r_usuarios);
						echo "<tr><td>".$row_usuarios['nombre_usuario']." ".$row_usuarios['apellido_paterno']." ".$row_usuarios['apellido_materno']."</td>";

						$query_modalidades = "SELECT id_modalidad FROM modalidad_evaluador WHERE id_usuario = '".$row['id_usuario']."'";
						$r_modalidades = mysql_query($query_modalidades);
						if (!$r_modalidades) {
							echo "No se ejecutó el query: $query_modalidades <br>";
							trigger_error(mysql_error(), E_USER_ERROR);
						}
						else{
							echo "<td>";
							while ($row_modalidades = mysql_fetch_assoc($r_modalidades)) {
								echo $row_modalidades['id_modalidad']."<br>";
							}
							$nombre_usuario[$cont_usuarios] = $row_usuarios['nombre_usuario'];
							$apellido_paterno[$cont_usuarios] = $row_usuarios['apellido_paterno'];
							$apellido_materno[$cont_usuarios] = $row_usuarios['apellido_materno'];
							echo "</td>";
							echo "<td><table border = '0'>
									<tr>
										<td>
										<form method='post' action='eliminar_evaluador.php'>
											<input type='text' id='nombre_usuario' name='nombre_usuario' style = 'display:none;' value='".$nombre_usuario[$cont_usuarios]."' >
											<input type='text' id='apellido_paterno' name='apellido_paterno' style = 'display:none;' value='".$apellido_paterno[$cont_usuarios]."' >
											<input type='text' id='apellido_materno' name='apellido_materno' style = 'display:none;' value='".$apellido_materno[$cont_usuarios]."' >
											<input type='text' id='id_usuario' name='id_usuario' style='display:none;' value='".$row['id_usuario']."' >
											<input type='submit' name='eliminar' value='Eliminar'>
										</form>
										</td>
										<td>
										<form method='post' action='editar_modalidad.php'>
											<input type='text' id='id_usuario' name='id_usuario' style='display:none;' value='".$row['id_usuario']."' >
											<input type='submit' name='editar' value='Editar modalidades'>
										</form>
										</td>
									</tr>
								</table></td>";
						}

						echo "</tr>";
						$cont_usuarios++;
					}
				}
				echo "</table>";
			}						

			mysql_close();
		?>
		
</fieldset>
<br>
<script>
function back(){
	window.location.href = 'opcion_evaluadores.php'
}
</script>
<input type='button' name='regresar' value='Regresar' onClick='back()'>