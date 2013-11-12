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
<?php

require ('script/utiles.php');
require('script/conexion.php');

//defino variables del formulario de registro general
	$nombre = htmlspecialchars($_POST['Nombre']);
	$primerap = htmlspecialchars($_POST['Primerap']);
	$segundoap = htmlspecialchars($_POST['Segundoap']);
	$id_usuario = htmlspecialchars($_POST['id_usuario']);
	$email = htmlspecialchars($_POST['Email']);
	$rfc = strtoupper(htmlspecialchars($_POST['Rfc']));
	$contra = $_POST['Password1'];
	$trayectoria = $_POST['grado'];
	$institucion = strtoupper(htmlspecialchars($_POST['institucionlab']));
	$pais = $_POST['Pais'];
	$estado = strtoupper(htmlspecialchars($_POST['Estado']));
//conexión con servidor
	// $host = "localhost";
	// $user = "root";
	// $pass = "0515delux!";
	// $db = "congresomat";
	// $fecha = date('Y-m-j');
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
	// querys para asegurar que no se repitan rfc o nombre y apellidos
	$queryrfc="SELECT RFC FROM usuarios WHERE RFC ='".$rfc."';";
	
	//$consultarfc = exe_query($query);
	//consulta_tb($query);
	//get_Tabla($pConsulta, $aTable);
	//show_Table($aTable, "tabla", $pConsulta, 1);
	$querynom = "SELECT * FROM usuarios WHERE nombre_usuario ='".$nombre."' AND apellido_paterno = '".$primerap."'AND apellido_materno = '".$segundoap."';";
	
	
// insersión o rechazo de registro
	if(consulta_tb($queryrfc) == 1 )
		{
		print '<script type="text/javascript">';
   		print 'alert("El RFC '.$rfc.' ya se encuenta registrado, por favor verifique que haya introducido el RFC correcto")'; 
		print '</script>';	
		}
	elseif (consulta_tb($querynom) == 1 ){
	 	print '<script type="text/javascript">';
    	print 'alert("El nombre y apellidos ya se encuentan registrados, por favor solicite su registro al correo congresomate6@gmail.com")'; 
	 	print '</script>';	
	  }	
		
	else
	{	
				
		//insertando los datos
		$query = "INSERT INTO usuarios VALUES('$id_usuario', '$rfc', '$contra', '$nombre', '$primerap', '$segundoap', '$email', '$fecha')";
		exe_query($query);
		$query = "INSERT INTO trayectoria_academica VALUES('$id_usuario', '$trayectoria')";
		exe_query($query);
		$query = "INSERT INTO trayectoria_laboral VALUES('$id_usuario', '$institucion', '$pais', '$estado')";
		exe_query($query);
		$query = "INSERT INTO usuario_rol VALUES('$id_usuario', '0')";
		exe_query($query);

		echo "<br>Se ha introducido satisfactoriamente el registro <br>";
		
		include("enviar.php");
		
		echo "<br> Usuario: $id_usuario";
		echo "<br> Contraseña: $contra";
	}	
	mysql_close();
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