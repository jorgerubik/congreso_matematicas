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
			<p>El tiempo para registrar trabajos ha concluido, le pedimos esperar respuesta de nuestros evaluadores.</p>
			<div class="cajatextoscroll">
<div class="cajatexto">	
		<fieldset>
			<legend>Asistente</legend>
			<legend>Si desea formar parte del Congreso como asistente, de click en la imagen para conocer los requerimientos con los que debe cumplir:</legend>
			<form action="registro_asistente.php" method="post" class="forms">
				<input type="image" src="imagenes/Asistente.png" id="boton">
			</form>
		</fieldset>

	<?if(0 < $_SESSION['usuario_nivel']){ ?>
		<fieldset>
			<legend>Administrativo</legend>
			<?if ((4 == $_SESSION['usuario_nivel'])|| (5 == $_SESSION['usuario_nivel']) || (6 == $_SESSION['usuario_nivel']) || (7 == $_SESSION['usuario_nivel'])){ ?>
				<FORM action="opcion_evaluadores.php" method="post" class="form">
					<button type="submit" name="Admistrador" id="boton1">Asignación de evaluadores</button>
					<br>
				</FORM>
			<? } ?>
			<?if ((3 == $_SESSION['usuario_nivel']) || (7 == $_SESSION['usuario_nivel']) || (2 == $_SESSION['usuario_nivel']) || (6 == $_SESSION['usuario_nivel'])){ ?>
			<form action="menu_evaluadores.php" method="post" class="form">
				<button type="submit" name="comitevaluador" id="boton1">Comite evaluador</button>
			</form>
			<!-- <button type="submit" name="comitevaluador" id="boton">Asignación de fechas</button>
			<button type="submit" name="comitevaluador" id="boton">Usuarios</button>
			<button type="submit" name="comitevaluador" id="boton">Informes</button> -->
			<br>
			<? } ?>
		</fieldset>

	<? } ?>
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


