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
	
		//insertando los datos
		$query = "SELECT * FROM usuarios WHERE id_usuario = '".$usuario."'";
					$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					
					echo "<h3>USUARIO: </h3>";
					echo "<table border='1'> <tbody>";
					//echo "<tr><td>"."RFC"."</td></tr><tr> "."Contraseña"."</tr><tr>"."Nombre"."</tr><tr> "."Primer Apellido"."</tr><tr>"."Segundo apellido"."</tr><tr> "."E-mail"."</tr>";

					while ($row = mysql_fetch_assoc($r)){
						
						echo "<tr><td> RFC:</td><td>".$row['RFC'].
							 "</td></tr><tr><td>Contraseña:</td><td> ".
							 $row['contrasena'].
							 "</td></tr><tr><td>Nombre:</td><td>".
							 $row['nombre_usuario'].
							 "</td></tr><tr><td>Apellido paterno:</td><td>".
							 $row['apellido_paterno'].
							 "</td></tr><tr><td>Apellido materno:</td><td>".
							 $row['apellido_materno'].
							 "</td></tr><tr><td>E-mail:</td><td> "
							 .$row['email']."</td></tr>";

					}
					echo "</tbody> </table>";	
		$query = "SELECT * FROM trayectoria_laboral WHERE id_usuario = '".$usuario."'";
					$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					
					echo "<h3>Trayectoria laboral: </h3>";
					echo "<table border='1'> <tbody>";
					//echo "<tr><td>"."RFC"."</td></tr><tr> "."Contraseña"."</tr><tr>"."Nombre"."</tr><tr> "."Primer Apellido"."</tr><tr>"."Segundo apellido"."</tr><tr> "."E-mail"."</tr>";

					while ($row = mysql_fetch_assoc($r)){
						
						echo "<tr><td> Institución:</td><td>".$row['id_institucion'].
							 "</td></tr><tr><td>País:</td><td> ".
							 $row['id_pais'].
							 "</td></tr><tr><td>Estado:</td><td>".
							 $row['id_estado'].
							 "</td></tr>";

					}
					echo "</tbody> </table>";				
		
	mysql_close();
?>
		<form action="actualizacion_informacion.php" method="post">
			<fieldset>
				<legend>Nueva información(debe llenar todos los campos)</legend>
					<legend class="font_titulos">Datos de usuario</legend>
				<legend>Nombre:</legend>
				<input type="text" id="Nombre" name="Nombre" maxlength="40" size="40" required placeholder="Nombre(s)" pattern="[a-zA-ZñáéíóúÑÁÉÍÓÚ /]{2,40}"/>
				<legend>Primer apellido:</legend>
				<input type="text" id="Primerap" name="Primerap" maxlength="25" size="25" placeholder="Primer Apellido" required pattern="[a-zA-ZñáéíóúÑÁÉÍÓÚ /]{2,25}"/>
				<legend>Segundo apellido:</legend>
				<input type="text" id="Segundoap" name="Segundoap" maxlength="25" size="25" required placeholder="Segundo Apellido" pattern="[a-zA-ZñáéíóúÑÁÉÍÓÚ /]{2,25}" />
				<legend>E-mail:</legend>
				<input type="email" id="Email" name="Email" maxlength="50" size="50" required placeholder="usuario@correo.com">
				<legend>Contrase&ntilde;a:</legend>
				<input type="password" id="Password1" name="Password1" maxlength="16" size="16" required pattern="[a-zA-Z0-9_-]{6,16}">
				<legend>Repita contrase&ntilde;a:</legend>
				<input type="password" id="Password2" maxlength="16" size="16" >
			</fieldset>	
				<!--Datos de trayectoria laboral  -->
			<fieldset class="trayectorialaboral">
				<legend class="font_titulos">Trayectoria laboral</legend>
				<legend>Instituci&oacute;n:</legend>
				<input type="text" id="institucionlab" name="institucionlab" maxlength="50" size="50" required placeholder="UNAM FES-CUAUTITLAN" pattern="[a-zA-ZñáéíóúÑÁÉÍÓÚ- /]{2,50}">
				<legend>Pa&iacute;s:</legend>
				<select name="Pais" id="Pais">
					<option value="" selected></option>
					<option value="mexico">M&eacute;xico</option>
					<option value="eu">Estados Unidos</option>
					<option value="canada">Canad&aacute;</option>
					<option value="colombia">Colombia</option>
					<option value="venezuela">Venezuela</option>
					<option value="brasil">Brasil</option>
					<option value="chile">Chile</option>
					<option value="peru">Peru</option>
					<option value="argentina">Argentina</option>
					<option value="espana">España</option>
				</select>
				<legend>Estado:</legend>
				<input type="text" name="Estado" id="Estado" maxlength="50" size="50" required placeholder="ESTADO DE MÉXICO" pattern="[a-zA-ZñáéíóúÑÁÉÍÓÚ /]{2,50}">
				<br><input type="reset" name="Borrar" value="Borrar" >
				<input type="submit" name="Enviar" value="Enviar" id="enviar">
			</fieldset>
			
		</form>
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