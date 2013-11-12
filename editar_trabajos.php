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
		$query = "SELECT * FROM ponencias_taller WHERE RFC = '".$rfc."'";
					$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					
					echo "<h3>Talleres registrados: </h3>";
					//echo "<table border='1'> <tbody>";
					while ($row = mysql_fetch_assoc($r)){
						echo "<table border='1'> <tbody>".
							 "<tr><td>Id taller:</td><td>".$row['id_ponencia_taller'].
							 "</td></tr><tr><td>Titulo Taller:</td><td>".
							 $row['titulo_taller'].
							 "</td></tr><tr><td>Resumen:</td><td>".
							 $row['resumen_taller'].
							 "</td></tr><tr><td>Material:</td><td>".
							 $row['material_taller']."</td></tr>".
							 "</tbody></table><br>";
							 $id_trabajo = $row['id_ponencia_taller'];
					
		?>
		<fieldset>
			<legend>Acción a realizar:</legend>
			<form action="editar_taller.php" method="post">
				
					<legend></legend>
					<legend>Editar:</legend>
				<?	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."' style='visibility:hidden;'>" ?><br>

					<input type="submit" value="Editar">
				
			</form>
			<form action="elimina_taller_confirma.php" method="post">
				
					<legend></legend>
					<legend>Eliminar</legend>
				<?	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."' style='visibility:hidden;'>" ?><br>
					
					<input type="submit" value="eliminar">
				
			</form>
		</fieldset>
		<?php
					}
		$query = "SELECT * FROM ponencias_oral WHERE RFC = '".$rfc."'";
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
						echo "<table border='1'> <tbody>".
							 "<tr><td>Id ponencia:</td><td>".$row['id_ponencia_oral'].
							 "</td></tr><tr><td>Categoria:</td><td>".
							 $row['id_categoria'].
							 "</td></tr><tr><td>Modalidad:</td><td>".
							 $row['id_modalidad'].
							 "</td></tr><tr><td>Titulo Ponencia:</td><td>".
							 $row['titulo_oral'].
							 "</td></tr><tr><td>Resumen:</td><td>".
							 $row['resumen_oral'].
							 "</td></tr><tr><td>Referencias:</td><td>".
							 $row['referencias_oral']."</td></tr>".
							 "</tbody></table><br>";
							 $id_trabajo = $row['id_ponencia_oral'];
							 
					?>
					<fieldset>
			<legend>Acción a realizar:</legend>
			<form action="editar_ponencia.php" method="post">
				
					<legend></legend>
					<legend>Editar:</legend>
				<?	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."' style='visibility:hidden;'>" ?><br>
					<input type="submit" value="Editar">
				
			</form>
			<form action="elimina_ponencia_confirma.php" method="post">
				
					<legend></legend>
					<legend>Eliminar</legend>
					<?	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."'style='visibility:hidden;'>"  ?><br>
					<input type="submit" value="eliminar">
				
			</form>
		</fieldset>
					<?php		 
					}

		$query = "SELECT * FROM ponencias_curso WHERE RFC = '".$rfc."'";
					$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					
					echo "<h3>Cursos registrados: </h3>";
					//echo "<table border='1'> <tbody>";
					while ($row = mysql_fetch_assoc($r)){
						echo "<table border='1'> <tbody>".
							 "<tr><td>Id curso:</td><td>".$row['id_ponencia_curso'].
							 "</td></tr><tr><td>Titulo Curso:</td><td>".
							 $row['titulo_curso'].
							 "</td></tr><tr><td>Resumen:</td><td>".
							 $row['resumen_curso'].
							 "</td></tr><tr><td>Materiales:</td><td>".
							 $row['material_curso']."</td></tr>".
							 "</tbody></table><br>";
							 $id_trabajo = $row['id_ponencia_curso'];
					?>
					<fieldset>
			<legend>Acción a realizar:</legend>
			<form action="editar_curso.php" method="post">
				
					<legend></legend>
					<legend>Editar:</legend>
					<?	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."'style='visibility:hidden;'>"  ?><br>
					<input type="submit" value="Editar">
				
			</form>
			<form action="elimina_curso_confirma.php" method="post">
				
					<legend></legend>
					<legend>Eliminar</legend>
					<?	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."'style='visibility:hidden;'>"  ?><br>
					<input type="submit" value="eliminar">
				
			</form>
		</fieldset>
					<?php		 	

					}	

		$query = "SELECT * FROM ponencias_cartel WHERE RFC = '".$rfc."'";
					$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					
					echo "<h3>Carteles registrados: </h3>";
					//echo "<table border='1'> <tbody>";
					while ($row = mysql_fetch_assoc($r)){
						echo "<table border='1'> <tbody>".
							 "<tr><td>Id cartel:</td><td>".$row['id_ponencia_cartel'].
							 "</td></tr><tr><td>Categoria:</td><td>".
							 $row['id_categoria'].
							 "</td></tr><tr><td>Modalidad:</td><td>".
							 $row['id_modalidad'].
							 "</td></tr><tr><td>Titulo Cartel:</td><td>".
							 $row['titulo_cartel'].
							 "</td></tr><tr><td>Resumen:</td><td>".
							 $row['resumen_cartel'].
							 "</td></tr><tr><td>Referencias:</td><td>".
							 $row['referencias_cartel']."</td></tr>".
							 "</tbody></table><br>";
							 $id_trabajo = $row['id_ponencia_cartel'];

					?>
					<fieldset>
			<legend>Acción a realizar:</legend>
			<form action="editar_cartel.php" method="post">
				
					<legend></legend>
					<legend>Editar:</legend>
					<?	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."' style='visibility:hidden;'>"  ?><br>
					<input type="submit" value="Editar">
				
			</form>
			<form action="elimina_cartel_confirma.php" method="post">
				
					<legend></legend>
					<legend>Eliminar</legend>
					<?	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."'style='visibility:hidden;'>"  ?><br>
					<input type="submit" value="eliminar">
				
			</form>
		</fieldset>
					<?php		 
					}	
					mysql_close();				
?>
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