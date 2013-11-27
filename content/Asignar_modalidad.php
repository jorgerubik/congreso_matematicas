<form action="registro_evaluadores.php" method="post" autocomple	pte="off">
	<fieldset>
		<legend>Seleccione las modalidades que el evaluador podrá calificar:</legend>
		<h3>ENSEÑANZA DE LAS MATEMÁTICAS</h3>
		<input type="checkbox" name="modalidad[]" value="AC" id="AC">Aprendizaje cooperativo (AC)<br>
		<input type="checkbox" name="modalidad[]" value="ID" id="ID">Innovaci&oacute;n didáctica y metodológica (ID)<br>
		<input type="checkbox" name="modalidad[]" value="EA" id="EA">Entorno al aprendizaje (EA)<br>
		<input type="checkbox" name="modalidad[]" value="HM" id="HM">Historia (HM)<br> 
		<input type="checkbox" name="modalidad[]" value="RP" id="RP">Resolución de problemas y habilidades (RP)<br>
		<input type="checkbox" name="modalidad[]" value="UT" id="UT">Uso de las TICs (UT)<br>
		<input type="checkbox" name="modalidad[]" value="ED" id="ED">Experiencias docentes (ED)<br>
		<input type="checkbox" name="modalidad[]" value="EM" id="EM">Enseñando con manipulables (EM)<br>
		<h3>APLICACIÓN DE LAS MATEMÁTICAS</h3>
		<input type="checkbox" name="modalidad[]" value="PN" id="PN">Pensamiento numérico y simbólico (PN)<br>
		<input type="checkbox" name="modalidad[]" value="AE" id="AE">Análisis estadístico y diseño de experimentos (AE)<br>
		<input type="checkbox" name="modalidad[]" value="MS" id="MS">Modelación y simulación (MS)<br>
		<input type="checkbox" name="modalidad[]" value="OP" id="OP">Optimización (OP)<br>
		<input type="checkbox" name="modalidad[]" value="VD" id="VD">Vinculación con otras disciplinas (VD)<br>
		<h3>TALLER O CURSO</h3>
		<input type="checkbox" name="modalidad[]" value="TA" id="TA">Taller<br>
		<input type="checkbox" name="modalidad[]" value="CU" id="CURSO">Curso<br>
	</fieldset>
	<?php
		echo "<input type='text' id='id_usuario' name='id_usuario' style='visibility:hidden;' value='".$_POST['id_usuario']."' >";
	?>
	<br><input type = "submit" id="enviar" name="enviar" values="Enviar">
</form>