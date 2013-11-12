

<form action="registro_taller_confirmacion.php" method="post" autocomplete="off" class="forms" id="formulario">
	<fieldset id="ponencia">
		<legend>Formulario de registro</legend>
		<legend>Título (máximo 15 palabras):</legend>
		<input type="text"  id="titulo_taller" name="titulo_taller" onblur="wordCountg();" class="titulo_trabajo" required>
	</fieldset>
	<fieldset>
		<legend>Contenido (máximo 300 palabras):</legend>
		<textarea rows="6" id="Contenido_area" name="Contenido"  cols="70" required onblur="wordCount();"></textarea>
	</fieldset>
	<fieldset>
		<legend>Materiales (máximo 100 palabras):</legend>
		<textarea rows="4" cols="50" required name="materiales" id="Contenido_area1" name="Materiales" onblur="wordCountb();" ></textarea>
	</fieldset>
	<fieldset>
		<legend>Autores:</legend>
			<table border="1" id="autores">
				<tr>
					<th>Autor</th>
					<th>RFC</th>
					<th>Requiere constancia</th>
					
				</tr>
				<tr>
					<th>Autor</th>
					<td><input type="text" id="id_ponente1" name="rfc_autor" maxlength="13" required></td>
					<td><input type="radio" name="requiere" id="requiere" value="SI" >Si <input type="radio" name="requiere" id="requiere" value="NO">No</td>
				</tr>
				<tr>
					<th>Coautor 1</th>
					<td><input type="text" id="id_ponente2" name="rfc_coautor1" maxlength="13"></td>
					<td><input type="radio" name="requiere1" id="requiere1" value="SI">Si <input type="radio" name="requiere1" id="requiere1" value="NO">No</td>
					
				</tr>
				<tr>
					<th>Coautor 2</th>
					<td><input type="text" id="id_ponente3" name="rfc_coautor2" maxlength="13"></td>
					<td><input type="radio" name="requiere2" id="requiere2" value="SI" >Si <input type="radio" name="requiere2" id="requiere2" value="NO">No</td>
				</tr>
				
			</table>
	</fieldset>
	<input type="text" id="id_trabajo" name="id_taller" maxlength="10" size="10"  style="visibility:hidden;" />
	
	<input type="submit" name="enviar" value="enviar" id="registro2">
</form>
