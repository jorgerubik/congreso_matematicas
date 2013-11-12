<div class="cajatextoscroll">
<div class="cajatexto">	
	<h1 align="justify"> El registro de trabajos ser&aacute; liberado a partir del d&iacute;a 29 de Octubre del 2013</h1>

	<!-- <p>Acceso Autorizado:</p>
	Esto es una página con acceso restringido.<br> -->
	<!--Bienvenido: <? //echo session_name(); ?> <br>-->
	<!--Usuario ID (referencia) = <?// echo $_SESSION['usuario_id'] ?><br>-->
	<!--Bienvenido: <? //echo $_SESSION['usuario_login'] ?><br>-->
	<!--Usuario Nivel de Acceso => <? //echo $_SESSION['usuario_nivel'] ?><br-->
	<br>
	<fieldset>
		<legend>Asistente</legend>
		<legend>Si desea formar parte del Congreso como asistente, de click en la imagen para conocer los requerimientos con los que debe cumplir:</legend>
		<form action="registro_asistente.php" method="post" class="forms">
			<input type="image" src="imagenes/Asistente.png" id="boton">
		</form>
	</fieldset>
	<fieldset>

		<legend>Registro de trabajos</legend>
		 <!--?//if (0 >= $_SESSION['usuario_nivel']){ ?-->
		 
		<form action="registro_ponencia.php" method="post" autocomplete="off" class="forms">
			<input type="image" src="imagenes/Ponencia3.png" id="boton"> <br>
		</form>
		<form action="registro_cartel.php" method="post" autocomplete="off" class="forms">	
			<input type="image" src="imagenes/Cartel.png" id="boton"><br>
		</form>	
		<form action="registro_taller.php" method="post" autocomplete="off" class="forms"> 
			<input type="image" src="imagenes/Taller.png" id="boton"><br>
		</form>
		<form action="registro_curso.php" method="post" autocomplete="off"  class="forms">	
			<input type="image" src="imagenes/Curso.png" id="boton"><br>
		</form>
		<!--? } ?-->
	</fieldset>
	<?if(0 < $_SESSION['usuario_nivel']){ ?>
		<fieldset>
			<legend>Administrativo</legend>
			<?if ((4 == $_SESSION['usuario_nivel'])|| (5 == $_SESSION['usuario_nivel']) || (6 == $_SESSION['usuario_nivel']) || (7 == $_SESSION['usuario_nivel'])){ ?>
				<FORM action="asignar_roles.php" method="post" class="form">
					<button type="submit" name="Admistrador" id="boton1">Asignación de roles</button>
					<br>
				</FORM>
			<? } ?>
			<?if ( (1== $_SESSION['usuario_nivel']) || (3 == $_SESSION['usuario_nivel']) || (5 == $_SESSION['usuario_nivel']) || (7 == $_SESSION['usuario_nivel'])){ ?>
			<button type="submit" name="Comiterevisor" id="boton1">Comite revisor</button>
			<br>
			<? } ?>
			<?if ((3 == $_SESSION['usuario_nivel']) || (7 == $_SESSION['usuario_nivel']) || (2 == $_SESSION['usuario_nivel']) || (6 == $_SESSION['usuario_nivel'])){ ?>
			<button type="submit" name="comitevaluador" id="boton1">Comite evaluador</button>
			<!-- <button type="submit" name="comitevaluador" id="boton">Asignación de fechas</button>
			<button type="submit" name="comitevaluador" id="boton">Usuarios</button>
			<button type="submit" name="comitevaluador" id="boton">Informes</button> -->
			<br>
			<? } ?>
		</fieldset>
	<? } ?>
</div>
</div>


		