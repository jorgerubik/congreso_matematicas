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
	$id_usuario = $_SESSION['usuario_id']; 
	$nombre = htmlspecialchars($_POST['Nombre']);
	$primerap = htmlspecialchars($_POST['Primerap']);
	$segundoap = htmlspecialchars($_POST['Segundoap']);
	$email = htmlspecialchars($_POST['Email']);
	//$rfc = strtoupper(htmlspecialchars($_POST['Rfc']));
	$contra = $_POST['Password1'];
	$institucion = strtoupper(htmlspecialchars($_POST['institucionlab']));
	$pais = $_POST['Pais'];
	$estado = strtoupper(htmlspecialchars($_POST['Estado']));
	$fecha = date('Y-m-j');
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
				// querys para asegurar que no se repitan rfc o nombre y apellidos
			//$queryrfc="SELECT RFC FROM usuarios WHERE RFC ='".$rfc."';";
			
			//$consultarfc = exe_query($query);
			//consulta_tb($query);
			//get_Tabla($pConsulta, $aTable);
			//show_Table($aTable, "tabla", $pConsulta, 1);
			//$querynom = "SELECT * FROM usuarios WHERE nombre_usuario ='".$nombre."' AND apellido_paterno = '".$primerap."'AND apellido_materno = '".$segundoap."';";
			
			
		// insersión o rechazo de registro
			// if(consulta_tb($queryrfc) == 1 )
			// 	{
			// 	print '<script type="text/javascript">';
		 //   		print 'alert("El RFC '.$rfc.' ya se encuenta registrado, por favor Verifique...")'; 
			// 	print '</script>';	
			// 	}
			// elseif (consulta_tb($querynom) == 1 ){
			//  	print '<script type="text/javascript">';
		 //    	print 'alert("El nombre y apellidos ya se encuentan registrados, por favor pida codigo para registarlo")'; 
			//  	print '</script>';	
			//   }	
				
			// else
			// {	
						
				// $query = "SELECT * FROM usuarios WHERE id_usuario = '".$id_usuario."'";
				// $cambio = exe_query($query);
				// $row = mysql_fetch_assoc($cambio);
				// $rfcc = $row['RFC'];
				// $contrac = $row['contrasena'];
				// $nombrec = $row['nombre_usuario'];
				// $apellido_patc = $row['apellido_paterno'];
				// $apellido_matc = $row['apellido_paterno'];
				// $emailc = $row['email'];
				// $fechac = $row['fecha_registro'];

				
				// $query="UPDATE usuario_rol SET id_rol = REPLACE( id_rol,  '$rol',  '$rol_final' ) WHERE id_usuario =  '$id_usuario' AND id_rol =  '$rol';";
				// exe_query($query);
				// echo "Se ha registrado el cambio";




				//insertando los datos
				$query = "UPDATE usuarios SET contrasena = '$contra', nombre_usuario = '$nombre', apellido_paterno = '$primerap', apellido_materno = '$segundoap', email = '$email', fecha_registro = '$fecha' WHERE id_usuario = '$id_usuario'";
				exe_query($query);
				$query = "UPDATE trayectoria_laboral SET id_institucion = '$institucion', id_pais = '$pais', id_estado = '$estado' WHERE id_usuario = '$id_usuario'";
				exe_query($query);
				
				include("enviar.php");
				echo "<br>Se ha introducido satisfactoriamente el cambios <br>";
				echo "<br> Usuario: $id_usuario";
				echo "<br> Contraseña: $contra";
			//}	
		
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