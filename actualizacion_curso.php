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
	$id_trabajo = $_POST['id_trabajo'];
	$titulo = htmlspecialchars($_POST['titulo_confirma']);
	$contenido = htmlspecialchars($_POST['contenido_confirma']);
	$materiales = htmlspecialchars($_POST['materiales_confirma']);
	$rfc_autor = htmlspecialchars($_POST['rfc_autor_conf']);
	$rfc_coautor1 = htmlspecialchars($_POST['rfc_coautor1_conf']);
	$rfc_coautor2 = htmlspecialchars($_POST['rfc_coautor2_conf']);
	$requiere = $_POST['requiere_autor'];
	$requiere1 = $_POST['requiere_coautor1'];
	$requiere2 = $_POST['requiere_coautor2'];
	$fecha = date('Y-m-j-G-i-s');
	
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
	
				$query_sacar_rfc = "SELECT RFC FROM usuarios WHERE id_usuario = '".$usuario."';";
				$result_rfc=exe_query($query_sacar_rfc);
				$row_rfc = mysql_fetch_array($result_rfc); 

				$rfc = $row_rfc[0];

				$query = "SELECT * FROM autores WHERE tipo_autor = 'coautor1' AND id_trabajo = '".$id_trabajo."'";
				$cambio1 = exe_query($query);
				$row1 = mysql_fetch_assoc($cambio1);
				$coautor1 = $row1['RFC'];
				
				$query = "SELECT * FROM autores WHERE tipo_autor = 'coautor2' AND id_trabajo = '".$id_trabajo."'";
				$cambio2 = exe_query($query);
				$row2 = mysql_fetch_assoc($cambio2);
				$coautor2 = $row2['RFC'];
				

				//insertando los datos
				$query = "UPDATE ponencias_curso SET RFC = '$rfc_autor', titulo_curso = '$titulo', resumen_curso = '$contenido', material_curso = '$materiales' WHERE id_ponencia_curso = '$id_trabajo' ";
				exe_query($query);
				$query = "UPDATE autores SET RFC = '$rfc_autor', tipo_autor = 'autor', constancia = '$requiere' WHERE id_trabajo = '$id_trabajo' AND RFC = '$rfc'";
				exe_query($query);
				//si coautor1 existe lo actualiza
				if($coautor1 != "" && $rfc_coautor1 != ""){
					$query = "UPDATE autores SET RFC = '$rfc_coautor1', tipo_autor = 'coautor1', constancia = '$requiere1' WHERE id_trabajo = '$id_trabajo' AND RFC = '$coautor1'";
					exe_query($query);
				}
				//si coautor1 no existe lo registra, no lo actualiza
				if ($rfc_coautor1 != "" && $coautor1 == "") {
					$query="INSERT INTO autores VALUES ('$rfc_coautor1', 'coautor1', 'T09' , '$id_trabajo', '$requiere1','$fecha')";
					exe_query($query);
				}
				//si elimino coautor1
				if ($rfc_coautor1 == "" && $coautor1 != "") {
					$query="DELETE FROM autores WHERE id_trabajo = '$id_trabajo' AND tipo_autor = 'coautor1'";
					exe_query($query);
				}
				//si coautor 2 existe lo actualiza
				if ($coautor2 != "" && $rfc_coautor2 != "") {
					$query = "UPDATE autores SET RFC = '$rfc_coautor2', tipo_autor = 'coautor2', constancia = '$requiere2' WHERE id_trabajo = '$id_trabajo' AND RFC = '$coautor2'";
					exe_query($query);
				}
				//si coautor2 no existe lo registra, no lo actualiza
				if ($rfc_coautor2 != "" && $coautor2 == "") {
					$query="INSERT INTO autores VALUES ('$rfc_coautor2', 'coautor2', 'T09' , '$id_trabajo', '$requiere2','$fecha')";
					exe_query($query);
				}
				//si elimino coautor2
				if ($rfc_coautor2 == "" && $coautor2 != "") {
					$query="DELETE FROM autores WHERE id_trabajo = '$id_trabajo' AND tipo_autor = 'coautor2'";
					exe_query($query);
				}			

					
		echo "Se ha introducido satisfactoriamente el cambio <br>";
		require('mensaje_exitoso_act_cu.php');

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