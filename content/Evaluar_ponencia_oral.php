
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
			$tipotrabajo=$_POST['tipotrabajo'];
			$id_ponencia = $_POST['id_ponencia'];

			$query = "SELECT titulo_oral, resumen_oral, referencias_oral FROM ponencias_oral WHERE id_ponencia_oral = '".$id_ponencia."'";
			$r = mysql_query($query);
			if (!$r) {
				echo "No se ejecutó el query: $query <br>";
				trigger_error(mysql_error(), E_USER_ERROR);
			}
			else{
				$row = mysql_fetch_assoc($r);
				echo "<table cellpadding='15' > <tr><th style='vertical-align: top;' class='font_titulos'>Título:</th><td style='text-align: justify;'>".$row['titulo_oral']."</td></tr>";
				echo "<tr><th style='vertical-align: top;' class='font_titulos'>Resumen:</th><td style='text-align: justify;'>".$row['resumen_oral']."</td></tr>";
				echo "<tr><th style='vertical-align: top;' class='font_titulos'>Referencias:</th><td style='text-align: justify;'>".$row['referencias_oral']."</td></tr>";
				echo "</table>";
			}
		
			mysql_close();
		?>
		
</fieldset>
<br>

<script>
function Mostrar_Comentario_Aceptado(){
	if (document.getElementById('aceptado')) {
		document.getElementById('observaciones_aceptado').style.display='block';
		document.getElementById('aceptado').style.display='none';
		document.getElementById('rechazado').style.display='none';
		// document.getElementById('cancelar').style.display='block';
	};	
}
function Mostrar_Comentario_Rechazado(){
	if (document.getElementById('rechazado')) {
		document.getElementById('observaciones_rechazado').style.display='block';
		document.getElementById('aceptado').style.display='none';
		document.getElementById('rechazado').style.display='none';
		// document.getElementById('cancelar').style.display='block';
	};
}
function Cancelar(){
		if(document.getElementById('cancelar')){
		document.getElementById('observaciones_aceptado').style.display='none';
		document.getElementById('observaciones_rechazado').style.display='none';
		document.getElementById('aceptado').style.display='block';
		document.getElementById('rechazado').style.display='block';
		// document.getElementById('cancelar').style.display='none';
	};
}
</script>
<form action="lista_trabajos.php" method="POST">
	<?
		echo "<input type='text' name ='tipotrabajo' value='".$tipotrabajo."' style='display:none;'/>";
	?>
	<input type='submit' name='regresar' value='Regresar'/>
</form>	

<input type='button' id='aceptado' name='aceptado' value='Aceptado' onClick='Mostrar_Comentario_Aceptado()'/>
<input type='button' id='rechazado' name='rechazado' value='Rechazado' onClick='Mostrar_Comentario_Rechazado()'/>

<fieldset id='observaciones_aceptado' style='display:none;'>
	<legend>
		Trabajo Aceptado
	</legend>
	<form action = 'ponencia_oral_evaluada.php' method = 'post'>
		<table>
			<tr>
				<th style='vertical-align: top;' class='font_titulos'>
					Observaciones (máximo 40 palabras):
				</th>
				<td>
					<textarea id = 'Observaciones' name = 'comentario_aceptado' onBlur='wordCounth();'></textarea>
				</td>
			</tr>
		</table>
		<?
			echo "<input type='text' name ='id_ponencia' value='".$id_ponencia."' style='display:none;'/>";
			echo "<input type='text' name ='evaluacion' value='ACEPTADO' style='display:none;'/>";
		?>
		<input type='button' id='cancelar' name='cancelar' value='Cancelar' onClick='Cancelar()'/>
		<input type = 'submit' value = 'Enviar'>
	</form>
</fieldset>


<fieldset id='observaciones_rechazado' style='display:none;'>
	<legend>
		Trabajo Rechazado
	</legend>
	<form action = 'ponencia_oral_evaluada.php' method = 'post'>
		<table>
			<tr>
				<th style='vertical-align: top;' class='font_titulos'>
					Observaciones (máximo 40 palabras, campo obligatorio):
				</th>
				<td>
					<textarea id = 'Observaciones' name = 'comentario_rechazado' onBlur='wordCounth();' required></textarea>
				</td>
			</tr>
		</table>
		<?
			echo "<input type='text' name ='id_ponencia' value='".$id_ponencia."' style='display:none;'/>";
			echo "<input type='text' name ='evaluacion' value='RECHAZADO' style='display:none;'/>";
		?>
		<input type='button' id='cancelar' name='cancelar' value='Cancelar' onClick='Cancelar()'/>
		<input type = 'submit' value = 'Enviar'>
	</form>
</fieldset>

	<!-- <input type='button' id='cancelar' name='cancelar' value='Cancelar' style='display:none;' onClick='Cancelar()'/> -->
<h1><br/></h1>
<h1><br/></h1>