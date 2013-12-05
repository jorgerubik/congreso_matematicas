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

	$query_modalidades = "SELECT id_modalidad FROM modalidad_evaluador WHERE id_usuario = '".$id_usuario."'";
	$r_modalidades = mysql_query($query_modalidades);

	if (!$r_modalidades) {
		echo "No se ejecutó el query: $query_modalidades <br>";
		trigger_error(mysql_error(), E_USER_ERROR);
	}
	else{
		echo "<form action='editar_evaluadores_conf.php' method='post' autocomplete='off'>
		<fieldset>
			<legend>Seleccione las modalidades que el evaluador podrá calificar:</legend>
			<h3>ENSEÑANZA DE LAS MATEMÁTICAS</h3>";
		while ($row_modalidades = mysql_fetch_assoc($r_modalidades)) {
			if ($row_modalidades['id_modalidad'] == 'AC') {
				$AC = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'ID') {
				$ID = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'EA') {
				$EA = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'HM') {
				$HM = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'RP') {
				$RP = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'UT') {
				$UT = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'ED') {
				$ED = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'EM') {
				$EM = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'PN') {
				$PN = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'AE') {
				$AE = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'MS') {
				$MS = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'OP') {
				$OP = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'VD') {
				$VD = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'TA') {
				$TA = 1;
			}
			if ($row_modalidades['id_modalidad'] == 'CU') {
				$CU = 1;
			}
		}
		if ($AE) {
			echo "<input type='checkbox' name='modalidad[]' value='AC' id='AC' checked>Aprendizaje cooperativo (AC)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='AC' id='AC'>Aprendizaje cooperativo (AC)<br>";
		}
		if ($ID) {
			echo "<input type='checkbox' name='modalidad[]' value='ID' id='ID' checked>Innovaci&oacute;n didáctica y metodológica (ID)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='ID' id='ID'>Innovaci&oacute;n didáctica y metodológica (ID)<br>";
		}
		if ($EA) {
			echo "<input type='checkbox' name='modalidad[]' value='EA' id='EA' checked>Entorno al aprendizaje (EA)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='EA' id='EA'>Entorno al aprendizaje (EA)<br>";
		}
		if ($HM) {
			echo "<input type='checkbox' name='modalidad[]' value='HM' id='HM' checked>Historia (HM)<br> ";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='HM' id='HM'>Historia (HM)<br> ";
		}
		if ($RP) {
			echo "<input type='checkbox' name='modalidad[]' value='RP' id='RP'checked>Resolución de problemas y habilidades (RP)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='RP' id='RP'>Resolución de problemas y habilidades (RP)<br>";
		}
		if ($UT) {
			echo "<input type='checkbox' name='modalidad[]' value='UT' id='UT' checked>Uso de las TICs (UT)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='UT' id='UT'>Uso de las TICs (UT)<br>";
		}	
		if ($ED) {
			echo "<input type='checkbox' name='modalidad[]' value='ED' id='ED' checked>Experiencias docentes (ED)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='ED' id='ED'>Experiencias docentes (ED)<br>";
		}	
		if ($EM) {
			echo "<input type='checkbox' name='modalidad[]' value='EM' id='EM' checked>Enseñando con manipulables (EM)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='EM' id='EM'>Enseñando con manipulables (EM)<br>";
		}		
			
		echo "<h3>APLICACIÓN DE LAS MATEMÁTICAS</h3>";

		if ($PN) {
			echo "<input type='checkbox' name='modalidad[]' value='PN' id='PN' checked>Pensamiento numérico y simbólico (PN)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='PN' id='PN'>Pensamiento numérico y simbólico (PN)<br>";
		}
		if ($AE) {
			echo "<input type='checkbox' name='modalidad[]' value='AE' id='AE' checked>Análisis estadístico y diseño de experimentos (AE)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='AE' id='AE'>Análisis estadístico y diseño de experimentos (AE)<br>";
		}
		if ($MS) {
			echo "<input type='checkbox' name='modalidad[]' value='MS' id='MS' checked>Modelación y simulación (MS)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='MS' id='MS'>Modelación y simulación (MS)<br>";
		}	
		if ($OP) {
			echo "<input type='checkbox' name='modalidad[]' value='OP' id='OP' checked>Optimización (OP)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='OP' id='OP'>Optimización (OP)<br>";
		}	
		if ($VD) {
			echo "<input type='checkbox' name='modalidad[]' value='VD' id='VD' checked>Vinculación con otras disciplinas (VD)<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='VD' id='VD'>Vinculación con otras disciplinas (VD)<br>";
		}
			
		echo "<h3>TALLER O CURSO</h3>";	

		if ($TA) {
			echo "<input type='checkbox' name='modalidad[]' value='TA' id='TA' checked>Taller<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='TA' id='TA'>Taller<br>";
		}
		if ($CU) {
			echo "<input type='checkbox' name='modalidad[]' value='CU' id='CURSO' checked>Curso<br>";
		}
		else{
			echo "<input type='checkbox' name='modalidad[]' value='CU' id='CURSO'>Curso<br>";
		}	
			
		echo "</fieldset>
		<input type='text' id='id_usuario' name='id_usuario' style='visibility:hidden;' value='".$id_usuario."' >
		<script>
			function back(){
			window.location.href = 'editar_evaluadores.php'
			}
		</script>
		<br>
		<input type='button' name='regresar_edicion' value='Regresar' onClick='back()'>
		<input type = 'submit' id='enviar' name='enviar' values='Enviar'>
		</form>";
	}

	mysql_close();
?>