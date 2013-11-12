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
			<div class="cajatextoscroll">
				<div class="cajatexto">
			
<?php

require ('script/utiles.php');
require('script/conexion.php');

//defino variables del formulario de registro general
	$usuario = $_SESSION['usuario_id']; 
	$id_trabajo = $_POST['id_trabajo'];
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
		
		$query_sacar_rfc = "SELECT RFC FROM usuarios WHERE id_usuario = '".$usuario."';";
				$result_rfc=exe_query($query_sacar_rfc);
				$row_rfc = mysql_fetch_array($result_rfc); 

				$rfc = $row_rfc[0];				

		//insertando los datos
		$query = "SELECT * FROM ponencias_oral WHERE RFC = '".$rfc."'"." AND id_ponencia_oral = '".$id_trabajo."'";
					$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					
					echo "<h3>Ponencias orales registradas: </h3>";
					//echo "<table border='1'> <tbody>";
					while ($row = mysql_fetch_assoc($r)){
						
							 echo "<form action='editar_ponencia_confirmacion.php' method='post' id='formulario'>";
							 echo "<fieldset>";
							 echo "<legend>Formulario de Edición </legend>";
							 echo "<legend>Título (máximo 15 palabras):</legend>";
							 echo "<input type='text' name='Titulo_ponencia' id='titulo_ponencia' value='".$row['titulo_oral']."' onblur='wordCountd();' > ";
							 echo "<legend>Categoría:</legend>";
							 if ($row['id_categoria'] == 'investigacion') {
							 	# code...
								 echo "<input type='radio' name='Categoria' value='".$row['id_categoria']."' checked>Investigación <br> ";
								 echo "<input type='radio' name='Categoria' value='experiencia'>Experiencia en aula ";
							 }
							 if ($row['id_categoria'] == 'experiencia') {
							 	# code...
							 	echo "<input type='radio' name='Categoria' value='".$row['id_categoria']."' checked>Experiencia en aula ";	
							 	echo "<input type='radio' name='Categoria' value='investigacion'>Investigación <br> ";
							 }
							 echo "</fieldset><fieldset>";
							 echo "<legend>Modalidad:</legend>";
							 echo "<select id='ensenanza' name='modalidad'";
							 echo "<option value='' >Modalidad</option>";
							 echo "<option value=''>------------Enseñanza de las matemáticas------------</option> ";
							 if ($row['id_modalidad'] == 'AC') {
							 	echo "<option value='".$row['id_modalidad']."' selected>Aprendizaje cooperativo (AC)</option>";
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
							 if ($row['id_modalidad'] == 'ID') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='".$row['id_modalidad']."' selected>Innovación didáctica y metodológica (ID)</option> ";
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
							 if ($row['id_modalidad'] == 'EA') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='".$row['id_modalidad']."' selected>Entorno al aprendizaje (EA)</option> ";
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
							 if ($row['id_modalidad'] == 'HM') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='".$row['id_modalidad']."' selected>Historia (HM)</option> ";
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
							 if ($row['id_modalidad'] == 'RP') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM' >Historia (HM)</option> ";
							 	echo "<option value='".$row['id_modalidad']."' selected>Resolución de problemas y habilidades (RP)</option> ";
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
							 if ($row['id_modalidad'] == 'UT') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='".$row['id_modalidad']."' selected>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($row['id_modalidad'] == 'ED') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='".$row['id_modalidad']."' selected>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($row['id_modalidad'] == 'EM') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='".$row['id_modalidad']."' selected>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='PN'>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($row['id_modalidad'] == 'PN') {
							 	echo "<option value='AC'>Aprendizaje cooperativo (AC)</option>";
							 	echo "<option value='ID'>Innovación didáctica y metodológica (ID)</option> ";
							 	echo "<option value='EA'>Entorno al aprendizaje (EA)</option> ";
							 	echo "<option value='HM'>Historia (HM)</option> ";
							 	echo "<option value='RP'>Resolución de problemas y habilidades (RP)</option> ";
							 	echo "<option value='UT'>Uso de las TIC´s (UT)</option> ";
							 	echo "<option value='ED'>Experiencias docentes (ED)</option> ";
							 	echo "<option value='EM'>Enseñando con manipulables (EM)</option> ";
							 	echo "<option value='".$row['id_modalidad']."' selected>Pensamiento numérico y simbólico (PN)</option> ";
							 	echo "<option value=''>--------------Aplicación de las matemáticas--------------</option> ";
							 	echo "<option value='AE'>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($row['id_modalidad'] == 'AE') {
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
							 	echo "<option value='".$row['id_modalidad']."' selected>Análisis estadístico y diseño de experimentos (AE)</option> ";
							 	echo "<option value='MS'>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($row['id_modalidad'] == 'MS') {
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
							 	echo "<option value='".$row['id_modalidad']."' selected>Modelación y simulación (MS)</option> ";
							 	echo "<option value='OP'>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($row['id_modalidad'] == 'OP') {
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
							 	echo "<option value='".$row['id_modalidad']."' selected>Optimización (OP)</option> ";
							 	echo "<option value='VD'>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 if ($row['id_modalidad'] == 'VD') {
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
							 	echo "<option value='".$row['id_modalidad']."' selected>Vinculación con otras disciplinas (VD)</option> ";
							 }
							 echo "</select></fieldset><fieldset>";
							 echo "<legend>Resumen (máximo 300 palabras):</legend>";
							 echo "<textarea row='6' cols='50' name='Resumen' id='Contenido_area' onblur='wordCount();' >".$row['resumen_oral']." </textarea> ";
							 echo "</fieldset><fieldset>";
							 echo "<legend> Referencias (máximo 100 palabras):</legend>";
							 echo "<textarea row='6' cols='50' id='Contenido_area2' name='Referencias' onblur='wordCountb();'>".$row['referencias_oral']."</textarea> ";
							 echo "</fieldset><fieldset>";
							 echo "<legend>Autores:</legend>";
							 echo "<table border='1' id='autores'><tr><th>Autor</th><th>RFC</th><th>Requiere constancia</th></r> ";
							 echo "<tr><th>Autor</th>";
							 echo "<td><input type='text' id='id_ponente1' name='Rfc_autor' maxlenght='10' value='".$rfc."' required></td>";
							 $query_requiere = "SELECT constancia FROM autores WHERE RFC = '".$rfc."'"." AND id_trabajo = '".$id_trabajo."'";
							 $result_requiere=exe_query($query_requiere);
							 $row_requiere = mysql_fetch_array($result_requiere); 
  							 $requiere = $row_requiere[0];	
  							 if ($requiere == 'SI') {
  							 	# code...
							 	echo "<td><input type='radio' name='requiere' value='".$requiere."' checked>Si <input type='radio' name='requiere' id='requiere' value='NO'>NO </td></tr>";
  							 }
  							 if ($requiere == 'NO') {
  							 	# code...
  							 	echo "<td><input type='radio' name='requiere' value='SI'>Si <input type='radio' name='requiere' id='requiere' value='".$requiere."' checked>NO </td></tr>";

  							 }
  							 //coautor1
  							 $query_co1 = "SELECT RFC FROM autores WHERE id_trabajo = '".$id_trabajo."'"."AND tipo_autor = 'coautor1'";
  							 $result_co1=exe_query($query_co1);
							 $row_co1 = mysql_fetch_array($result_co1); 
  							 $rco1 = $row_co1[0];
  							 //coautor2
  							 $query_co2 = "SELECT RFC FROM autores WHERE id_trabajo = '".$id_trabajo."'"."AND tipo_autor = 'coautor2'";
  							 $result_co2=exe_query($query_co2);
							 $row_co2 = mysql_fetch_array($result_co2); 
  							 $rco2 = $row_co2[0];
  							 //coautor3
  							 $query_co3 = "SELECT RFC FROM autores WHERE id_trabajo = '".$id_trabajo."'"."AND tipo_autor = 'coautor3'";
  							 $result_co3=exe_query($query_co3);
							 $row_co3 = mysql_fetch_array($result_co3); 
  							 $rco3 = $row_co3[0];
  							 //coautor4
  							 $query_co4 = "SELECT RFC FROM autores WHERE id_trabajo = '".$id_trabajo."'"."AND tipo_autor = 'coautor4'";
  							 $result_co4=exe_query($query_co4);
							 $row_co4 = mysql_fetch_array($result_co4); 
  							 $rco4 = $row_co4[0];

  							 
  							 echo "<tr> <th>Coautor 1</th>";
  							 echo "<td><input type='text' id='id_ponente2' name='Rfc_coautor1' value='".$rco1."'></td> ";
  							 $query_requiere1 = "SELECT constancia FROM autores WHERE RFC = '".$rco1."'"." AND id_trabajo = '".$id_trabajo."'";
							 $result_requiere1=exe_query($query_requiere1);
							 $row_requiere1 = mysql_fetch_array($result_requiere1); 
  							 $requiere1 = $row_requiere1[0];
  							 if ($requiere1 == 'SI') {
  							 	# code...
							 	echo "<td><input type='radio' name='requiere1' value='".$requiere1."' checked>Si <input type='radio' name='requiere1' id='requiere' value='NO'>NO </td></tr>";
  							 }
  							 if ($requiere1 == 'NO') {
  							 	# code...
  							 	echo "<td><input type='radio' name='requiere1' value='SI'>Si <input type='radio' name='requiere1' id='requiere' value='".$requiere1."' checked>NO </td></tr>";

  							 }
  							 if ($requiere1 == '') {
  							 	# code...
   							 	echo "<td><input type='radio' name='requiere1' value='SI'>Si <input type='radio' name='requiere1' id='requiere' value='NO'>NO </td></tr>";
 							 	
  							 }
  							 echo "<tr> <th>Coautor 2</th>";
  							 echo "<td><input type='text' id='id_ponente3' name='Rfc_coautor2' value='".$rco2."'></td> ";
  							 $query_requiere2 = "SELECT constancia FROM autores WHERE RFC = '".$rco2."'"." AND id_trabajo = '".$id_trabajo."'";
							 $result_requiere2=exe_query($query_requiere2);
							 $row_requiere2 = mysql_fetch_array($result_requiere2); 
  							 $requiere2 = $row_requiere2[0];
  							 if ($requiere2 == 'SI') {
  							 	# code...
							 	echo "<td><input type='radio' name='requiere2' value='".$requiere2."' checked>Si <input type='radio' name='requiere2' id='requiere' value='NO'>NO </td></tr>";
  							 }
  							 if ($requiere2 == 'NO') {
  							 	# code...
  							 	echo "<td><input type='radio' name='requiere2' value='SI'>Si <input type='radio' name='requiere2'  id='requiere' value='".$requiere2."' checked>NO </td></tr>";

  							 }
  							 if ($requiere2 == '') {
  							 	# code...
   							 	echo "<td><input type='radio' name='requiere2' value='SI'>Si <input type='radio' name='requiere2' id='requiere' value='NO'>NO </td></tr>";
 							 	
  							 }
  							 echo "<tr> <th>Coautor 3</th>";
  							 echo "<td><input type='text' id='id_ponente4' name='Rfc_coautor3' value='".$rco3."'></td> ";
  							 $query_requiere3 = "SELECT constancia FROM autores WHERE RFC = '".$rco3."'"." AND id_trabajo = '".$id_trabajo."'";
							 $result_requiere3=exe_query($query_requiere3);
							 $row_requiere3 = mysql_fetch_array($result_requiere3); 
  							 $requiere3 = $row_requiere3[0];
  							 if ($requiere3 == 'SI') {
  							 	# code...
							 	echo "<td><input type='radio' name='requiere3' value='".$requiere3."' checked>Si <input type='radio' name='requiere3' id='requiere' value='NO'>NO </td></tr>";
  							 }
  							 if ($requiere3 == 'NO') {
  							 	# code...
  							 	echo "<td><input type='radio' name='requiere3' value='SI'>Si <input type='radio' name='requiere3' id='requiere' value='".$requiere3."' checked>NO </td></tr>";

  							 }
  							 if ($requiere3 == '') {
  							 	# code...
   							 	echo "<td><input type='radio' name='requiere3' value='SI'>Si <input type='radio' name='requiere3' id='requiere' value='NO'>NO </td></tr>";
 							 	
  							 }
  							 echo "<tr> <th>Coautor 4</th>";
  							 echo "<td><input type='text' id='id_ponente5' name='Rfc_coautor4' value='".$rco4."'></td> ";
  							 $query_requiere4 = "SELECT constancia FROM autores WHERE RFC = '".$rco4."'"." AND id_trabajo = '".$id_trabajo."'";
							 $result_requiere4=exe_query($query_requiere4);
							 $row_requiere4 = mysql_fetch_array($result_requiere4); 
  							 $requiere4 = $row_requiere4[0];
  							 if ($requiere4 == 'SI') {
  							 	# code...
							 	echo "<td><input type='radio' name='requiere4' value='".$requiere4."' checked>Si <input type='radio' name='requiere4' id='requiere' value='NO'>NO </td></tr>";
  							 }
  							 if ($requiere4 == 'NO') {
  							 	# code...
  							 	echo "<td><input type='radio' name='requiere4' value='SI'>Si <input type='radio' name='requiere4' ' id='requiere' value='".$requiere4."' checked>NO </td></tr>";

  							 }
  							 if ($requiere4 == '') {
  							 	# code...
   							 	echo "<td><input type='radio' name='requiere4' value='SI'>Si <input type='radio' name='requiere3' id='requiere' value='NO'>NO </td></tr>";
 							 	
  							 }
							 echo "</table></fieldset>";
					}		 
					echo"<input type='text' name='id_trabajo' value='".$id_trabajo."' style='visibility:hidden;'>  <br>";

		
	mysql_close();
?>
							
				
		
		<input type="submit" name="enviar" value="enviar"  id="registro">
</form>
<form action="registro_trabajos.php" method="post">
		<input type="submit" name="Cancelar" value="Cancelar">
	</form>
	</div>
	</div>
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