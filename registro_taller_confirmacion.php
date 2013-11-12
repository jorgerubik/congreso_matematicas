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
	$id_taller = htmlspecialchars($_POST['id_taller']);
	$titulo = htmlspecialchars($_POST['titulo_taller']);
	$contenido = htmlspecialchars($_POST['Contenido']);
	$materiales = htmlspecialchars($_POST['materiales']);
	$rfc_autor = htmlspecialchars($_POST['rfc_autor']);
	$rfc_coautor1 = htmlspecialchars($_POST['rfc_coautor1']);
	$rfc_coautor2 = htmlspecialchars($_POST['rfc_coautor2']);
	$requiere = $_POST['requiere'];
	$requiere1 = $_POST['requiere1'];
	$requiere2 = $_POST['requiere2'];
	
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

		require("script/validaciones_rfc.php");



		$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					echo "<form action = 'registro_taller_confirmacion.php' method='post' ><fieldset>";//id='formulario'
					echo "<legend>Confirmación de datos</legend>";
					echo "<legend>AUTORES:</legend> ";
					echo "<table border='1'> <tbody>";
					echo "<tr>"."<td>"."RFC"."</td><td> "."Nombre usuario"."</td><td>"."Primer apellido"."</td><td>"."Segundo apellido"."</td></tr>";

					while ($row = mysql_fetch_assoc($r)){
						if ($rfc_autor_limite == "") {
							if ($rfc_autor_taller_curso == "") {
								echo "<tr>"."<td>".$row['RFC']."</td><td> ".$row['nombre_usuario']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
							}
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
							if ($rfc_coautor1_taller_curso == "") {
							echo "<tr>"."<td>".$row['RFC']."</td><td> ".$row['nombre_usuario']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
							}
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
							if ($rfc_coautor2_taller_curso == "") {
							echo "<tr>"."<td>".$row['RFC']."</td><td> ".$row['nombre_usuario']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
							}
						}
					}
		

					echo "</tbody> </table>";
					echo "<legend>Datos de Taller:</legend>";
					echo "<table border='1'><tbody>";
					echo "<tr><td>Título:</td><td>".$titulo."</td></tr>";
					echo "<tr><td>Resumen:</td><td>".$contenido."</td></tr>";
					echo "<tr><td>Materiales:</td><td>".$materiales."</td></tr>";
					echo "<tr><td>Autores</td><td>Constancia</td></tr>";
					if (($rfc_autor_error == "")) {
						if($rfc_autor_limite == ""){
							if ($rfc_autor_taller_curso == "") {
								echo "<tr><td>".$rfc_autor."</td><td>".$requiere."</td></tr>";
							}	
						}
					}
					if (($rfc_coautor1_error == "")) {
						if($rfc_coautor1_limite == ""){
							if ($rfc_coautor1_taller_curso == "") {
								echo "<tr><td>".$rfc_coautor1."</td><td>".$requiere1."</td></tr>";
							}
						}
					}
					if (($rfc_coautor2_error == "")) {
						if($rfc_coautor2_limite == ""){
							if ($rfc_coautor2_taller_curso == "") {
								echo "<tr><td>".$rfc_coautor2."</td><td>".$requiere2."</td></tr>";
							}
						}
					}
					echo "</tbody></table>";


					echo "</fieldset><fieldset id='edicion' style='display:none;'><legend id='edicion'>Edición</legend>";
					echo "<legend id='edicion'>Titulo:</legend>";
					echo "<input type='text' name='titulo_taller' id='titulo' value='".$titulo."' required>";
					echo "<legend id='edicion'>Contenido:</legend>";
					echo "<textarea  rows='6' cols='50' name='Contenido' id='contenido' required>".$contenido."</textarea>";
					echo "<legend id='edicion'>Materiales:</legend>";
					echo "<textarea  rows='6' cols='50' name='materiales' id='materiales' required>".$materiales."</textarea>";
					echo "<table border='1'><tr><th><legend id='edicion'>Autores:</legend></th><th><legend id='edicion'>Requiere constancia:</legend></th></tr>";
					//verifica autor
					if (($rfc_autor_error != "")||($rfc_autor_limite != "")||($rfc_autor_taller_curso != "")){
						$rfc_autor = "";
						$requiere = "";
					echo "<tr><td><input type='text' name='rfc_autor' id='id_ponente1' value='".$rfc_autor."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere' id='constancia' value='SI'>SI <input type='radio' name='requiere' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_autor_error == "")||($rfc_autor_limite == "")||($rfc_autor_taller_curso == "")){
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
					if (($rfc_coautor1_error != "")||($rfc_coautor1_limite != "")||($rfc_coautor1_taller_curso != "")) {
						$rfc_coautor1 = "";
						$requiere1 = "";
					echo "<tr><td><input type='text' name='rfc_coautor1' id='id_ponente2' value='".$rfc_coautor1."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere1' id='constancia' value='SI'>SI <input type='radio' name='requiere1' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor1_error == "")||($rfc_coautor1_limite == "")||($rfc_coautor1_taller_curso == "")) {
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
					if (($rfc_coautor2_error != "")||($rfc_coautor2_limite != "")||($rfc_coautor2_taller_curso != "")) {
						$rfc_coautor2 = "";
						$requiere2 = "";
					echo "<tr><td><input type='text' name='rfc_coautor2' id='id_ponente3' value='".$rfc_coautor2."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere2' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor2_error == "")||($rfc_coautor2_limite == "")||($rfc_coautor2_taller_curso == "")){
						echo "<tr><td><input type='text' name='rfc_coautor2' id='id_ponente3' value='".$rfc_coautor2."' maxlength='13'></td>";
							if($requiere1 == "SI"){
								echo "<td><input type='radio' name='requiere2' id='constancia' value='".$requiere2."' checked>SI <input type='radio' name='requiere2' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere1 =="NO"){
								echo "<td><input type='radio' name='requiere2' id='constancia' value='SI'>SI <input type='radio' name='requiere2' id='constancia' value='".$requiere2."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere2' id='constancia' value='SI'>SI <input type='radio' name='requiere2' id='constancia' value='NO'>NO</td></tr>";
							}
						}
					}
					echo "</table><input type='text' id='id_taller' name='id_taller' style='display:none;' value='".$id_taller."' />";
					echo "</fieldset>";
					echo "<input type='button' value='Editar' id='BotonEditar' OnClick='MostrarElemento();'>";
					echo "<input type='submit' value='Verificar' id='Verificacion' style='display:none'>";

				//acaba form para edición y verificación, comienza enviar datos
					echo "</form><form action='registro_taller_exitoso.php' method='post' id='formulario'>";
					echo "</fieldset><fieldset id='edicion' style='display:none;'><legend id='edicion'>Edición</legend>";
					echo "<legend id='edicion'>Titulo:</legend>";
					echo "<input type='text' name='titulo_confirma' id='titulo' value='".$titulo."' required>";
					echo "<legend id='edicion'>Contenido:</legend>";
					echo "<textarea  rows='6' cols='50' name='contenido_confirma' id='contenido' required>".$contenido."</textarea>";
					echo "<legend id='edicion'>Materiales:</legend>";
					echo "<textarea  rows='6' cols='50' name='materiales_confirma' id='materiales' required>".$materiales."</textarea>";
					echo "<table border='1'><tr><th><legend id='edicion'>Autores:</legend></th><th><legend id='edicion'>Requiere constancia:</legend></th></tr>";
					//verifica autor
					if (($rfc_autor_error != "")||($rfc_autor_limite != "")||($rfc_autor_taller_curso != "")){
						$rfc_autor = "";
						$requiere = "";
					echo "<tr><td><input type='text' name='rfc_autor_conf' id='id_ponente1' value='".$rfc_autor."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere_autor' id='constancia' value='SI'>SI <input type='radio' name='requiere_autor' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_autor_error == "")||($rfc_autor_limite == "")||($rfc_autor_taller_curso == "")){
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
					if (($rfc_coautor1_error != "")||($rfc_coautor1_limite != "")||($rfc_coautor1_taller_curso != "")) {
						$rfc_coautor1 = "";
						$requiere1 = "";
					echo "<tr><td><input type='text' name='rfc_coautor1_conf' id='id_ponente2' value='".$rfc_coautor1."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere_coautor1' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor1' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor1_error == "")||($rfc_coautor1_limite == "")||($rfc_coautor1_taller_curso == "")) {
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
					if (($rfc_coautor2_error != "")||($rfc_coautor2_limite != "")||($rfc_coautor2_taller_curso != "")) {
						$rfc_coautor2 = "";
						$requiere2 = "";
					echo "<tr><td><input type='text' name='rfc_coautor2_conf' id='id_ponente3' value='".$rfc_coautor2."' maxlength='13'></td>";
					echo "<td><input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor2' id='constancia' value='NO'>NO</td></tr>";
					}
					else{
						if (($rfc_coautor2_error == "")||($rfc_coautor2_limite == "")||($rfc_coautor2_taller_curso == "")){
						echo "<tr><td><input type='text' name='rfc_coautor2_conf' id='id_ponente3' value='".$rfc_coautor2."' maxlength='13'></td>";
							if($requiere1 == "SI"){
								echo "<td><input type='radio' name='requiere_coautor2' id='constancia' value='".$requiere2."' checked>SI <input type='radio' name='requiere_coautor2' id='constancia' value='NO'>NO</td></tr>";
							}
							else if ($requiere1 =="NO"){
								echo "<td><input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor2' id='constancia' value='".$requiere2."' checked>NO</td></tr>";			
							}
							else{
								echo "<td><input type='radio' name='requiere_coautor2' id='constancia' value='SI'>SI <input type='radio' name='requiere_coautor2' id='constancia' value='NO'>NO</td></tr>";
							}
						}
					}
					echo "</table><input type='text' id='id_taller' name='id_taller' style='display:none;' value='".$id_taller."' />";
					echo "</fieldset>";
					if($rfc_invalido>0 || $rfc_limite>0 || $rfc_limite_taller_curso>0){

					} else {
						echo "<input type='submit' name='enviar' value='enviar' id='registro4'></form>";
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