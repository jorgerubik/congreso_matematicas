<?
//  Autentificator
//  Gestión de Usuarios PHP+Mysql+sesiones
//  by Pedro Noves V. (Cluster)
//  clus@hotpop.com
// ------------------------------------------
require("aut_verifica.inc.php");
$nivel_acceso=-1; // Nivel de acceso para esta página.
// se chequea si el usuario tiene un nivel inferior
// al del nivel de acceso definido para esta página.
// Si no es correcto, se mada a la página que lo llamo con
// la variable de $error_login definida con el nº de error segun el array de
// aut_mensaje_error.inc.php
if ($nivel_acceso >= $_SESSION['usuario_nivel']){
header ("Location: $redir?error_login=5");
exit;
}
?>
<!doctype html>
<html lang="es">
	<head>
		<title>6&deg; Congreso de Matem&aacute;ticas - Registro Trabajos</title>
		<?php
			include_once "page/head.php";
		?>

		<script>
		<?php
		include "script/script_formulario.php";
		?>
		</script>		
	</head>

	<body>
            <div id="formatopagina">
		<!-- Cabecera de la página-->
		<section id="header">
			<?php
			include "page/header.php";
			?>
		</section>
		
		<!--Barra de navegación -->
		<section id="nav">
			<?php
				include "page/menucs.php";
			?>
		</section>
		
		<!--sección de contenido -->
		<section id="seccion">

		<script>
			alert("En \u00e9sta p\u00e1gina se confirman sus datos, para que su trabajo quede registrado en el sistema, favor de dar click en el bot\u00f3n Enviar al final de la p\u00e1gina.");
		</script>		
		
<?php
require ('script/utiles.php');
require('script/conexion.php');

//defino variables del formulario de registro general
	$id_ponencia = htmlspecialchars($_POST['id_ponencia']);
	$titulo = htmlspecialchars($_POST['Titulo_ponencia']);
	$categoria = $_POST['Categoria'];
	$modalidad = $_POST['modalidad'];
	$resumen = htmlspecialchars($_POST['Resumen']);
	$referencias = htmlspecialchars($_POST['Referencias']);
	$rfc_autor = strtoupper(htmlspecialchars($_POST['rfc_autor']));
	$rfc_coautor1 = strtoupper(htmlspecialchars($_POST['rfc_coautor1']));
	$rfc_coautor2 = strtoupper(htmlspecialchars($_POST['rfc_coautor2']));
	$rfc_coautor3 = strtoupper(htmlspecialchars($_POST['rfc_coautor3']));
	$rfc_coautor4 = strtoupper(htmlspecialchars($_POST['rfc_coautor4']));
	$requiere = $_POST['requiere'];
	$requiere1 = $_POST['requiere1'];
	$requiere2 = $_POST['requiere2'];
	$requiere3 = $_POST['requiere3'];
	$requiere4 = $_POST['requiere4'];
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

				function exe_query($query){
					
					$r = mysql_query($query);
					if (!$r) {
						echo "No se ejecutó el query: $query <br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					return $r;
					
				}	



	require('script/validaciones_rfc.php');
		
	
			$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					echo "<form action = 'registro_ponencia_confirmacion.php' method='post' ><fieldset>";
					echo "<legend>Confirmación de datos</legend>";
					echo "<legend>AUTORES:</legend> ";
					echo "<table border='1'> <tbody>";
					echo "<tr>"."<td>"."RFC"."</td><td> "."Nombre usuario"."</td><td>"."Primer apellido"."</td><td>"."Segundo apellido"."</td></tr>";

					while ($row = mysql_fetch_assoc($r)){
						if ($rfc_autor_limite == "") {
								echo "<tr>"."<td>".$row['RFC']."</td><td> ".$row['nombre_usuario']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
						}
					}
		$r1 = mysql_query($query1);
				if(!$r1){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					
					while ($row = mysql_fetch_assoc($r1)){
						if ($rfc_coautor1_limite == "") {
							echo "<tr>"."<td>".$row['RFC']."</td><td> ".$row['nombre_usuario']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
							
						}
					}
		$r2 = mysql_query($query2);
				if(!$r2){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					
					while ($row = mysql_fetch_assoc($r2)){
						if ($rfc_coautor2_limite == "") {
							echo "<tr>"."<td>".$row['RFC']."</td><td> ".$row['nombre_usuario']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
							
						}
					}
		$r3 = mysql_query($query3);
				if(!$r3){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					
					while ($row = mysql_fetch_assoc($r3)){
						if ($rfc_coautor3_limite == "") {
							echo "<tr>"."<td>".$row['RFC']."</td><td> ".$row['nombre_usuario']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
							
						}
					}	
		$r4 = mysql_query($query4);
				if(!$r4){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					
					while ($row = mysql_fetch_assoc($r4)){
						if ($rfc_coautor4_limite == "") {
							echo "<tr>"."<td>".$row['RFC']."</td><td> ".$row['nombre_usuario']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
							
						}
					}						

					echo "</tbody> </table>";
					echo "<legend>Datos de Ponencia:</legend>";
					echo "<table border='1'><tbody>";
					echo "<tr><td>Título:</td><td>".$titulo."</td></tr>";
					echo "<tr><td>Categoria:</td><td>".$categoria."</td></tr>";
					echo "<tr><td>Modalidad:</td><td>".$modalidad."</td></tr>";
					echo "<tr><td>Resumen:</td><td>".$resumen."</td></tr>";
					echo "<tr><td>Referencias:</td><td>".$referencias."</td></tr>";
					echo "<tr><td>Autores</td><td>Constancia</td></tr>";

					if (($rfc_autor_error == "")) {
						if($rfc_autor_limite == ""){
								echo "<tr><td>".$rfc_autor."</td><td>".$requiere."</td></tr>";
								
						}
					}
					if ($rfc_coautor1 == "") {
						
					}
					elseif (($rfc_coautor1_error == "")) {
						if($rfc_coautor1_limite == ""){
								echo "<tr><td>".$rfc_coautor1."</td><td>".$requiere1."</td></tr>";
							
						}
					}
					if ($rfc_coautor2 == "") {
						
					}
					elseif (($rfc_coautor2_error == "")) {
						if($rfc_coautor2_limite == ""){
								echo "<tr><td>".$rfc_coautor2."</td><td>".$requiere2."</td></tr>";
							
						}
					}
					if ($rfc_coautor3 == "") {
						
					}
					elseif (($rfc_coautor3_error == "")) {
						if($rfc_coautor3_limite == ""){
								echo "<tr><td>".$rfc_coautor3."</td><td>".$requiere3."</td></tr>";
							
						}
					}
					if ($rfc_coautor4 == "") {
						
					}
					elseif (($rfc_coautor4_error == "")) {
						if($rfc_coautor4_limite == ""){
								echo "<tr><td>".$rfc_coautor4."</td><td>".$requiere4."</td></tr>";
							
						}
					}
					echo "</tbody></table></fieldset>";

					//esto es lo que se edita, terminando esta lo que se envia al registro exitoso
					echo "<fieldset id='edicion' style='display:none;'><legend id='edicion'>Edición</legend>";
					echo "<legend id='edicion'>Titulo:</legend>";	
					echo "<input type='text' name='Titulo_ponencia' id='titulo' value='".$titulo."' required>";
					echo "<legend id='edicion'>Categoria:</legend>";
					//echo "<input type='text' name='categoria_confirma' id='categoria' value='".$categoria."'>";
					if ($categoria == 'investigacion') {
						echo "<input type='radio' name='Categoria' id='categoria' value='".$categoria."' checked>Investigación";
						echo "<input type='radio' name='Categoria' id='categoria' value='experiencia'>Experiencia en aula";
					}
					if($categoria == 'experiencia'){
						echo "<input type='radio' name='Categoria' id='categoria' value='investigacion' >Investigación";
						echo "<input type='radio' name='Categoria' id='categoria' value='".$categoria."' checked>Experiencia en aula";
					}
					echo "<legend id='edicion'>Modalidad:</legend>";
					//echo "<input type='text' name='modalidad_confirma' id='modalidad' value='".$modalidad."'>";
					 echo "<select id='ensenanza' name='modalidad'";
							 echo "<option value='' >Modalidad</option>";
							 echo "<option value=''>------------Enseñanza de las matemáticas------------</option> ";
							 if ($modalidad == 'AC') {
							 	echo "<option value='".$modalidad."' selected>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'ID') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='".$modalidad."' selected>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'EA') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='".$modalidad."' selected>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'HM') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='".$modalidad."' selected>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'RP') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM' >Historia (HM)</option> ";
							 	echo "<option value='".$modalidad."' selected>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'UT') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='".$modalidad."' selected>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'ED') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='".$modalidad."' selected>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'EM') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='".$modalidad."' selected>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'PN') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='".$modalidad."' selected>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'AE') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='".$modalidad."' selected>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'MS') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='".$modalidad."' selected>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'OP') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='".$modalidad."' selected>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'VD') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='".$modalidad."' selected>Vinculación con otras disciplinas (VD)</option> ";
							 }

					//termina codigo de modalidad
					echo "<legend id='edicion'>Resumen:</legend>";
					echo "<textarea  rows='6' cols='50' name='Resumen' id='resumen' required>".$resumen."</textarea>";
					echo "<legend id='edicion'>Referencias:</legend>";
					echo "<textarea  rows='6' cols='50' name='Referencias' id='referencias' required>".$referencias."</textarea>";
					echo "<table border='1'><tr><th><legend id='edicion'>Autores:</legend></th><th><legend id='edicion'>Requiere constancia:</legend></th></tr>";					
					if (($rfc_autor_error != "")||($rfc_autor_limite != "")){
						$rfc_autor = "";
						$requiere = "";
					echo "<tr><td><input type='text' name='rfc_autor' id='id_ponente1' value='".$rfc_autor."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere' id='constancia' value='SI'>SI </td> <td><input type='radio' name='requiere' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_autor_error == "")||($rfc_autor_limite == "")){
						echo "<tr><td><input type='text' name='rfc_autor' id='id_ponente1' value='".$rfc_autor."' maxlength='13'></td>";
							if($requiere == "SI"){
								echo "<td><input type='radio' name='requiere' id='constancia' value='".$requiere."' checked>SI<input type='radio' name='requiere' id='constancia' value='NO'>NO</td></tr>";
							}
							if ($requiere =="NO"){
								echo "<td><input type='radio' name='requiere' id='constancia' value='SI'>SI<input type='radio' name='requiere' id='constancia' value='".$requiere."' checked>NO</td></tr>";			
							}						
							
						}
					}
					//verifica coautor1
					if (($rfc_coautor1_error != "")||($rfc_coautor1_limite != "")) {
						$rfc_coautor1 = "";
						$requiere1 = "";
					echo "<tr><td><input type='text' name='rfc_coautor1' id='id_ponente2' value='".$rfc_coautor1."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere1' id='constancia' value='SI'>SI <input type='radio' name='requiere1' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor1_error == "")||($rfc_coautor1_limite == "")) {
						echo "<tr><td><input type='text' name='rfc_coautor1' id='id_ponente2' value='".$rfc_coautor1."' maxlength='13'></td>";
							if($requiere1 == "SI"){
								echo "<td><input type='radio' name='requiere1' id='constancia' value='".$requiere1."' checked>SI <input type='radio' name='requiere1' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere1 =="NO"){
								echo "<td><input type='radio' name='requiere1' id='constancia' value='SI'>SI <input type='radio' name='requiere1' id='constancia' value='".$requiere1."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere1' id='constancia' value='SI'>SI <input type='radio' name='requiere1' id='constancia' value='NO'>NO</td></tr>";
							}

						}						
					}
					//verifica coautor2
					if (($rfc_coautor2_error != "")||($rfc_coautor2_limite != "")) {
						$rfc_coautor2 = "";
						$requiere2 = "";
					echo "<tr><td><input type='text' name='rfc_coautor2' id='id_ponente3' value='".$rfc_coautor2."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere2' id='constancia' value='SI'>SI <input type='radio' name='requiere2' id='constancia' value='NO'>NO</td></tr>";

					}
					else{
						if (($rfc_coautor2_error == "")||($rfc_coautor2_limite == "")){
						echo "<tr><td><input type='text' name='rfc_coautor2' id='id_ponente3' value='".$rfc_coautor2."' maxlength='13'></td>";
							if($requiere2 == "SI"){
								echo "<td><input type='radio' name='requiere2' id='constancia' value='".$requiere2."' checked>SI <input type='radio' name='requiere2' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere2 =="NO"){
								echo "<td><input type='radio' name='requiere2' id='constancia' value='SI'>SI <input type='radio' name='requiere2' id='constancia' value='".$requiere2."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere2' id='constancia' value='SI'>SI <input type='radio' name='requiere2' id='constancia' value='NO'>NO</td></tr>";

							}
						}
					}
					//verifica coautor 3
					if (($rfc_coautor3_error != "")||($rfc_coautor3_limite != "")) {
						$rfc_coautor3 = "";
						$requiere3 = "";
					echo "<tr><td><input type='text' name='rfc_coautor3' id='id_ponente4' value='".$rfc_coautor3."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere3' id='constancia' value='SI'>SI <input type='radio' name='requiere3' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor3_error == "")||($rfc_coautor3_limite == "")){
						echo "<tr><td><input type='text' name='rfc_coautor3' id='id_ponente4' value='".$rfc_coautor3."' maxlength='13'></td>";
							if($requiere3 == "SI"){
								echo "<td><input type='radio' name='requiere3' id='constancia' value='".$requiere3."' checked>SI <input type='radio' name='requiere3' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere3 =="NO"){
								echo "<td><input type='radio' name='requiere3' id='constancia' value='SI'>SI <input type='radio' name='requiere3' id='constancia' value='".$requiere3."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere3' id='constancia' value='SI'>SI <input type='radio' name='requiere3' id='constancia' value='NO'>NO</td></tr>";
							}
						}
					}
					//verifica coautor4
					if (($rfc_coautor4_error != "")||($rfc_coautor4_limite != "")) {
						$rfc_coautor4 = "";
						$requiere4 = "";
					echo "<tr><td><input type='text' name='rfc_coautor4' id='id_ponente5' value='".$rfc_coautor4."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere4' id='constancia' value='SI'>SI <input type='radio' name='requiere4' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor4_error == "")||($rfc_coautor4_limite == "")){
						echo "<tr><td><input type='text' name='rfc_coautor4' id='id_ponente5' value='".$rfc_coautor4."' maxlength='13'></td>";
							if($requiere4 == "SI"){
								echo "<td><input type='radio' name='requiere4' id='constancia' value='".$requiere4."' checked>SI <input type='radio' name='requiere4' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere4 =="NO"){
								echo "<td><input type='radio' name='requiere4' id='constancia' value='SI'>SI <input type='radio' name='requiere4' id='constancia' value='".$requiere4."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere4' id='constancia' value='SI'>SI <input type='radio' name='requiere4' id='constancia' value='NO'>NO</td></tr>";

							}					
						}
					}

					//echo "<input type='text' id='id_ponencia' name='id_ponencia' value='".$id_ponencia."' />";
					echo "</table></fieldset><input type='button' value='Editar' id='BotonEditar' onClick='MostrarElemento();'>";
					echo "<input type='submit' value='Verificar' id='Verificacion' style='display:none'>";
			//////acaba edición y verificación, comienza envio de datos
				
					echo "</form><form action='registro_ponencia_exitoso.php' method='post' id='formulario'>";
					echo "<fieldset id='edicion' style='display:none;'><legend id='edicion'>Edición</legend>";
					echo "<legend id='edicion'>Titulo:</legend>";	
					echo "<input type='text' name='titulo_confirma' id='titulo' value='".$titulo."' required>";
					echo "<legend id='edicion'>Categoria:</legend>";
					//echo "<input type='text' name='categoria_confirma' id='categoria' value='".$categoria."'>";
					if ($categoria == 'investigacion') {
						echo "<input type='radio' name='categoria_confirma' id='categoria' value='".$categoria."' checked>Investigación";
						echo "<input type='radio' name='categoria_confirma' id='categoria' value='experiencia'>Experiencia en aula";
					}
					if($categoria == 'experiencia'){
						echo "<input type='radio' name='categoria_confirma' id='categoria' value='investigacion' >Investigación";
						echo "<input type='radio' name='categoria_confirma' id='categoria' value='".$categoria."' checked>Experiencia en aula";
					}
					echo "<legend id='edicion'>Modalidad:</legend>";
					//echo "<input type='text' name='modalidad_confirma' id='modalidad' value='".$modalidad."'>";
					 echo "<select id='ensenanza' name='modalidad_confirma'";
							 echo "<option value='' >Modalidad</option>";
							 echo "<option value=''>------------Enseñanza de las matemáticas------------</option> ";
							 if ($modalidad == 'AC') {
							 	echo "<option value='".$modalidad."' selected>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'ID') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='".$modalidad."' selected>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'EA') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='".$modalidad."' selected>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'HM') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='".$modalidad."' selected>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'RP') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM' >Historia (HM)</option> ";
							 	echo "<option value='".$modalidad."' selected>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'UT') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='".$modalidad."' selected>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'ED') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='".$modalidad."' selected>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'EM') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='".$modalidad."' selected>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'PN') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='".$modalidad."' selected>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'AE') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='".$modalidad."' selected>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'MS') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='".$modalidad."' selected>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'OP') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='".$modalidad."' selected>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($modalidad == 'VD') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='".$modalidad."' selected>Vinculación con otras disciplinas (VD)</option> ";
							 }

					//termina codigo de modalidad
					echo "<legend id='edicion'>Resumen:</legend>";
					echo "<textarea  rows='6' cols='50' name='resumen_confirma' id='resumen' required>".$resumen."</textarea>";
					echo "<legend id='edicion'>Referencias:</legend>";
					echo "<textarea  rows='6' cols='50' name='referencias_confirma' id='referencias' required>".$referencias."</textarea>";
					echo "<table border='1'><tr><th><legend id='edicion'>Autores:</legend></th><th><legend id='edicion'>Requiere constancia:</legend></th></tr>";					
					if (($rfc_autor_error != "")||($rfc_autor_limite != "")){
						$rfc_autor = "";
						$requiere = "";
					echo "<tr><td><input type='text' name='rfc_autor_conf' id='id_ponente1' value='".$rfc_autor."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere_autor' id='constancia' value='SI'>SI </td> <td><input type='radio' name='requiere_autor' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_autor_error == "")||($rfc_autor_limite == "")){
						echo "<tr><td><input type='text' name='rfc_autor_conf' id='id_ponente1' value='".$rfc_autor."' maxlength='13'></td>";
							if($requiere == "SI"){
								echo "<td><input type='radio' name='requiere_autor' id='constancia' value='".$requiere."' checked>SI<input type='radio' name='requiere_autor' id='constancia' value='NO'>NO</td></tr>";
							}
							if ($requiere =="NO"){
								echo "<td><input type='radio' name='requiere_autor' id='constancia' value='SI'>SI<input type='radio' name='requiere_autor' id='constancia' value='".$requiere."' checked>NO</td></tr>";			
							}						
							
						}
					}
					//verifica coautor1
					if (($rfc_coautor1_error != "")||($rfc_coautor1_limite != "")) {
						$rfc_coautor1 = "";
						$requiere1 = "";
					echo "<tr><td><input type='text' name='rfc_coautor1_conf' id='id_ponente2' value='".$rfc_coautor1."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere_coautor1' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor1' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor1_error == "")||($rfc_coautor1_limite == "")) {
						echo "<tr><td><input type='text' name='rfc_coautor1_conf' id='id_ponente2' value='".$rfc_coautor1."' maxlength='13'></td>";
							if($requiere1 == "SI"){
								echo "<td><input type='radio' name='requiere_coautor1' id='constancia' value='".$requiere1."' checked>SI <input type='radio' name='requiere_coautor1' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere1 =="NO"){
								echo "<td><input type='radio' name='requiere_coautor1' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor1' id='constancia' value='".$requiere1."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere_coautor1' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor1' id='constancia' value='NO'>NO</td></tr>";
							}

						}						
					}
					//verifica coautor2
					if (($rfc_coautor2_error != "")||($rfc_coautor2_limite != "")) {
						$rfc_coautor2 = "";
						$requiere2 = "";
					echo "<tr><td><input type='text' name='rfc_coautor2_conf' id='id_ponente3' value='".$rfc_coautor2."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor2' id='constancia' value='NO'>NO</td></tr>";

					}
					else{
						if (($rfc_coautor2_error == "")||($rfc_coautor2_limite == "")){
						echo "<tr><td><input type='text' name='rfc_coautor2_conf' id='id_ponente3' value='".$rfc_coautor2."' maxlength='13'></td>";
							if($requiere2 == "SI"){
								echo "<td><input type='radio' name='requiere_coautor2' id='constancia' value='".$requiere2."' checked>SI <input type='radio' name='requiere_coautor2' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere2 =="NO"){
								echo "<td><input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor2' id='constancia' value='".$requiere2."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor2' id='constancia' value='NO'>NO</td></tr>";

							}
						}
					}
					//verifica coautor 3
					if (($rfc_coautor3_error != "")||($rfc_coautor3_limite != "")) {
						$rfc_coautor3 = "";
						$requiere3 = "";
					echo "<tr><td><input type='text' name='rfc_coautor3_conf' id='id_ponente4' value='".$rfc_coautor3."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere_coautor3' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor3' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor3_error == "")||($rfc_coautor3_limite == "")){
						echo "<tr><td><input type='text' name='rfc_coautor3_conf' id='id_ponente4' value='".$rfc_coautor3."' maxlength='13'></td>";
							if($requiere3 == "SI"){
								echo "<td><input type='radio' name='requiere_coautor3' id='constancia' value='".$requiere3."' checked>SI <input type='radio' name='requiere_coautor3' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere3 =="NO"){
								echo "<td><input type='radio' name='requiere_coautor3' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor3' id='constancia' value='".$requiere3."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere_coautor3' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor3' id='constancia' value='NO'>NO</td></tr>";
							}
						}
					}
					//verifica coautor4
					if (($rfc_coautor4_error != "")||($rfc_coautor4_limite != "")) {
						$rfc_coautor4 = "";
						$requiere4 = "";
					echo "<tr><td><input type='text' name='rfc_coautor4_conf' id='id_ponente5' value='".$rfc_coautor4."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere_coautor4' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor4' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor4_error == "")||($rfc_coautor4_limite == "")){
						echo "<tr><td><input type='text' name='rfc_coautor4_conf' id='id_ponente5' value='".$rfc_coautor4."' maxlength='13'></td>";
							if($requiere4 == "SI"){
								echo "<td><input type='radio' name='requiere_coautor4' id='constancia' value='".$requiere4."' checked>SI <input type='radio' name='requiere_coautor4' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere4 =="NO"){
								echo "<td><input type='radio' name='requiere_coautor4' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor4' id='constancia' value='".$requiere4."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere_coautor4' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor4' id='constancia' value='NO'>NO</td></tr>";

							}					
						}
					}
					echo "</table></fieldset>";

					if($rfc_invalido>0 || $rfc_limite>0 || $rfc_limite_taller_curso>0){

					} else {
						echo "<input type='submit' name='enviar' value='Enviar' id='registro3'></form>";
					}					

						
	mysql_close();

?>
</section>		
		
		<!-- aside de la página -->
		<section id="aside">
			<?php
				include "page/aside.php";
			?>
		</section>

		<!-- Creditos de la pagina -->
		<section id="footer">
			<?php
				include "page/footer.php";
			?>
		</section>
            </div>
	</body>
</html>