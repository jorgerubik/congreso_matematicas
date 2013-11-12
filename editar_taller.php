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
	$id_trabajo = $_POST['id_trabajo'];
	
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
		//sacamos RFC de usuario
		$query_sacar_rfc = "SELECT RFC FROM usuarios WHERE id_usuario = '".$usuario."';";
				$result_rfc=exe_query($query_sacar_rfc);
				$row_rfc = mysql_fetch_array($result_rfc); 

				$rfc = $row_rfc[0];				
		//sacamos datos de ponencia con el rfc y el id del trabajo para vaciarlos en las cajas de texto y poderlas manipular.
		$query = "SELECT * FROM ponencias_taller WHERE RFC = '".$rfc."'"."AND id_ponencia_taller = '".$id_trabajo."'";
					$r = mysql_query($query);
					if(!$r){
						echo "No se pudo ejecutar el query: $query";
						echo "<br>";
						trigger_error(mysql_error(), E_USER_ERROR);
					}
					else{
						echo " ";
						
					}
					
					echo "<h3>Talleres registrados: </h3>";
					//empezamos a vacíar los datos de la BD en los campos de texto
					while ($row = mysql_fetch_assoc($r)){
						
						echo"<form action='editar_taller_confirmacion.php' method='post' autocomplete='off' class='forms' id='formulario";
						echo"<fieldset id='ponencia'>";
						echo"<legend>Formulario de registro</legend>";
						echo"<legend>Título (máximo 15 palabras):</legend>";
						echo"<input type='text'  id='titulo_taller' name='titulo_taller' onblur='wordCountg();' value='".$row['titulo_taller']."' required>";
						echo"</fieldset>";
						echo"<fieldset>";
						echo"<legend>Contenido (máximo 300 palabras)</legend>";
						echo"<textarea rows='6' id='Contenido_area' name='Contenido'  cols='50' required onblur='wordCount();'>".$row['resumen_taller']."</textarea>";
						echo"</fieldset>";
						echo"<fieldset>";
						echo"<legend>Materiales (máximo 100 palabras)</legend>";
						echo"<textarea rows='4' cols='50' required name='materiales' id='Contenido_area1' name='Materiales' onblur='wordCountb();' >".$row['material_taller']."</textarea>";
						echo"</fieldset>";
						echo"<fieldset>";
				//empieza a lenarse la tabla de autores con RFC y si querían constancia o no
						echo"<legend>Autores</legend>";
						echo"<table border='1' id='autores'>";
						echo"<tr><th>Autor</th><th>RFC</th><th>Requiere constancia</th></tr>";
						echo"<tr><th>Autor</th>";
						echo"<td><input type='text' id='id_ponente1' name='Rfc_autor' value='".$rfc."' maxlenght='10' required></td>";
				//querys para saber si requería constancia o no el autor
						$query_requiere = "SELECT constancia FROM autores WHERE RFC = '".$rfc."'"." AND id_trabajo = '".$id_trabajo."'";
							 $result_requiere=exe_query($query_requiere);
							 $row_requiere = mysql_fetch_array($result_requiere); 
  							 $requiere = $row_requiere[0];	
  							 if ($requiere == 'SI') {
  							 	# code...
							 	echo "<td><input type='radio' name='requiere' value='".$requiere."' checked>Si <input type='radio' name='requiere' id='requiere' value='NO'>NO </td></tr>";
  							 }
  							 if ($requiere == 'NO') {
  							 	# code...
  							 	echo "<td><input type='radio' name='requiere' value='SI'>Si <input type='radio' name='requiere' id='requiere' value='".$requiere."' checked>NO </td></tr>";

  							 }
  					//querys para sacar los coautores (RFC) de cada uno
  						$query_co1 = "SELECT RFC FROM autores WHERE id_trabajo = '".$id_trabajo."'"."AND tipo_autor = 'coautor1'";
  							 $result_co1=exe_query($query_co1);
							 $row_co1 = mysql_fetch_array($result_co1); 
  							 $rco1 = $row_co1[0];
  							 //coautor2
  						$query_co2 = "SELECT RFC FROM autores WHERE id_trabajo = '".$id_trabajo."'"."AND tipo_autor = 'coautor2'";
  							 $result_co2=exe_query($query_co2);
							 $row_co2 = mysql_fetch_array($result_co2); 
  							 $rco2 = $row_co2[0];		 
  						echo"</tr><tr><th>Coautor 1</th>";
						echo"<td><input type='text' id='id_ponente2' value='".$rco1."' name='Rfc_coautor1' maxlenght='10'></td>";
					//query para ver si el coautor1 requería constancia y si no existe no saleciconar nada	
						$query_requiere1 = "SELECT constancia FROM autores WHERE RFC = '".$rco1."'"." AND id_trabajo = '".$id_trabajo."'";
							 $result_requiere1=exe_query($query_requiere1);
							 $row_requiere1 = mysql_fetch_array($result_requiere1); 
  							 $requiere1 = $row_requiere1[0];
  							 if ($requiere1 == 'SI') {
  							 	# code...
							 	echo "<td><input type='radio' name='requiere1' value='".$requiere1."' checked>Si <input type='radio' name='requiere1' id='requiere' value='NO'>NO </td></tr>";
  							 }
  							 if ($requiere1 == 'NO') {
  							 	# code...
  							 	echo "<td><input type='radio' name='requiere1' value='SI'>Si <input type='radio' name='requiere1' id='requiere' value='".$requiere1."' checked>NO </td></tr>";

  							 }
  							 if ($requiere1 == '') {
  							 	# code...
   							 	echo "<td><input type='radio' name='requiere1' value='SI'>Si <input type='radio' name='requiere1' id='requiere' value='NO'>NO </td></tr>";
 							 	
  							 }
  						echo"</tr><tr><th>Coautor 2</th>";
						echo"<td><input type='text' id='id_ponente3' value='".$rcol2."' name='Rfc_coautor2' maxlenght='10'></td>";
						$query_requiere2 = "SELECT constancia FROM autores WHERE RFC = '".$rco2."'"." AND id_trabajo = '".$id_trabajo."'";
							 $result_requiere2=exe_query($query_requiere2);
							 $row_requiere2 = mysql_fetch_array($result_requiere2); 
  							 $requiere2 = $row_requiere2[0];
  							 if ($requiere2 == 'SI') {
  							 	# code...
							 	echo "<td><input type='radio' name='requiere2' value='".$requiere2."' checked>Si <input type='radio' name='requiere2' id='requiere' value='NO'>NO </td></tr>";
  							 }
  							 if ($requiere2 == 'NO') {
  							 	# code...
  							 	echo "<td><input type='radio' name='requiere2' value='SI'>Si <input type='radio' name='requiere2'  id='requiere' value='".$requiere2."' checked>NO </td></tr>";

  							 }
  							 if ($requiere2 == '') {
  							 	# code...
   							 	echo "<td><input type='radio' name='requiere2' value='SI'>Si <input type='radio' name='requiere2' id='requiere' value='NO'>NO </td></tr>";
 							 	
  							 }
						echo"</tr></table></fieldset>";
						echo"<input type='text' name='id_trabajo' value='".$id_trabajo."' style='visibility:hidden;'>";
						

							 
					}		 
		
	mysql_close();
?>
	<input type="submit" name="enviar" value="enviar" id='registro2'>
</form>
<form action="registro_trabajos.php" method="post">
		<input type="submit" name="Cancelar" value="Cancelar">
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