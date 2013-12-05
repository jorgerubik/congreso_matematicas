<?
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

	// function exe_query($query){
		
	// 	$r = mysql_query($query);
	// 	if (!$r) {
	// 		echo "No se ejecutó el query: $query <br>";
	// 		trigger_error(mysql_error(), E_USER_ERROR);
	// 	}
	// 	return $r;
		
	// }

	$id_usuario = $_POST['id_usuario'];
 
    $modalidad=$_POST["modalidad"];
    $count = count($modalidad);
    for ($i = 0; $i < $count; $i++) {
        if ($modalidad[$i] == 'AC') {
			$AC = 1;
		}
		if ($modalidad[$i] == 'ID') {
			$ID = 1;
		}
		if ($modalidad[$i] == 'EA') {
			$EA = 1;
		}
		if ($modalidad[$i] == 'HM') {
			$HM = 1;
		}
		if ($modalidad[$i] == 'RP') {
			$RP = 1;
		}
		if ($modalidad[$i] == 'UT') {
			$UT = 1;
		}
		if ($modalidad[$i] == 'ED') {
			$ED = 1;
		}
		if ($modalidad[$i] == 'EM') {
			$EM = 1;
		}
		if ($modalidad[$i] == 'PN') {
			$PN = 1;
		}
		if ($modalidad[$i] == 'AE') {
			$AE = 1;
		}
		if ($modalidad[$i] == 'MS') {
			$MS = 1;
		}
		if ($modalidad[$i] == 'OP') {
			$OP = 1;
		}
		if ($modalidad[$i] == 'VD') {
			$VD = 1;
		}
		if ($modalidad[$i] == 'TA') {
			$TA = 1;
		}
		if ($modalidad[$i] == 'CU') {
			$CU = 1;
		}
        echo "<br/>";
        $query_verifica = "SELECT COUNT(*) FROM modalidad_evaluador WHERE id_usuario = '".$id_usuario."' AND id_modalidad = '".$modalidad[$i]."'";
        $r_verifica = mysql_query($query_verifica);
        if(!$r_verifica){
			echo "No se pudo ejecutar el query: $query_verifica";
			echo "<br>";
			trigger_error(mysql_error(), E_USER_ERROR);
		}
		else {
			$row_verifica = mysql_fetch_assoc($r_verifica);
			if ($row_verifica['COUNT(*)']==0) {
				$query = "INSERT INTO modalidad_evaluador VALUES ('".$id_usuario."','".$modalidad[$i]."') ";
        		$r = mysql_query($query);
        		if(!$r){
					echo "No se pudo ejecutar el query: $query";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
				}
				else{
						
				}
			}
		}
        
    }

    if ($AC) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'AC' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}
	}
	if ($ID) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'ID' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}
	if ($EA) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'EA' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}
	if ($HM) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'HM' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}
	if ($RP) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'RP' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}
	if ($UT) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'UT' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}	
	if ($ED) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'ED' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}	
	if ($EM) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'EM' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}
	if ($PN) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'PN' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}
	if ($AE) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'AE' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}
	if ($MS) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'MS' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}	
	if ($OP) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'OP' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}	
	if ($VD) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'VD' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}
	if ($TA) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'TA' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}
	if ($CU) {
	}
	else{
		$query_delete = "DELETE FROM modalidad_evaluador WHERE id_modalidad = 'CU' AND id_usuario = '".$id_usuario."'";
		$r_delete = mysql_query($query_delete);
		if(!$r_delete){
					echo "No se pudo ejecutar el query: $query_delete";
					echo "<br>";
					trigger_error(mysql_error(), E_USER_ERROR);
					$error = 1;
		}		
	}

	if (!$error) {
		echo "<br>Las modalidades del evaluador se han actualizado satisfactoriamente.<br>";
	}



	mysql_close();
?>

<script>
	function back(){
		window.location.href = 'editar_evaluadores.php'
	}
	function back1(){
		window.location.href = 'registro_trabajos.php'
	}
</script>
<br>
<input type='button' name='regresar_edicion' value='Regresar a la edici&oacute;n de evaluadores' onClick='back()'>
<input type='button' name='regresar_principal' value='Regresar al men&uacute; principal' onClick='back1()'>