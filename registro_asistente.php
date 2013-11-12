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
			<div class="cajatexto">
				<?
				$usuario = $_SESSION['usuario_id'];

				$query = "SELECT COUNT(*) FROM inscripcion_congresistas WHERE id_usuario = '".$usuario."'";
				$r = exe_query($query);

				$row = mysql_fetch_assoc($r);

				if ($row['COUNT(*)'] == 0){
					echo 'Si desea registrarse como asistente debe leer las siguientes clausulas:

					<h3>Asistentes (Internos y Externos).</h3> 
	 
					<table >
					<tr><td>Hasta el 20 de febrero de 2014</td><td>	$   700.00</td></tr>
					<tr><td>Del 21 de febrero al 29 de abril de 2014</td><td>$ 800.00</td></tr>
					<tr><td>Del 30 de abril al 7 de mayo de 2014</td><td>$ 1 000.00</td></tr>			
					</table>
					<h3>Estudiantes</h3>

					<p class="parrafo" align="justify">
					Estudiantes de licenciatura, únicamente como asistentes y con derecho a un taller o curso $ 250.00</p>

					<p class="parrafo" align="justify">Estudiantes de licenciatura, únicamente con derecho a un taller o curso (sólo se dará constancia de taller)  $ 100.00<br>
					</p>

					<p class="parrafo" align="justify">A partir del 20 de febrero de 2014, se podrá realizar el pago de la inscripción de la siguiente forma:</p>
					 
					<p class="parrafo" align="justify"> a) Cajas de Campo 4 bajo el concepto de Sexto Congreso Internacional sobre la Enseñanza y Aplicación de las Matemáticas.</p>


					<p class="parrafo" align="justify"> b) Transferencia electrónica</p>

					<p class="parrafo" align="justify"><b>LE RECORDAMOS QUE DEBE CUMPLIR CON POR LO MENOS EL 70% DE ASISTENCIA AL CONGRESO PARA RECIBIR SU CONSTANCIA.</b></p>
					<form action="registro_asistente_exitoso.php" method="post">
						<fieldset>
							<legend>Asistente:</legend>
							<legend>Si leyó la información y desea ser asistente, haga click en el botón "Acepto"</legend>
							<input type="submit" value="Acepto">
						</fieldset>
					</form>';
				}
				else if($row['COUNT(*)']>0){
					echo "Usted ya se encuentra registrado como asistente del congreso, recuerde pagar la cuota correspondiente.<br><br>";
					echo "<a href='http://congresomatematicas.cuautitlan2.unam.mx/congreso/registro_trabajos.php'>Haga clic aqu&iacute; para regresar al men&uacute; principal.</a>";
				}
				?>

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