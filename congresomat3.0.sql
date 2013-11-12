--
--						#####################		NOTAS		#####################
--
--
--

USE congresomat;




####################################################################################
####################################################################################
##############                   PRINCIPIO CATALOGOS                 ###############
####################################################################################
####################################################################################

# Catálogo países
# VER OPCIONES CATÁLOGOS PREDEFINIDOS
# 
-- CREATE TABLE paises (
-- 	id_pais 	VARCHAR(4) 	NOT NULL,
-- 	nombre_pais VARCHAR(40) NOT NULL,

-- 	PRIMARY KEY (id_pais)
-- ) ENGINE = InnoDB;

-- # Catálogo de estados (de países)
-- # VER OPCIONES CATALOGOS PREDEFINIDOS
-- #
-- CREATE TABLE estados (
-- 	id_estado		VARCHAR(5)	NOT NULL,
-- 	id_pais			VARCHAR(4)	NOT NULL,
-- 	nombre_estado	VARCHAR(30) NOT NULL,

-- 	PRIMARY KEY (id_estado),

-- 	-- FOREIGN KEY (id_pais)
-- 	-- 	REFERENCES paises(id_pais)
-- ) ENGINE = InnoDB;

-- # Catálogo de grados acadámicos
-- #
-- CREATE TABLE grados_academicos (
-- 	id_grado 	VARCHAR(4) 	NOT NULL,
-- 	descripcion VARCHAR(30) NOT NULL,

-- 	PRIMARY KEY (id_grado)
-- ) ENGINE = InnoDB;

-- # Catálogo de Instituciones
-- #
-- CREATE TABLE instituciones (
-- 	id_institucion 		VARCHAR(5) 	NOT NULL,
-- 	nombre_institucion 	VARCHAR(70) NOT NULL,
-- 	id_pais 			VARCHAR(4) 	NOT NULL,

-- 	PRIMARY KEY (id_institucion),

-- 	FOREIGN KEY (id_pais)
-- 		REFERENCES paises(id_pais)
-- ) ENGINE = InnoDB;

-- # Catálogo de sedes/campus (de Instituciones)
-- #
-- CREATE TABLE campus (
-- 	id_campus		VARCHAR(5)	NOT NULL,
-- 	nombre_campus	VARCHAR(70) NOT NULL,
-- 	id_institucion	VARCHAR(5)	NOT NULL,
-- 	id_estado		VARCHAR(5)	NOT NULL,

-- 	PRIMARY KEY (id_campus),

-- 	FOREIGN KEY (id_institucion)
-- 		REFERENCES instituciones(id_institucion),
-- 	FOREIGN KEY (id_estado) 
-- 		REFERENCES estados(id_estado)
-- ) ENGINE = InnoDB;

# Catalogo de tipos de congresista
#
CREATE TABLE tipos_congresista (
	id_tipo_congresista	VARCHAR(5),
	descripcion			VARCHAR(25),

	PRIMARY KEY(id_tipo_congresista)
) ENGINE = InnoDB;

# Catálogo de pagos para cada tipo de congresista
#
CREATE TABLE tipos_pago (
	id_tipo_pago		VARCHAR(3),
	id_tipo_congresista	VARCHAR(5),
	fecha_pago_inicio	DATE,
	fecha_pago_fin		DATE,
	costo				VARCHAR(8),

	PRIMARY KEY (id_tipo_pago)
) ENGINE = InnoDB;

# Catálogo de categorías para ponencia oral y cartel (investigación o experiencia en aula)
#
CREATE TABLE categorias (
	id_categoria	VARCHAR(3),
	descripcion		VARCHAR(25),

	PRIMARY KEY (id_categoria)
) ENGINE = InnoDB;

# Catálogo de áreas para ponencia oral y cartel (enseñanza o aplicación de las matemáticas)
#
CREATE TABLE areas (
	id_area		VARCHAR(3),
	descripcion	VARCHAR(35),

	PRIMARY KEY (id_area)
) ENGINE = InnoDB;

# Catálogo de modalidades de cada area
#
CREATE TABLE modalidades (
	id_modalidad	VARCHAR(3),
	descripcion		VARCHAR(50),
	id_area			VARCHAR(3),

	PRIMARY KEY (id_modalidad)
	
) ENGINE = InnoDB;

# Catálogo de las actividades y las fechas correspondientes
#
CREATE TABLE calendario (
	actividad		VARCHAR(10),
	fecha_inicio	DATE,
	fecha_fin		DATE,
	hora_inicio		TIME,
	hora_fin		TIME
) ENGINE = InnoDB;

# Catálogo de los roles de los usuarios
#
CREATE TABLE roles (
	id_rol		VARCHAR(3),
	descripcion VARCHAR(15),
	activo		VARCHAR(2),
	
	PRIMARY KEY (id_rol)
) ENGINE = InnoDB;

####################################################################################
####################################################################################
#################                   FIN CATALOGOS                 ##################
####################################################################################
####################################################################################





# Datos de registro de grupos
#
CREATE TABLE grupos (
	id_grupo				VARCHAR(4),
	id_institucion			VARCHAR(5),
	cantidad_miembros_grupo	SMALLINT,

	PRIMARY KEY (id_grupo)
	) ENGINE = InnoDB;

# Datos de registro de usuarios
#
CREATE TABLE usuarios (
	id_usuario 			VARCHAR(15),
	RFC 				VARCHAR(13),
	contrasena 			VARCHAR(16),
	nombre_usuario		VARCHAR(40),
	apellido_paterno	VARCHAR(25),
	apellido_materno	VARCHAR(25),
	email 				VARCHAR(50),
	fecha_registro		DATETIME,

	PRIMARY KEY (id_usuario)
) ENGINE = InnoDB;


# Trayectoria academica de usuarios
#
CREATE TABLE trayectoria_academica (
	id_usuario		VARCHAR(15),
	id_grado		VARCHAR(20),

	PRIMARY KEY (id_usuario)
) ENGINE = InnoDB;

# Trayectoria laboral de usuarios
#
CREATE TABLE trayectoria_laboral (
	id_usuario		VARCHAR(15),
	id_institucion	VARCHAR(80),
	id_pais 		VARCHAR(20),
	id_estado		VARCHAR(50),

	PRIMARY KEY (id_usuario)
) ENGINE = InnoDB;

# Tabla para distinguir que tipo de congresista es cada usuario (un usuario puede ser mas de un tipo)
#
-- CREATE TABLE inscripcion_congresistas (
-- 	id_usuario			VARCHAR(15),
-- 	id_tipo_congresista VARCHAR(3),

-- 	PRIMARY KEY (id_usuario, id_tipo_congresista)
-- ) ENGINE = InnoDB;

-- # Registro de pagos de congresistas
-- #
-- CREATE TABLE pagos (
-- 	id_usuario			VARCHAR(15),
-- 	id_tipo_pago		VARCHAR(3),
--     pago_aprobado		BIT,

--     PRIMARY KEY (id_usuario)
-- ) ENGINE = InnoDB;

-- # Tabla donde se almacenarán las imágenes de los comprobantes de pago que los congresistas envíen
-- #
-- CREATE TABLE comprobantes_pago (
-- 	folio_comprobante	INT			 AUTO_INCREMENT,
-- 	id_usuario			VARCHAR(15),
-- 	imagen_comprobante	MEDIUMBLOB,
-- 	formato_comprobante	VARCHAR(10),

-- 	PRIMARY KEY (folio_comprobante)
-- ) ENGINE = InnoDB;



################################################################
# 			TABLAS PARA REGISTRO DE PONENCIAS INICIO           #
################################################################

# Registro de resumenes y extensos las ponencias orales
#
CREATE TABLE ponencias_oral (
	id_ponencia_oral	 VARCHAR(15),
	RFC			VARCHAR(13),
	id_categoria		 VARCHAR(15),
	id_modalidad		 VARCHAR(3),
	titulo_oral			 TEXT,
	resumen_oral		 TEXT,
	referencias_oral	 TEXT,
	aceptado_oral		 BIT/*BOOL*/,
	extenso_oral		 MEDIUMBLOB,
	formato_extenso_oral VARCHAR(10),
	num_registro		 INT,

	PRIMARY KEY (id_ponencia_oral)
) ENGINE = InnoDB;

# Registro de resumenes y carteles para las ponencias de cartel
#
CREATE TABLE ponencias_cartel (
	id_ponencia_cartel	 	VARCHAR(15),
	RFC			VARCHAR(13),
	id_categoria		 	VARCHAR(15),
	id_modalidad		 	VARCHAR(3),
	titulo_cartel			TEXT,
	resumen_cartel		 	TEXT,
	referencias_cartel	 	TEXT,
	aceptado_cartel		 	BIT/*BOOL*/,
	archivo_cartel		    MEDIUMBLOB,
	formato_archivo_cartel	VARCHAR(10),
	lugar_cartel			VARCHAR(30),
	fecha_cartel			DATE,
	num_registro			INT,

	PRIMARY KEY (id_ponencia_cartel)
) ENGINE = InnoDB;

# Registro de talleres (material solicitado, fecha, hora y lugar del taller)
#
CREATE TABLE ponencias_taller (
	id_ponencia_taller	VARCHAR(15),
	RFC			VARCHAR(13),
	titulo_taller		TEXT,
 -- contenido_taller			 
	resumen_taller		TEXT,
	referencias_taller	TEXT,
	aceptado_taller		BIT,
	material_taller		TEXT,
	fecha_taller_ini	DATE,
	fecha_taller_fin	DATE,
	hora_taller_ini		TIME,
	hora_taller_fin		TIME,
	edificio_taller		VARCHAR(4),
	num_registro		INT,

	PRIMARY KEY (id_ponencia_taller)
) ENGINE = InnoDB;

# Registro de cursos (material solicitado, fecha, hora y lugar del taller)
#
CREATE TABLE ponencias_curso (
	id_ponencia_curso	VARCHAR(15),
	RFC			VARCHAR(13),
	titulo_curso		TEXT,
 -- contenido_curso			 
	resumen_curso		TEXT,
	referencias_curso	TEXT,
	aceptado_curso		BIT,
	material_curso		TEXT,
	fecha_curso_ini		DATE,
	fecha_curso_fin		DATE,
	hora_curso_ini		TIME,
	hora_curso_fin		TIME,
	edificio_curso		VARCHAR(4),
	num_registro		 INT,

	PRIMARY KEY (id_ponencia_curso)
) ENGINE = InnoDB;




################################################################
# 			TABLAS PARA REGISTRO DE PONENCIAS FINAL            #
################################################################

# Tabla para la idendificación de los autores de cada ponencia
#
CREATE TABLE autores (
	RFC 	VARCHAR(13),
	tipo_autor VARCHAR(15),
	id_tipo_congresista	VARCHAR(5),
	id_trabajo VARCHAR(15),
	constancia VARCHAR(2),
	
	PRIMARY KEY (RFC, id_trabajo)
) ENGINE = InnoDB;




################################################################
#     	       TABLA PARA ADMINISTRAR USUARIOS                 #
################################################################

# Tabla para controlar los permisos de los usuarios
#
CREATE TABLE usuario_rol(
	id_usuario VARCHAR(15),
	id_rol VARCHAR(3),
	
	PRIMARY KEY (id_usuario, id_rol)
) ENGINE = InnoDB;
