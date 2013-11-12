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
	echo"<form action='eliminar_taller.php' method='post'>";
	$id_trabajo = $_POST['id_trabajo'];
	echo"<fieldset><legend>Eliminar</legend>	<legend>¿Está seguro de eliminar el taller seleccionado?</legend>";
	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."'style='visibility:hidden;'><br>";
	echo"<input type='submit' value='Si'>";
	echo"</fieldset></form>";
	echo "<form action='eliminar_coautor_taller.php' method='post'><fieldset> ";
	echo "<legend>Desea eliminar un coautor: </legend>";
	echo "<legend>Favor de introducir el RFC del coautor a eliminar: </legend>";
	echo "<input type='text' name='rfc_coautor' required> ";
	echo"<input type='text' name='id_trabajo' value='".$id_trabajo."'style='visibility:hidden;'><br>";
	echo "<input type='submit' value='Eliminar Coautor'><br> ";
	echo"<legend>No</legend>";
	echo"<a href='editar_trabajos.php'>Regresar</a></fieldset>";
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