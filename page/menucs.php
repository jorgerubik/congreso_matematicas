		<FIELDSET>
			Bienvenido:<br> 
			<b> <? echo $_SESSION['usuario_login'] ?></b>
			<form action="perfil.php" method="post">
				<button type="submit" id="boton_u">Perfil</button>
			</form>
			<form action="editar_perfil.php" method="post">
				<button type="submit" id="boton_u">Editar Perfil</button>
			</form>

			<form action="aut_logout.php" method="post">
				<button type="submit" id="boton_u">Cerrar sesión</button>
			</form>
		</FIELDSET>

		<ul id="menu" class="font_titulos">
			<li><a href="indexsecure.php"><b>Inicio</b></a></li>
			<li><a href="conferencias_magistralesecure.php"><b>Conferencias magistrales</b></a></li>
			<li><b>Organizaci&oacute;n del evento</b>
				<ul class="submenu">
					<li><a href="comite_organizadorsecure.php">Comit&eacute; organizador</a></li>
					<li><a href="comite_evaluadorsecure.php">Comit&eacute; evaluador</a></li>
					<li><a href="programa_generalsecure.php">Programa General</a></li>
					<li><a href="#">Programa espec&iacute;fico</a></li>
				</ul>
			</li>
			<li><b>Instrucciones</b>
				<ul class="submenu">
					<li><a href="instrucciones_ponenciasecure.php">Registro ponencias orales y cartel</a></li>
					<!-- <li><a href="instrucciones_cartel.php">Registro cartel</a></li> -->
					<li><a href="instrucciones_cursosecure.php">Registro curso o taller</a></li>
				</ul>
			</li>	
			<li><b>Inscripciones</b>
				<ul class="submenu">
					<li><a href="costosecure.php">Costos</a></li>
					<li><a href="registro_generalsecure.php">Registro</a></li>
				</ul>
			</li>
			
			<li><a href="registro_trabajos.php"><b>Registro de trabajos</b></a></li>
			<li><a href="presentacion_trabajosecure.php"><b>Presentaci&oacute;n de trabajos</b></a></li>
		</ul>