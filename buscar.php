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
	$rfc = $_POST['Rfc'];
	
	
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

				
				//////****Imprime una tabla de la BD****//////		
				//imprimo id usuario y rol que tiene
					$query = "SELECT id_usuario, RFC, nombre_usuario, apellido_paterno, apellido_materno FROM usuarios WHERE RFC = '".$rfc."';";
					$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						if (mysql_num_rows($r)==1){
							$row = mysql_fetch_assoc($r);

							$query_evaluador = "SELECT COUNT(*) FROM usuario_rol WHERE id_usuario = '".$row['id_usuario']."' AND id_rol = 3;";
							$r_evaluador = mysql_query($query_evaluador);

							if(!$r_evaluador){
								echo "No se pudo ejecutar el query: $query_evaluador";
								echo "<br>";
								trigger_error(mysql_error(), E_USER_ERROR);
							}
							else{
								$row_evaluador = mysql_fetch_assoc($r_evaluador);
								if ($row_evaluador['COUNT(*)']>0){
									echo "<br><br>El usuario con el RFC que introdujo ya es evaluador.<br>";
									echo "<br><form method='post' action='asignar_evaluadores.php'>
										<input type='submit' name='regresar' value='Regresar'>
										</form>";
								}
								else if ($row_evaluador['COUNT(*)']==0){
									echo "<br>";
									echo "<br>";
									echo "<h3>Verifique los datos del usuario: </h3>";
									echo "<table border='1'> <tbody>";
									echo "<tr>"."<td>"."RFC usuario"."</td><td> "."Nombre"."</td></tr>";
									echo "<tr>"."<td>".$row['RFC']."</td><td> ".$row['nombre_usuario']." ".$row['apellido_paterno']." ".$row['apellido_materno']."</td></tr>";
									echo "</tbody> </table>";

									echo "<form method='post' action='asignar_modalidad.php'>";
									echo "<input type='text' id='id_usuario' name='id_usuario' style='visibility:hidden;' value='".$row['id_usuario']."' >";
									echo "<br>";
									echo "<script>
									function back(){
										window.location.href = 'asignar_evaluadores.php'
									}</script>";
									echo "<input type='button' name='regresar' value='Regresar' onClick='back()'>";
									echo "<input type='submit' name='enviar' value='Siguiente'>";

									echo "</form>";
								}
							}
							
						}

						else if (mysql_num_rows($r)==0){
							echo "<br><br>";
							echo "El usuario con el RFC que introdujo no se encuentra registrado en la base de datos.<br>";
							echo "<br><form method='post' action='asignar_evaluadores.php'>
										<input type='submit' name='regresar' value='Regresar'>
										</form>";
						}
					}	
	
	mysql_close();
?>
<!-- <form method='post' action='asignar_evaluadores.php'>
	<input type="submit" name="regresar" value="Regresar">
</form>
 --></section>		
		
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
