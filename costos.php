<!--?php
	include "script/script_login.php";
?-->
<!doctype html>
<html lang="en">
	<head>
		<title>6&deg; Congreso de Matem&aacute;ticas - Tarifa</title>
		<?php
			include_once "page/head.php";
		?>
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
				include "page/menu.php";
			?>
		</section>
		
		<!--sección de contenido -->
		<section id="seccion" class="tarifa">
			<?php
				include "content/Costos.php";
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


