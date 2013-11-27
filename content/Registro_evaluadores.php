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
				    for ($i = 0; $i < $count; $i++) {
				        echo $modalidad[$i];
				        echo "<br/>";
				        $query = "INSERT INTO modalidad_evaluador VALUES ('".$id_usuario."','".$modalidad[$i]."') ";
				        $r = mysql_query($query);
				        	if(!$r){
								echo "No se pudo ejecutar el query: $query";
								echo "<br>";
								trigger_error(mysql_error(), E_USER_ERROR);
							}
							else{
										
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
						echo " Se han registrado el evaluador y las modalidades seleccionadas que serán sometidas a evaluación.";
							
					} 
				}
				
				

	mysql_close();
?>