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

require('script/bd.php');

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

	// $id_ponencia = htmlspecialchars($_POST['id_ponencia']);
	$titulo = htmlspecialchars($_POST['titulo_confirma']);
	$categoria = $_POST['categoria_confirma'];
	$modalidad = $_POST['modalidad_confirma'];
	$resumen = htmlspecialchars($_POST['resumen_confirma']);
	$referencias = htmlspecialchars($_POST['referencias_confirma']);
	$rfc_autor = htmlspecialchars($_POST['rfc_autor_conf']);
	$rfc_coautor1 = htmlspecialchars($_POST['rfc_coautor1_conf']);
	$rfc_coautor2 = htmlspecialchars($_POST['rfc_coautor2_conf']);
	$rfc_coautor3 = htmlspecialchars($_POST['rfc_coautor3_conf']);
	$rfc_coautor4 = htmlspecialchars($_POST['rfc_coautor4_conf']);
	$requiere = $_POST['requiere_autor'];
	$requiere1 = $_POST['requiere_coautor1'];
	$requiere2 = $_POST['requiere_coautor2'];
	$requiere3 = $_POST['requiere_coautor3'];
	$requiere4 = $_POST['requiere_coautor4'];

$fecha = date('Y-m-j-G-i-s');
$ponencia_oral = "PO";

$query_numero = "SELECT num_registro FROM ponencias_oral ORDER BY num_registro DESC LIMIT 1";

$result = exe_query($query_numero);

$row = mysql_fetch_array($result);
if(!$row || $row[0] == 0){
	$numero_ponencia_modalidad = 1;
}
else{
	$numero_anterior = $row[0];
	$numero_ponencia_modalidad = 1 + $numero_anterior; 
}

if($numero_ponencia_modalidad <= 9){
	$query="INSERT INTO ponencias_oral VALUES ('".$ponencia_oral.$modalidad."00".$numero_ponencia_modalidad."', '$rfc_autor', '$categoria', '$modalidad', '$titulo', '$resumen', '$referencias', NULL, NULL, NULL,".$numero_ponencia_modalidad.", '$fecha')";
	exe_query($query);
	$query="INSERT INTO autores VALUES ('$rfc_autor', 'autor', 'T05', '".$ponencia_oral.$modalidad."00".$numero_ponencia_modalidad."', '$requiere', '$fecha')";
	exe_query($query);
	if ($rfc_coautor1 != "") {
		$query="INSERT INTO autores VALUES ('$rfc_coautor1', 'coautor1', 'T05', '".$ponencia_oral.$modalidad."00".$numero_ponencia_modalidad."', '$requiere1', '$fecha')";
		exe_query($query);
	}
	if ($rfc_coautor2 != ""){
		$query="INSERT INTO autores VALUES ('$rfc_coautor2', 'coautor2', 'T05', '".$ponencia_oral.$modalidad."00".$numero_ponencia_modalidad."', '$requiere2', '$fecha')";
		exe_query($query);
	}
	if ($rfc_coautor3 != ""){
		$query="INSERT INTO autores VALUES ('$rfc_coautor3', 'coautor3', 'T05', '".$ponencia_oral.$modalidad."00".$numero_ponencia_modalidad."', '$requiere3', '$fecha')";
		exe_query($query);
	}
	if ($rfc_coautor4 != ""){
		$query="INSERT INTO autores VALUES ('$rfc_coautor4', 'coautor4', 'T05', '".$ponencia_oral.$modalidad."00".$numero_ponencia_modalidad."', '$requiere4', '$fecha')";
		exe_query($query);
	}

	$query="SELECT id_ponencia_oral FROM ponencias_oral WHERE id_ponencia_oral = '".$ponencia_oral.$modalidad."00".$numero_ponencia_modalidad."';";
	$result1=exe_query($query);
}
else if($numero_ponencia_modalidad <= 99 && $numero_ponencia_modalidad > 9){
	$query="INSERT INTO ponencias_oral VALUES ('".$ponencia_oral.$modalidad."0".$numero_ponencia_modalidad."', '$rfc_autor', '$categoria', '$modalidad', '$titulo', '$resumen', '$referencias', NULL, NULL, NULL,".$numero_ponencia_modalidad.", '$fecha')";
	exe_query($query);
	$query="INSERT INTO autores VALUES ('$rfc_autor', 'autor', 'T05', '".$ponencia_oral.$modalidad."0".$numero_ponencia_modalidad."', '$requiere', '$fecha')";
	exe_query($query);
	if ($rfc_coautor1 != "") {
		$query="INSERT INTO autores VALUES ('$rfc_coautor1', 'coautor1', 'T05', '".$ponencia_oral.$modalidad."0".$numero_ponencia_modalidad."', '$requiere1', '$fecha')";
		exe_query($query);
	}
	if ($rfc_coautor2 != ""){
		$query="INSERT INTO autores VALUES ('$rfc_coautor2', 'coautor2', 'T05', '".$ponencia_oral.$modalidad."0".$numero_ponencia_modalidad."', '$requiere2', '$fecha')";
		exe_query($query);
	}
	if ($rfc_coautor3 != ""){
		$query="INSERT INTO autores VALUES ('$rfc_coautor3', 'coautor3', 'T05', '".$ponencia_oral.$modalidad."0".$numero_ponencia_modalidad."', '$requiere3', '$fecha')";
		exe_query($query);
	}
	if ($rfc_coautor4 != ""){
		$query="INSERT INTO autores VALUES ('$rfc_coautor4', 'coautor4', 'T05', '".$ponencia_oral.$modalidad."0".$numero_ponencia_modalidad."', '$requiere4', '$fecha')";
		exe_query($query);
	}

	$query="SELECT id_ponencia_oral FROM ponencias_oral WHERE id_ponencia_oral = '".$ponencia_oral.$modalidad."0".$numero_ponencia_modalidad."';";
	$result1=exe_query($query);
}
else if($numero_ponencia_modalidad > 99){
	$query="INSERT INTO ponencias_oral VALUES ('".$ponencia_oral.$modalidad.$numero_ponencia_modalidad."', '$rfc_autor', '$categoria', '$modalidad', '$titulo', '$resumen', '$referencias', NULL, NULL, NULL,".$numero_ponencia_modalidad.", '$fecha')";
	exe_query($query);
	$query="INSERT INTO autores VALUES ('$rfc_autor', 'autor', 'T05', '".$ponencia_oral.$modalidad.$numero_ponencia_modalidad."', '$requiere', '$fecha')";
	exe_query($query);
	if ($rfc_coautor1 != "") {
		$query="INSERT INTO autores VALUES ('$rfc_coautor1', 'coautor1', 'T05', '".$ponencia_oral.$modalidad.$numero_ponencia_modalidad."', '$requiere1', '$fecha')";
		exe_query($query);
	}
	if ($rfc_coautor2 != ""){
		$query="INSERT INTO autores VALUES ('$rfc_coautor2', 'coautor2', 'T05', '".$ponencia_oral.$modalidad.$numero_ponencia_modalidad."', '$requiere2', '$fecha')";
		exe_query($query);
	}
	if ($rfc_coautor3 != ""){
		$query="INSERT INTO autores VALUES ('$rfc_coautor3', 'coautor3', 'T05', '".$ponencia_oral.$modalidad.$numero_ponencia_modalidad."', '$requiere3', '$fecha')";
		exe_query($query);
	}
	if ($rfc_coautor4 != ""){
		$query="INSERT INTO autores VALUES ('$rfc_coautor4', 'coautor4', 'T05', '".$ponencia_oral.$modalidad.$numero_ponencia_modalidad."', '$requiere4', '$fecha')";
		exe_query($query);
	}

	$query="SELECT id_ponencia_oral FROM ponencias_oral WHERE id_ponencia_oral = '".$ponencia_oral.$modalidad.$numero_ponencia_modalidad."';";
	$result1=exe_query($query);
}


$row = mysql_fetch_array($result1);
$codigo_ponencia_oral = $row[0];
require('mensaje_exitoso_po.php');

echo "<br>Se ha introducido satisfactoriamente su registro a la base de datos.<br>";
echo "C&oacute;digo del trabajo: ".$codigo_ponencia_oral;

mysql_close();
?>
<br>
<a href="registro_ponencia.php">Agregar otra ponencia</a>
<br>
<a href="registro_trabajos.php">Ir al menú principal</a>
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