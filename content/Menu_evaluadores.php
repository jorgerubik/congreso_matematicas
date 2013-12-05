<fieldset>
	<legend>Tipo(s) de trabajo(s) a evaluar</legend>
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
			
			$query = "SELECT id_modalidad FROM modalidad_evaluador WHERE id_usuario = '".$_SESSION['usuario_id']."'";
			$r= mysql_query($query);
			if (!$r) {
				echo "No se ejecutó el query: $query <br>";
				trigger_error(mysql_error(), E_USER_ERROR);
			}
			else{
				$bandera_oral = 0;
				$bandera_cartel = 0;
				$bandera_curso = 0;
				$bandera_taller = 0;
				$bandera_vacio = mysql_num_rows($r);
				if ($bandera_vacio > 0) {
					while ($row = mysql_fetch_assoc($r)) {
						//modalidades de ponencia oral
						
						if(($bandera_oral == 0) && ($row['id_modalidad']=='AC'||$row['id_modalidad']=='ID'||$row['id_modalidad']=='EA'||$row['id_modalidad']=='HM'||$row['id_modalidad']=='RP'||$row['id_modalidad']=='UT'||$row['id_modalidad']=='ED'||$row['id_modalidad']=='EM'||$row['id_modalidad']=='PN'||$row['id_modalidad']=='AE'||$row['id_modalidad']=='MS'||$row['id_modalidad']=='OP'||$row['id_modalidad']=='VD')){
							echo "<form action='lista_trabajos.php' method='POST'>";
							echo "<input type='text' style='display:none;' name='tipotrabajo' value='oral' />";
							echo "<input type='submit' value='PONENCIA ORAL' class='boton_evaluador'/><br/><br/>";
							echo "</form>";
							$bandera_oral = 1;
						}
						//modalidades cartel
						if(($bandera_cartel == 0) && ($row['id_modalidad']=='AC'||$row['id_modalidad']=='ID'||$row['id_modalidad']=='EA'||$row['id_modalidad']=='HM'||$row['id_modalidad']=='RP'||$row['id_modalidad']=='UT'||$row['id_modalidad']=='ED'||$row['id_modalidad']=='EM'||$row['id_modalidad']=='PN'||$row['id_modalidad']=='AE'||$row['id_modalidad']=='MS'||$row['id_modalidad']=='OP'||$row['id_modalidad']=='VD')){
							echo "<form action='lista_trabajos.php' method='POST'>";
							echo "<input type='text' style='display:none;' name='tipotrabajo' value='cartel'  />";
							echo "<input type='submit' value='CARTEL' class='boton_evaluador'/><br/><br/>";
							echo "</form>";
							$bandera_cartel = 1;
						}
						//modalidad curso
						if(($bandera_curso == 0) && ($row['id_modalidad']=='CU')){
							echo "<form action='lista_trabajos.php' method='POST'>";
							echo "<input type='text' style='display:none;' name='tipotrabajo' value='curso'  />";
							echo "<input type='submit' value='CURSO' class='boton_evaluador'/><br/><br/>";
							echo "</form>";
							$bandera_curso = 1;
						}
						//modalidad taller					
						if (($bandera_taller == 0) && ($row['id_modalidad']=='TA')){
							echo "<form action='lista_trabajos.php' method='POST'>";
							echo "<input type='text' style='display:none;' name='tipotrabajo' value='taller'  />";
							echo "<input type='submit' value='TALLER' class='boton_evaluador'/>";
							echo "</form>";
							$bandera_taller = 1;
						}
					}
				}
				elseif ($bandera_vacio == 0) {
					echo "Usted no tiene asignada ninguna modalidad para evaluar, por favor esté al pendiente de las modalidades que le puedan ser asignadas posteriormente.";
				}
			}
			echo "";

			mysql_close();
		?>
		
</fieldset>
<br>
<script>
function back(){
	window.location.href = 'registro_trabajos.php'
}
</script>
<input type='button' name='regresar' value='Regresar' onClick='back()'>