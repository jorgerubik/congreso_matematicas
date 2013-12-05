<?
	$rfc = $_POST['Rfc'];
	
	
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
				if ($_SERVER["REQUEST_METHOD"] == "POST") {  
				    $modalidad=$_POST["modalidad"];
				    $count = count($modalidad);
				    // echo $count. "<br>";
				    $error = 0;
				    $num_registros = 0;
				    for ($i = 0; $i < $count; $i++) {
				        $query = "INSERT INTO modalidad_evaluador VALUES ('".$id_usuario."','".$modalidad[$i]."') ";
				        $r = mysql_query($query);
				        	if(!$r){
								echo "No se pudo ejecutar el query: $query";
								echo "<br>";
								trigger_error(mysql_error(), E_USER_ERROR);
								$error++;
								// echo "error = $error <br>";
							}
							else{
								$num_registros++;
								// echo "num_registros = $num_registros<br>";	
							}
				    }
				    $query_rol="UPDATE usuario_rol SET id_rol = 3 WHERE id_usuario = '".$id_usuario."' ";
				    $r_rol = mysql_query($query_rol);

				    if(!$r_rol){
						echo "No se pudo ejecutar el query: $query_rol";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						if ($num_registros == 0 && $error == 0){
							echo "<br>Al evaluador no se le asign&oacute; ninguna modalidad, posteriormente podrá asignarle modalidades haciendo clic en el bot&oacute;n 'Editar evaluadores'.<br>";
						}
						else if ($num_registros){
						echo "<br>Se han registrado el evaluador y las modalidades seleccionadas que serán sometidas a evaluación.<br>";
						}	
					} 
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
	function back2(){
		window.location.href = 'asignar_evaluadores.php'
	}
</script>
<br>
<input type='button' name='regresar_edicion' value='Editar evaluadores' onClick='back()'>
<input type='button' name='regresar_asignar' value='Asignar otro evaluador' onClick='back2()'><br>
<input type='button' name='regresar_principal' value='Regresar al men&uacute; principal' onClick='back1()'>