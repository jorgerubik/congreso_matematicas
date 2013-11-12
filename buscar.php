<?
//  Autentificator
//  Gestión de Usuarios PHP+Mysql+sesiones
//  by Pedro Noves V. (Cluster)
//  clus@hotpop.com
// ------------------------------------------
require("aut_verifica.inc.php");
$nivel_acceso=4; // Nivel de acceso para esta página.
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
<html lang="en">
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
		<section id="seccion" class="formatocentro">

<?
	$usuario = $_POST['usuario'];
	
	
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

				
				//////****Imprime una tabla de la BD****//////		
				//imprimo id usuario y rol que tiene
					$query = "SELECT id_usuario, id_rol FROM usuario_rol WHERE id_usuario = '".$usuario."'";
					$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						echo "<br>";
					}
					echo "<br>";
					echo "<h3>USUARIO: </h3>";
					echo "<table border='1'> <tbody>";
					echo "<tr>"."<td>"."Id_usuario"."</td><td> "."Nivel de Rol"."</td></tr>";

					while ($row = mysql_fetch_assoc($r)){
						
						echo "<tr>"."<td>".$row['id_usuario']."</td><td> ".$row['id_rol']."</td></tr>";

					}
					echo "</tbody> </table>";	
			
	
	mysql_close();
?>
<br>
<table border="1">
	<tbody>
		<tr>
			<td>Tipo de acceso</td>
			<td>Número de asignación de acceso</td>
		</tr>
		<tr>
			<td>Usuario</td>
			<td>0</td>
		</tr>
		<tr>
			<td>Revisor</td>
			<td>1</td>
		</tr>
		<tr>
			<td>Evaluador</td>
			<td>2</td>
		</tr>
		<tr>
			<td>Revisor y Evaluador</td>
			<td>3</td>
		</tr>
		<tr>
			<td>Asignar Roles</td>
			<td>4</td>
		</tr>
		<tr>
			<td>Revisor y Asignar Roles</td>
			<td>5</td>
		</tr>
		<tr>
			<td>Evaluador y Asignar Roles</td>
			<td>6</td>
		</tr>
		<tr>
			<td>Administrador</td>
			<td>7</td>
		</tr>
	</tbody>
</table>

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
