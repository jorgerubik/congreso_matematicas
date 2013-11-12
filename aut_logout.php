<?
//  Autentificator
//  Gestión de Usuarios PHP+Mysql+sesiones
//  by Pedro Noves V. (Cluster)
//  clus@hotpop.com
// -----------------------------------------

// Cargamos variables
require ("aut_config.inc.php");
// le damos un mobre a la sesion (por si quisieramos identificarla)
session_name($usuarios_sesion);
// iniciamos sesiones
session_start();
// destruimos la session de usuarios.
session_destroy();
header('Location: index.php');
?>
<html>
<head>
<title>Area de Administración de http://www.tupagina.tal - Salir!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
Chaoo!, que tenga un buen dia.
<a href="login.php">Inicio</a>
</body>
</html>
