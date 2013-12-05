<fieldset>
	<legend>Lista de trabajos a evaluar</legend>
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
			
			$tipotrabajo=$_POST['tipotrabajo'];

			if ($tipotrabajo == 'oral') {
				$query = "SELECT id_modalidad FROM modalidad_evaluador WHERE id_usuario ='".$_SESSION['usuario_id']."' ";
				$r = mysql_query($query);
				if (!$r) {
					echo "No se ejecutó el query: $query <br>";
					trigger_error(mysql_error(), E_USER_ERROR);
				}
				else{
					while ($row = mysql_fetch_assoc($r)) {
						$query_trabajo = "SELECT titulo_oral, id_ponencia_oral FROM ponencias_oral WHERE id_modalidad = '".$row['id_modalidad']."' ";						
						$r_trabajo = mysql_query($query_trabajo);
						if (!$r_trabajo) {
							echo "No se ejecutó el query: $query_trabajo <br>";
							trigger_error(mysql_error(), E_USER_ERROR);
						}
						else{
							// $query_count ="SELECT COUNT(*) FROM ponencias_oral WHERE id_modalidad = '".$row['id_modalidad']."'";
							// $r_count=mysql_query($query_count);
							echo "<br/>";
							echo $row['id_modalidad'];
							echo "<table border='1'>";
							if (mysql_num_rows($r_trabajo)==0) {
								echo "<br/>No hay trabajos por evaluar en esta modalidad";
							}
							else{
								$trabajos_existentes = 0;
								$trabajos_evaluados = 0;
								while ($row_trabajo = mysql_fetch_assoc($r_trabajo)) {
									$trabajos_existentes++;
									$query_verificacion_vacio = "SELECT COUNT(*) FROM ponencias_oral WHERE id_ponencia_oral = '".$row_trabajo['id_ponencia_oral']."' AND aceptado_resumen_oral = ''";
									$r_verificacion_vacio = mysql_query($query_verificacion_vacio);
									if (!$r_verificacion_vacio) {
										echo "No se ejecutó el query: $query_verificacion_vacio <br>";
										trigger_error(mysql_error(), E_USER_ERROR);
									}
									else{
										$row_verificacion_vacio = mysql_fetch_assoc($r_verificacion_vacio);
										if ($row_verificacion_vacio['COUNT(*)'] > 0) {
											echo "<form action='evaluar_ponencia_oral.php' method='POST'> <input type='text' name ='id_ponencia' value='".$row_trabajo['id_ponencia_oral']."' style='display:none;'/>";
											echo "<tr> <td>".$row_trabajo['titulo_oral']."</td>";
											echo "<input type='text' name ='tipotrabajo' value='".$tipotrabajo."' style='display:none;'/>";
											echo "<td> <input type='submit' value='REVISAR'/> </td> </tr>";
										}
										elseif ($row_verificacion_vacio['COUNT(*)'] == 0) {
											$trabajos_evaluados++;
										}								
									}
								}
								if ($trabajos_existentes == $trabajos_evaluados) {
									echo "<br/>No hay trabajos por evaluar en esta modalidad";
								}	
							}
							echo "</table>  </form>";							
						}
					}
				}
			}

			if ($tipotrabajo == 'cartel') {
				$query = "SELECT id_modalidad FROM modalidad_evaluador WHERE id_usuario ='".$_SESSION['usuario_id']."' ";
				$r = mysql_query($query);
				if (!$r) {
					echo "No se ejecutó el query: $query <br>";
					trigger_error(mysql_error(), E_USER_ERROR);
				}
				else{
					while ($row = mysql_fetch_assoc($r)) {				
						$query_trabajo = "SELECT titulo_cartel, id_ponencia_cartel FROM ponencias_cartel WHERE id_modalidad = '".$row['id_modalidad']."' ";
						$r_trabajo = mysql_query($query_trabajo);
						if (!$r_trabajo) {
							echo "No se ejecutó el query: $query_trabajo <br>";
							trigger_error(mysql_error(), E_USER_ERROR);
						}
						else{
							echo "<br/>";
							echo $row['id_modalidad'];
							echo "<table border='1'>";
							if (mysql_num_rows($r_trabajo)==0) {
								echo "<br/>No hay trabajos por evaluar en esta modalidad";
							}
							else{
								$trabajos_existentes = 0;
								$trabajos_evaluados = 0;
								while ($row_trabajo = mysql_fetch_assoc($r_trabajo)) {
									$trabajos_existentes++;
									$query_verificacion_vacio = "SELECT COUNT(*) FROM ponencias_cartel WHERE id_ponencia_cartel = '".$row_trabajo['id_ponencia_cartel']."' AND aceptado_resumen_cartel = ''";
									$r_verificacion_vacio = mysql_query($query_verificacion_vacio);
									if (!$r_verificacion_vacio) {
										echo "No se ejecutó el query: $query_verificacion_vacio <br>";
										trigger_error(mysql_error(), E_USER_ERROR);
									}
									else{
										$row_verificacion_vacio = mysql_fetch_assoc($r_verificacion_vacio);
										if ($row_verificacion_vacio['COUNT(*)'] > 0) {
										echo "<form action='evaluar_ponencia_cartel.php' method='POST'> <input type='text' name ='id_ponencia' value='".$row_trabajo['id_ponencia_cartel']."' style='display:none;'/>";
										echo "<tr> <td>".$row_trabajo['titulo_cartel']."</td>";
										echo "<input type='text' name ='tipotrabajo' value='".$tipotrabajo."' style='display:none;'/>";
										echo "<td> <input type='submit' value='REVISAR'/> </td> </tr>";	
										}				
										elseif ($row_verificacion_vacio['COUNT(*)'] == 0) {
											$trabajos_evaluados++;
										}			
									}
									if ($trabajos_existentes == $trabajos_evaluados) {
										echo "<br/>No hay trabajos por evaluar en esta modalidad";
									}	
								}
							echo "</table> </form>";							
						}
					}
				}
			}
		}

			if ($tipotrabajo == 'curso') {		
				$query_trabajo = "SELECT titulo_curso, id_ponencia_curso FROM ponencias_curso";
				$r_trabajo = mysql_query($query_trabajo);
				if (!$r_trabajo) {
					echo "No se ejecutó el query: $query_trabajo <br>";
					trigger_error(mysql_error(), E_USER_ERROR);
				}
				else{
					echo "<br/>";
					echo $row['id_modalidad'];
					echo "<table border='1'>";
					if (mysql_num_rows($r_trabajo)==0) {
						echo "<br/>No hay trabajos por evaluar en esta modalidad";
					}
					else{		
						$trabajos_existentes = 0;
						$trabajos_evaluados = 0;
						while ($row_trabajo = mysql_fetch_assoc($r_trabajo)) {
							$trabajos_existentes++;
							$query_verificacion_vacio = "SELECT COUNT(*) FROM ponencias_curso WHERE id_ponencia_curso = '".$row_trabajo['id_ponencia_curso']."' AND aceptado_resumen_curso = ''";
							$r_verificacion_vacio = mysql_query($query_verificacion_vacio);
							if (!$r_verificacion_vacio) {
								echo "No se ejecutó el query: $query_verificacion_vacio <br>";
								trigger_error(mysql_error(), E_USER_ERROR);
							}
							else{
								$row_verificacion_vacio = mysql_fetch_assoc($r_verificacion_vacio);
								if ($row_verificacion_vacio['COUNT(*)'] > 0) {
									echo "<form action='evaluar_ponencia_curso.php' method='POST'> <input type='text' name ='id_ponencia' value='".$row_trabajo['id_ponencia_curso']."' style='display:none;'/>";
									echo "<tr> <td>".$row_trabajo['titulo_curso']."</td>";
									echo "<input type='text' name ='tipotrabajo' value='".$tipotrabajo."' style='display:none;'/>";
									echo "<td> <input type='submit' value='REVISAR'/> </td> </tr>";								
								}				
								elseif ($row_verificacion_vacio['COUNT(*)'] == 0) {
									$trabajos_evaluados++;
								}			
							}
							if ($trabajos_existentes == $trabajos_evaluados) {
								echo "<br/>No hay trabajos por evaluar en esta modalidad";
							}	
						}
					}
					echo "</table> </form>";
				}
			}
			
			if ($tipotrabajo == 'taller') {
				$query_trabajo = "SELECT titulo_taller, id_ponencia_taller FROM ponencias_taller";
				$r_trabajo = mysql_query($query_trabajo);
				if (!$r_trabajo) {
					echo "No se ejecutó el query: $query_trabajo <br>";
					trigger_error(mysql_error(), E_USER_ERROR);
				}
				else{
					echo "<br/>";
					echo $row['id_modalidad'];
					echo "<table border='1'>";
					if (mysql_num_rows($r_trabajo)==0) {
						echo "<br/>No hay trabajos por evaluar en esta modalidad";
					}
					else{
						$trabajos_existentes = 0;
						$trabajos_evaluados = 0;
						while ($row_trabajo = mysql_fetch_assoc($r_trabajo)) {
							$trabajos_existentes++;
							$query_verificacion_vacio = "SELECT COUNT(*) FROM ponencias_taller WHERE id_ponencia_taller = '".$row_trabajo['id_ponencia_taller']."' AND aceptado_resumen_taller = ''";
							$r_verificacion_vacio = mysql_query($query_verificacion_vacio);
							if (!$r_verificacion_vacio) {
								echo "No se ejecutó el query: $query_verificacion_vacio <br>";
								trigger_error(mysql_error(), E_USER_ERROR);
							}
							else{
								$row_verificacion_vacio = mysql_fetch_assoc($r_verificacion_vacio);
								if ($row_verificacion_vacio['COUNT(*)'] > 0) {
									echo "<form action='evaluar_ponencia_taller.php' method='POST'>";
									echo "<input type='text' name ='id_ponencia' value='".$row_trabajo['id_ponencia_taller']."' style='display:none;'/>";
									echo "<tr> <td>".$row_trabajo['titulo_taller']."</td>";
									echo "<input type='text' name ='tipotrabajo' value='".$tipotrabajo."' style='display:none;'/>";
									echo "<td> <input type='submit' value='REVISAR'/> </td> </tr>";
								}				
								elseif ($row_verificacion_vacio['COUNT(*)'] == 0) {
									$trabajos_evaluados++;
								}			
							}
							if ($trabajos_existentes == $trabajos_evaluados) {
								echo "<br/>No hay trabajos por evaluar en esta modalidad";
							}	
						}
					}
					echo "</table> </form>";
				}
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