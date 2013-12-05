<script>
	function editar(){
		window.location.href = 'editar_evaluadores.php'
	}
	function asignar(){
		window.location.href = 'asignar_evaluadores.php'
	}
</script>
<fieldset>
	<legend>Seleccione la opci&oacute;n que dese&eacute;:</legend>
	<input type='button' name='asignar' value='Asignar evaluadores' onClick='asignar()'><br>
	<input type='button' name='editar' value='Editar evaluadores' onClick='editar()'><br>
</fieldset>