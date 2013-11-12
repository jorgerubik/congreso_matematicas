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
<?php

require ('script/utiles.php');
require('script/conexion.php');

//defino variables del formulario de registro general
	$id_curso = htmlspecialchars($_POST['id_curso']);
	$titulo = htmlspecialchars($_POST['titulo_curso']);
	$contenido = htmlspecialchars($_POST['Contenido']);
	$materiales = htmlspecialchars($_POST['Materiales']);
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
		
	//termina validación	

		$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					echo "<form action = 'registro_curso_exitoso.php' method='post'><fieldset>";
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
					echo "<legend>Datos de Curso:</legend>";
					echo "<table border='1'><tbody>";
					echo "<tr><td>Título:</td><td>".$titulo."</td></tr>";
					echo "<tr><td>Resumen:</td><td>".$contenido."</td></tr>";
					echo "<tr><td>Referencias:</td><td>".$materiales."</td></tr>";
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

					echo "</fieldset><fieldset id='edicion' style='visibility:hidden;'><legend id='edicion'>Edición</legend>";
					echo "<legend id='edicion'>Titulo:</legend>";
					echo "<input type='text' name='titulo_confirma' id='titulo' value='".$titulo."' style='visibility:hidden;'>";
					echo "<legend id='edicion'>Contenido:</legend>";
					echo "<textarea  rows='6' cols='50' name='contenido_confirma' id='contenido' style='visibility:hidden;'>".$contenido."</textarea>";
					echo "<legend id='edicion'>Materiales:</legend>";
					echo "<textarea  rows='6' cols='50' name='materiales_confirma' id='materiales' style='visibility:hidden;'>".$materiales."</textarea>";
					echo "<legend id='edicion'>Autores:</legend>";
					if (($rfc_autor_error != "")||($rfc_autor_limite != "")||($rfc_autor_taller_curso != "")){
						$rfc_autor = "";
						$requiere = "";
					echo "<input type='text' name='rfc_autor_conf' id='autores' value='".$rfc_autor."' style='visibility:hidden;'><input type='text' name='requiere_autor' id='constancia' value='".$requiere."' style='visibility:hidden;'>";
					}
					if (($rfc_autor_error == "")||($rfc_autor_limite == "")||($rfc_autor_taller_curso == "")){
					echo "<input type='text' name='rfc_autor_conf' id='autores' value='".$rfc_autor."' style='visibility:hidden;'><input type='text' name='requiere_autor' id='constancia' value='".$requiere."' style='visibility:hidden;'>";
						
					}
					if (($rfc_coautor1_error != "")||($rfc_coautor1_limite != "")||($rfc_coautor1_taller_curso != "")) {
						$rfc_coautor1 = "";
						$requiere1 = "";
					echo "<input type='text' name='rfc_coautor1_conf' id='autores1' value='".$rfc_coautor1."' style='visibility:hidden;'><input type='text' name='requiere_coautor1' id='constancia1' value='".$requiere1."' style='visibility:hidden;'>";
					}
					if (($rfc_coautor1_error == "")||($rfc_coautor1_limite == "")||($rfc_coautor1_taller_curso == "")) {
					echo "<input type='text' name='rfc_coautor1_conf' id='autores1' value='".$rfc_coautor1."' style='visibility:hidden;'><input type='text' name='requiere_coautor1' id='constancia1' value='".$requiere1."' style='visibility:hidden;'>";

					}
					if (($rfc_coautor2_error != "")||($rfc_coautor2_limite != "")||($rfc_coautor2_taller_curso != "")) {
						$rfc_coautor2 = "";
						$requiere2 = "";
					echo "<input type='text' name='rfc_coautor2_conf' id='autores2' value='".$rfc_coautor2."' style='visibility:hidden;'><input type='text' name='requiere_coautor2' id='constancia2' value='".$requiere2."' style='visibility:hidden;'>";
					}
					if (($rfc_coautor2_error == "")||($rfc_coautor2_limite == "")||($rfc_coautor2_taller_curso == "")){
					echo "<input type='text' name='rfc_coautor2_conf' id='autores2' value='".$rfc_coautor2."' style='visibility:hidden;'><input type='text' name='requiere_coautor2' id='constancia2' value='".$requiere2."' style='visibility:hidden;'>";

					}
					echo "<input type='text' id='id_curso' name='id_curso' style='visibility:hidden;' value='".$id_curso."' />";
					echo "</table></fieldset><input type='button' value='Editar' onClick='Mostrar();'><input type='submit' name='enviar' value='enviar'></form>";
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