 <div class="cajatextoscroll">
	
	<form action="registro_ponencia_confirmacion.php" method="post" id="formulario" autocomplete="off" class="forms">
		<fieldset id="ponencia">
			<legend>Formulario de registro</legend>
			<legend>Título (máximo 15 palabras):</legend>
			<input type="text"  name="Titulo_ponencia" id="titulo_ponencia" onblur="wordCountd();" class="titulo_trabajo" required>
			<legend>Categoría:</legend>
			<input type="radio" name="Categoria" value="investigacion">Investigación <br>
			<input type="radio" name="Categoria" value="experiencia"> Experiencia en aula
		</fieldset>
		<fieldset>	
			<legend>Modalidad:</legend>
			
			<select id="ensenanza" name="modalidad">
				<option value="">Modalidad</option>
				<option value="">------------Enseñanza de las matemáticas------------</option>
				<option value="AC">Aprendizaje cooperativo (AC) </option>
				<option value="ID">Innovación didáctica y metodológica  (ID)</option>
				<option value="EA">Entorno al aprendizaje (EA)</option>
				<option value="HM">Historia (HM)</option>
				<option value="RP">Resolución de problemas y habilidades (RP)</option>
				<option value="UT">Uso de las TIC´s (UT) </option>
				<option value="ED">Experiencias docentes (ED)</option>
				<option value="EM">Enseñando con manipulables (EM)</option>
				<option value="PN">Pensamiento numérico y simbólico (PN)</option>
				<option value="">--------------Aplicación de las matemáticas--------------</option>
				<option value="AE">Análisis estadístico y diseño de experimentos (AE)</option>
				<option value="MS">Modelación y simulación (MS)</option>
				<option value="OP">Optimización (OP)</option>
				<option value="VD">Vinculación con otras disciplinas (VD)</option>
			</select>
		</fieldset>
		<fieldset>
			<legend>Resumen (máximo 300 palabras):</legend>
			<textarea rows="6" cols="50" name="Resumen" id="Contenido_area" required onblur="wordCount();" ></textarea>
		</fieldset>
		<fieldset>
			<legend>Referencias (máximo 30 palabras):</legend>
			<textarea row="6" cols="50" id="Contenido_area2" name="Referencias"  required onblur="wordCountc();"></textarea>
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
				<tr>
					<th>Coautor 3</th>
					<td><input type="text" id="id_ponente4" name="rfc_coautor3" maxlength="13"></td>
					<td><input type="radio" name="requiere3" id="requiere3" value="SI" >Si <input type="radio" name="requiere3" id="requiere3" value="NO">No</td>
				</tr>
				<tr>
					<th>Coautor 4</th>
					<td><input type="text" id="id_ponente5" name="rfc_coautor4" maxlength="13"></td>
					<td><input type="radio" name="requiere4" id="requiere4" value="SI" >Si <input type="radio" name="requiere4" id="requiere4" value="NO">No</td>
				</tr>
			</table>
			<input type="text" id="id_trabajo" name="id_ponencia" maxlength="10" size="10"  style="visibility:hidden;" />
		</fieldset>
		
		<input type="submit" name="enviar" value="enviar" id="registro" >
</form>
</div>
