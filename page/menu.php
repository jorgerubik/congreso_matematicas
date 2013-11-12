		<form action="registro_trabajos.php" method="post" autocomplete="off" class="forms">	
			<FIELDSET id="login">
				<LEGEND class="font_titulos">Acceso a usuarios registrados</LEGEND>
				<legend class="font_titulos">Usuario:</legend>
				<input type="text" id="usuario" name="user"  maxlength="16" size="16" >
				<legend class="font_titulos">Contraseña:</legend>
				<input type="password" id="Password" maxlength="16" size="16" name="pass"><br>
				<input type="submit" name="Ingresar" value="Ingresar" id="Ingresar"><br>
				<a href="registro_general.php">Regístrese aquí</a>
		</FIELDSET>
		</form>		
		<ul id="menu" class="font_titulos">
			<li><a href="index.php"><b>Inicio</b></a></li>
			<li><a href="convocatoria.php"><b>Convocatoria</b></a></li>			
			<li><a href="conferencias_magistrales.php"><b>Conferencias magistrales</b></a></li>
			<li><b>Organizaci&oacute;n del evento</b>
				<ul class="submenu">
					<li><a href="comite_organizador.php">Comit&eacute; organizador</a></li>
					<li><a href="comite_evaluador.php">Comit&eacute; evaluador</a></li>
					<li><a href="programa_general.php">Programa General</a></li>
					<li><a href="#">Programa espec&iacute;fico</a></li>
				</ul>
			</li>
			<li><b>Instrucciones</b>
				<ul class="submenu">
					<li><a href="instrucciones_ponencia.php">Registro ponencias orales y cartel</a></li>
					<!-- <li><a href="instrucciones_cartel.php">Registro cartel</a></li> -->
					<li><a href="instrucciones_curso.php">Registro curso o taller</a></li>
				</ul>
			</li>	
			<li><b>Inscripciones</b>
				<ul class="submenu">
					<li><a href="costos.php">Costos</a></li>
					<li><a href="registro_general.php">Registro</a></li>
				</ul>
			</li>
			
			<li><a href="login.php"><b>Registro de trabajos</b></a></li>
			<li><a href="presentacion_trabajos.php"><b>Presentaci&oacute;n de trabajos</b></a></li>
		</ul>
	