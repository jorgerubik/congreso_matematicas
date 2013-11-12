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
	
	$titulo = htmlspecialchars($_POST['Titulo_cartel']);
	$categoria = $_POST['Categoria'];
	$modalidad = $_POST['modalidad'];
	$resumen = htmlspecialchars($_POST['Resumen']);
	$referencias = htmlspecialchars($_POST['Referencias']);
	$rfc_autor = strtoupper(htmlspecialchars($_POST['Rfc_autor']));
	$rfc_coautor1 = strtoupper(htmlspecialchars($_POST['Rfc_coautor1']));
	$rfc_coautor2 = strtoupper(htmlspecialchars($_POST['Rfc_coautor2']));
	$rfc_coautor3 = strtoupper(htmlspecialchars($_POST['Rfc_coautor3']));
	$rfc_coautor4 = strtoupper(htmlspecialchars($_POST['Rfc_coautor4']));
	$requiere = $_POST['requiere'];
	$requiere1 = $_POST['requiere1'];
	$requiere2 = $_POST['requiere2'];
	$requiere3 = $_POST['requiere3'];
	$requiere4 = $_POST['requiere4'];
//conexión con servidor
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
	
		//insertando los datos
		require("script/validaciones_rfc_editar.php");
				$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					echo "<form action = 'actualización_cartel.php' method='post'><fieldset>";
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
					//echo "<legend>Datos de Cartel:</legend>";
					echo "<table border='1'><tbody>";
					echo "<tr><td>Título:</td><td>".$titulo."</td></tr>";
					echo "<tr><td>Categoria:</td><td>".$categoria."</td></tr>";
					echo "<tr><td>Modalidad:</td><td>".$modalidad."</td></tr>";
					echo "<tr><td>Resumen:</td><td>".$resumen."</td></tr>";
					echo "<tr><td>Referencias:</td><td>".$referencias."</td></tr>";
					//echo "<tr><td>Autores</td><td>Constancia</td></tr>";
					if (($rfc_autor_error == "")) {
						if($rfc_autor_limite == ""){
								echo "<tr><td>".$rfc_autor."</td><td>".$requiere."</td></tr>";
								
						}
					}
					if (($rfc_coautor1_error == "")) {
						if($rfc_coautor1_limite == ""){
								echo "<tr><td>".$rfc_coautor1."</td><td>".$requiere1."</td></tr>";
							
						}
					}
					if (($rfc_coautor2_error == "")) {
						if($rfc_coautor2_limite == ""){
								echo "<tr><td>".$rfc_coautor2."</td><td>".$requiere2."</td></tr>";
							
						}
					}
					if (($rfc_coautor3_error == "")) {
						if($rfc_coautor3_limite == ""){
								echo "<tr><td>".$rfc_coautor3."</td><td>".$requiere3."</td></tr>";
							
						}
					}
					if (($rfc_coautor4_error == "")) {
						if($rfc_coautor4_limite == ""){
								echo "<tr><td>".$rfc_coautor4."</td><td>".$requiere4."</td></tr>";
							
						}
					}
					echo "</tbody></table>";



					echo "</fieldset><fieldset id='edicion' style='display:none;'><legend id='edicion'>Edición</legend>";
					echo "<input type='text' name='titulo_confirma'id='titulo' value='".$titulo."'>";
					//echo "<legend id='edicion'>Categoria:</legend>";
					echo "<input type='text' name='categoria_confirma' id='categoria' value='".$categoria."'>";
					//echo "<legend id='edicion'>Modalidad:</legend>";
					echo "<input type='text' name='modalidad_confirma' id='modalidad' value='".$modalidad."'>";
					//echo "<legend id='edicion'>Resumen:</legend>";
					echo "<textarea  rows='6' cols='50' name='resumen_confirma' id='resumen'>".$resumen."</textarea>";
					//echo "<legend id='edicion'>Referencias:</legend>";
					echo "<textarea  rows='6' cols='50' name='referencias_confirma' id='referencias'>".$referencias."</textarea>";
					//echo "<legend id='edicion'>Autores:</legend>";
					if (($rfc_autor_error != "")||($rfc_autor_limite != "")){
						$rfc_autor = "";
						$requiere = "";
					echo "<input type='text' name='rfc_autor_conf' id='autores' value='".$rfc_autor."'>";
					echo "<input type='radio' name='requiere_autor' id='constancia' value='SI'>SI  <input type='radio' name='requiere_autor' id='constancia' value='NO'>NO";
					}
					else{
						if (($rfc_autor_error == "")||($rfc_autor_limite == "")){
						echo "<input type='text' name='rfc_autor_conf' id='autores' value='".$rfc_autor."'>";
							if($requiere == "SI"){
								echo "<input type='radio' name='requiere_autor' id='constancia' value='".$requiere."' checked>SI<input type='radio' name='requiere_autor' id='constancia' value='NO'>NO";
							}
							if ($requiere =="NO"){
								echo "<input type='radio' name='requiere_autor' id='constancia' value='SI'>SI<input type='radio' name='requiere_autor' id='constancia' value='".$requiere."' checked>NO";			
							}						
							
						}
					}
					//verifica coautor1
					if (($rfc_coautor1_error != "")||($rfc_coautor1_limite != "")) {
						$rfc_coautor1 = "";
						$requiere1 = "";
					echo "<input type='text' name='rfc_coautor1_conf' id='autores1' value='".$rfc_coautor1."'>";
					echo "<input type='radio' name='requiere_coautor1' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor1' id='constancia' value='NO'>NO";
					}
					else{
						if (($rfc_coautor1_error == "")||($rfc_coautor1_limite == "")) {
						echo "<input type='text' name='rfc_coautor1_conf' id='autores1' value='".$rfc_coautor1."' >";
							if($requiere1 == "SI"){
								echo "<input type='radio' name='requiere_coautor1' id='constancia' value='".$requiere1."' checked>SI <input type='radio' name='requiere_coautor1' id='constancia' value='NO'>NO";
							}
							else if ($requiere1 =="NO"){
								echo "<input type='radio' name='requiere_coautor1' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor1' id='constancia' value='".$requiere1."' checked>NO";			
							}
							else{
								echo "<input type='radio' name='requiere_coautor1' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor1' id='constancia' value='NO'>NO";
							}

						}						
					}
					//verifica coautor2
					if (($rfc_coautor2_error != "")||($rfc_coautor2_limite != "")) {
						$rfc_coautor2 = "";
						$requiere2 = "";
					echo "<input type='text' name='rfc_coautor2_conf' id='autores2' value='".$rfc_coautor2."' >";
					echo "<input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor2' id='constancia' value='NO'>NO";

					}
					else{
						if (($rfc_coautor2_error == "")||($rfc_coautor2_limite == "")){
						echo "<input type='text' name='rfc_coautor2_conf' id='autores2' value='".$rfc_coautor2."' >";
							if($requiere2 == "SI"){
								echo "<input type='radio' name='requiere_coautor2' id='constancia' value='".$requiere2."' checked>SI <input type='radio' name='requiere_coautor2' id='constancia' value='NO'>NO";
							}
							else if ($requiere2 =="NO"){
								echo "<input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor2' id='constancia' value='".$requiere2."' checked>NO";			
							}
							else{
								echo "<input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor2' id='constancia' value='NO'>NO";

							}
						}
					}
					//verifica coautor 3
					if (($rfc_coautor3_error != "")||($rfc_coautor3_limite != "")) {
						$rfc_coautor3 = "";
						$requiere3 = "";
					echo "<input type='text' name='rfc_coautor3_conf' id='autores3' value='".$rfc_coautor3."' >";
					echo "<input type='radio' name='requiere_coautor3' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor3' id='constancia' value='NO'>NO";
					}
					else{
						if (($rfc_coautor3_error == "")||($rfc_coautor3_limite == "")){
						echo "<input type='text' name='rfc_coautor3_conf' id='autores3' value='".$rfc_coautor3."' >";
							if($requiere3 == "SI"){
								echo "<input type='radio' name='requiere_coautor3' id='constancia' value='".$requiere3."' checked>SI <input type='radio' name='requiere_coautor3' id='constancia' value='NO'>NO";
							}
							else if ($requiere3 =="NO"){
								echo "<input type='radio' name='requiere_coautor3' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor3' id='constancia' value='".$requiere3."' checked>NO";			
							}
							else{
								echo "<input type='radio' name='requiere_coautor3' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor3' id='constancia' value='NO'>NO";
							}
						}
					}
					//verifica coautor4
					if (($rfc_coautor4_error != "")||($rfc_coautor4_limite != "")) {
						$rfc_coautor4 = "";
						$requiere4 = "";
					echo "<input type='text' name='rfc_coautor4_conf' id='autores4' value='".$rfc_coautor4."' >";
					echo "<input type='radio' name='requiere_coautor4' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor4' id='constancia' value='NO'>NO";
					}
					else{
						if (($rfc_coautor4_error == "")||($rfc_coautor4_limite == "")){
						echo "<input type='text' name='rfc_coautor4_conf' id='autores4' value='".$rfc_coautor4."' >";
							if($requiere4 == "SI"){
								echo "<input type='radio' name='requiere_coautor4' id='constancia' value='".$requiere4."' checked>SI <input type='radio' name='requiere_coautor4' id='constancia' value='NO'>NO";
							}
							else if ($requiere4 =="NO"){
								echo "<input type='radio' name='requiere_coautor4' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor4' id='constancia' value='".$requiere4."' checked>NO";			
							}
							else{
								echo "<input type='radio' name='requiere_coautor4' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor4' id='constancia' value='NO'>NO";

							}					
						}
					}
					

					echo"<input type='text' id='id_ponencia' name='id_trabajo' style='visibility:hidden;' value='".$id_trabajo."' >";
		
	mysql_close();
?>
	</fieldset>
	<fieldset>
		<legend>Esta es la información que actualizo:</legend>
		<legend>Deséa continuar</legend>
	<input type='submit' name='enviar' value='enviar'>
	</fieldset>
</form>

	<legend>Regresar a la edición de cartel:</legend>
	<form method='post' action='editar_cartel.php'>
	<?echo"<input type='text' id='id_ponencia' name='id_trabajo' style='visibility:hidden;' value='".$id_trabajo."' >"; ?>
	<br>
	<input type="submit" name="regresar" value="Regresar">	
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