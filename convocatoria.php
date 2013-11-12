<!--?php
	include "script/script_login.php";
?-->
<!doctype html>
<html lang="en">
	<head>
		<title>6&deg; Congreso de Matem&aacute;ticas - Conferencias Magistrales</title>
		<?php
			include_once "page/head.php";
		?>
	</head>
	
	<body>
            <div id="formatopagina">
		<!-- Cabecera de la página-->
		<section id="header">
			<title>6&deg; Congreso de Matem&aacute;ticas - Conferencias Magistrales</title>
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
		<section id="seccion" class="formatocentro">
			<a href="pdf/convocatoria.pdf">Versi&oacute;n para descargar</a><br/><br/><br/>	
			<object type="application/pdf" data="pdf/convocatoria.pdf#toolbar=1&navpanes=1&scrollbar=1" width="570" height="570" id="pdf"> 
				<p style="text-align:center; width: 5%;">Adobe Reader no se encuentra o la versi&oacute;n no es compatible, utiliza el icono para ir a la p&aacute;gina de descarga <br /> 
				<a href="http://get.adobe.com/es/reader/" onclick="this.target='_blank'">
				<img src="reader_icon_special.jpg" alt="Descargar Adobe Reader" width="32" height="32" style="border: none;" /></a> 
				</p>
			</object>
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
