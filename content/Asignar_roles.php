<!-- busca id de usuario en la tabla de roles para asignar un nuevo rol n.n -->
<form action="redirecciona_opcion.php" method="post" autocomplete="off">
	<fieldset>
		<legend>Movimientos a realizar</legend>
		<legend>Seleccione un movimiento a realizar</legend>
		<input type="radio" id="operacion" name="operacion" value="alta">Alta de rol de usuario <br>
		<input type="radio" id="operacion" name="operacion" value="baja">Baja de rol de usuario <br>
		<input type="radio" id="operacion" name="operacion" value="cambio">Cambio de rol de usuario <br>
		<input type="submit" id="enviar1" name="enviar1" value="enviar">
	</fieldset>
	<fieldset>
</form>
<form action="buscar.php" method="post" autocomplete="off">	
	<fieldset>	
		<legend>Buscar usuario y rol que poseé</legend>
		<legend>Introduzca id de usuario</legend>
		<input type="text" id="usuario" name="usuario" maxlenght="10"><br>
		<input type="submit" id="enviar" name="enviar" value="enviar">
	</fieldset>
</form>

<!-- <form action="buscar.php" method="post" autocomplete="off">
	<fieldset>
		<legend>Asignación de roles</legend>
		<legend>Introduzca id de usuario</legend>
		<input type="text" id="usuario" name="usuario" maxlenght="10">
		<input type="submit" name="enviar" value="buscar">
	</fieldset>
</form> -->
