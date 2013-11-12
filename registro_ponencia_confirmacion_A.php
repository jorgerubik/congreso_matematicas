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
	$id_ponencia = htmlspecialchars($_POST['id_ponencia']);
	$titulo = htmlspecialchars($_POST['Titulo_ponencia']);
	$categoria = $_POST['Categoria'];
	$modalidad = $_POST['modalidad'];
	$resumen = htmlspecialchars($_POST['Resumen']);
	$referencias = htmlspecialchars($_POST['Referencias']);
	$rfc_autor = htmlspecialchars($_POST['rfc_autor']);
	$rfc_coautor1 = htmlspecialchars($_POST['rfc_coautor1']);
	$rfc_coautor2 = htmlspecialchars($_POST['rfc_coautor2']);
	$rfc_coautor3 = htmlspecialchars($_POST['rfc_coautor3']);
	$rfc_coautor4 = htmlspecialchars($_POST['rfc_coautor4']);
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
		
	
		//insertando los datos
// 		$query = "SELECT `RFC`, `nombre_usuario`, `apellido_paterno`, `apellido_materno` FROM `usuarios` WHERE RFC = '".$rfc_autor."'";
// 		$query1 = "SELECT `RFC`, `nombre_usuario`, `apellido_paterno`, `apellido_materno` FROM `usuarios` WHERE RFC = '".$rfc_coautor1."'";
// 		$query2 = "SELECT `RFC`, `nombre_usuario`, `apellido_paterno`, `apellido_materno` FROM `usuarios` WHERE RFC = '".$rfc_coautor2."'";
// 		$query3 = "SELECT `RFC`, `nombre_usuario`, `apellido_paterno`, `apellido_materno` FROM `usuarios` WHERE RFC = '".$rfc_coautor3."'";
// 		$query4 = "SELECT `RFC`, `nombre_usuario`, `apellido_paterno`, `apellido_materno` FROM `usuarios` WHERE RFC = '".$rfc_coautor4."'";
// //verificación de rfc

// 		$rfc_invalido = 0;

// 		$r_verificacion_rfc_autor = exe_query($query);

		
// 		if(!$row = mysql_fetch_array($r_verificacion_rfc_autor)){
// 			$rfc_autor_error = $rfc_autor;
// 			$rfc_invalido++;
// 		}
// 		else
// 			$rfc_autor_error = "";

// 		$r_verificacion_rfc_coautor1 = exe_query($query1);

		
// 		if(!$row = mysql_fetch_array($r_verificacion_rfc_coautor1)){
// 			$rfc_coautor1_error = $rfc_coautor1;
// 			$rfc_invalido++;
// 		}
// 		else
// 			$rfc_coautor1_error = "";

// 		$r_verificacion_rfc_coautor2 = exe_query($query2);

		
// 		if(!$row = mysql_fetch_array($r_verificacion_rfc_coautor2)){
// 			$rfc_coautor2_error = $rfc_coautor2;
// 			$rfc_invalido++;
// 		}
// 		else
// 			$rfc_coautor2_error  = "";

// 		$r_verificacion_rfc_coautor3 = exe_query($query3);

		
// 		if(!$row = mysql_fetch_array($r_verificacion_rfc_coautor3)){
// 			$rfc_coautor3_error = $rfc_coautor3;
// 			$rfc_invalido++;
// 		}
// 		else
// 			$rfc_coautor3_error  = "";
// 		//4
// 		$r_verificacion_rfc_coautor4 = exe_query($query4);

		
// 		if(!$row = mysql_fetch_array($r_verificacion_rfc_coautor4)){
// 			$rfc_coautor4_error = $rfc_coautor4;
// 			$rfc_invalido++;
// 		}
// 		else
// 			$rfc_coautor4_error  = "";
// 		//termina4
// 		if ($rfc_invalido>0) {
// 			$mensaje_rfc_error = "El o los RFC:<br><ul>";
// 			echo $mensaje_rfc_error;
// 			if ($rfc_autor_error != "") {
// 				echo "<li type='disc'>".$rfc_autor_error."</li>";
// 			}
// 			if ($rfc_coautor1_error != "") {
// 				echo "<li type='disc'>".$rfc_coautor1_error."</li>";
// 			}
// 			if ($rfc_coautor2_error != "") {
// 				echo "<li type='disc'>".$rfc_coautor2_error."</li>";
// 			}
// 			if ($rfc_coautor3_error != "") {
// 				echo "<li type='disc'>".$rfc_coautor3_error."</li>";
// 			}
// 			if ($rfc_coautor4_error != "") {
// 				echo "<li type='disc'>".$rfc_coautor4_error."</li>";
// 			}
// 			echo "</ul>no se encuentran registrados, por favor verifique que los datos que introdujo son correctos";
// 		}		





		$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					echo "<form action = 'registro_ponencia_exitoso.php' method='post'><fieldset>";
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


					echo "</fieldset><fieldset id='edicion' style='visibility:hidden;'><legend id='edicion'>Edición</legend>";
					echo "<legend id='edicion'>Titulo:</legend>";	
					echo "<input type='text' name='titulo_confirma' id='titulo' value='".$titulo."' style='visibility:hidden;'>";
					echo "<legend id='edicion'>Categoria:</legend>";
					echo "<input type='text' name='categoria_confirma' id='categoria' value='".$categoria."' style='visibility:hidden;'>";
					echo "<legend id='edicion'>Modalidad:</legend>";
					echo "<input type='text' name='modalidad_confirma'id='modalidad' value='".$modalidad."' style='visibility:hidden;'>";
					echo "<legend id='edicion'>Resumen:</legend>";
					echo "<textarea  rows='6' cols='50' name='resumen_confirma' id='resumen' style='visibility:hidden;' >".$resumen."</textarea>";
					echo "<legend id='edicion'>Referencias:</legend>";
					echo "<textarea  rows='6' cols='50' name='referencias_confirma'id='referencias' style='visibility:hidden;'>".$referencias."</textarea>";
					echo "<legend id='edicion'>Autores:</legend>";
					if (($rfc_autor_error != "")||($rfc_autor_limite != "")){
						$rfc_autor = "";
						$requiere = "";
					echo "<input type='text' name='rfc_autor_conf' id='autores' value='".$rfc_autor."' style='visibility:hidden;'><input type='text' name='requiere_autor' id='constancia' value='".$requiere."' style='visibility:hidden;'>";
					}
					if (($rfc_autor_error == "")||($rfc_autor_limite == "")){
					echo "<input type='text' name='rfc_autor_conf' id='autores' value='".$rfc_autor."' style='visibility:hidden;'><input type='text' name='requiere_autor' id='constancia' value='".$requiere."' style='visibility:hidden;'>";
						
					}
					if (($rfc_coautor1_error != "")||($rfc_coautor1_limite != "")) {
						$rfc_coautor1 = "";
						$requiere1 = "";
					echo "<input type='text' name='rfc_coautor1_conf' id='autores1' value='".$rfc_coautor1."' style='visibility:hidden;'><input type='text' name='requiere_coautor1' id='constancia1' value='".$requiere1."' style='visibility:hidden;'>";
					}
					if (($rfc_coautor1_error == "")||($rfc_coautor1_limite == "")) {
					echo "<input type='text' name='rfc_coautor1_conf' id='autores1' value='".$rfc_coautor1."' style='visibility:hidden;'><input type='text' name='requiere_coautor1' id='constancia1' value='".$requiere1."' style='visibility:hidden;'>";

					}
					if (($rfc_coautor2_error != "")||($rfc_coautor2_limite != "")) {
						$rfc_coautor2 = "";
						$requiere2 = "";
					echo "<input type='text' name='rfc_coautor2_conf' id='autores2' value='".$rfc_coautor2."' style='visibility:hidden;'><input type='text' name='requiere_coautor2' id='constancia2' value='".$requiere2."' style='visibility:hidden;'>";
					}
					if (($rfc_coautor2_error == "")||($rfc_coautor2_limite == "")){
					echo "<input type='text' name='rfc_coautor2_conf' id='autores2' value='".$rfc_coautor2."' style='visibility:hidden;'><input type='text' name='requiere_coautor2' id='constancia2' value='".$requiere2."' style='visibility:hidden;'>";

					}

					if (($rfc_coautor3_error != "")||($rfc_coautor3_limite != "")) {
						$rfc_coautor3 = "";
						$requiere3 = "";
					echo "<input type='text' name='rfc_coautor3_conf' id='autores3' value='".$rfc_coautor3."' style='visibility:hidden;'><input type='text' name='requiere_coautor3' id='constancia3' value='".$requiere3."' style='visibility:hidden;'>";
					}
					if (($rfc_coautor3_error == "")||($rfc_coautor3_limite == "")){
					echo "<input type='text' name='rfc_coautor3_conf' id='autores3' value='".$rfc_coautor3."' style='visibility:hidden;'><input type='text' name='requiere_coautor3' id='constancia3' value='".$requiere3."' style='visibility:hidden;'>";

					}

					if (($rfc_coautor4_error != "")||($rfc_coautor4_limite != "")) {
						$rfc_coautor4 = "";
						$requiere4 = "";
					echo "<input type='text' name='rfc_coautor4_conf' id='autores4' value='".$rfc_coautor4."' style='visibility:hidden;'><input type='text' name='requiere_coautor4' id='constancia4' value='".$requiere4."' style='visibility:hidden;'>";
					}
					if (($rfc_coautor4_error == "")||($rfc_coautor4_limite == "")){
					echo "<input type='text' name='rfc_coautor4_conf' id='autores4' value='".$rfc_coautor4."' style='visibility:hidden;'><input type='text' name='requiere_coautor4' id='constancia4' value='".$requiere4."' style='visibility:hidden;'>";

					}

					echo "<input type='text' id='id_ponencia' name='id_ponencia' style='visibility:hidden;' value='".$id_ponencia."' />";
					
					echo "</fieldset><input type='button' value='Editar' onClick='Mostrar();'> <input type='submit' name='enviar' value='enviar'></form>";
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