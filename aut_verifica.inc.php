<?
//  Autentificator
//  Gestión de Usuarios PHP+Mysql+sesiones
//  by Pedro Noves V. (Cluster)
//  clus@hotpop.com
//  v1.0  - 17/04/2002 Versión inicial.
//  v1.01 - 24/04/2002 Solucionado error sintactico en aut_verifica.inc.php.
//  v1.05 - 17/05/2002 Optimización código aut_verifia.inc.php
//  v1.06 - 03/06/2002 Corrección de errores de la versión 1.05 y error con navegadores Netscape
//  v2.00 - 18/08/2002 Optimización código + Seguridad.
//                     Ahora funciona con la directiva registre_globals= OFF. (PHP > 4.1.x)
//                     Optimización Tablas SQL. (rangos de tipos).
//  v2.01 - 16/10/2002 Solucionado "despistes" de la versión 2.00 de Autentificator
//                     en aut_verifica.inc.php y aut_gestion_usuarios.php que ocasinavan errores al trabajar
//                     con la directiva registre_globals= OFF.
//                     Solucionado error definición nombre de la sessión.
//
// Descripción:
// Gestión de Páginas restringidas a Usuarios, con nivel de acceso
// y gestión de errores en el Login
// + administración de usuarios (altas/bajas/modificaciones)
//
// Licencia GPL con estas extensiones:
// - Uselo con el fin que quiera (personal o lucrativo).
// - Si encuentra el código de utilidad y lo usas, mandeme un mail si lo desea.
// - Si mejora el código o encuentra errores, hagamelo saber el mail indicado.
//
// Instalación y uso del Gestor de usuarios en:
// documentacion.htm
//  ----------------------------------------------------------------------------


// Motor autentificación usuarios.

// Cargar datos conexion y otras variables.
require ("aut_config.inc.php");


// chequear página que lo llama para devolver errores a dicha página.

$url = explode("?",$_SERVER['HTTP_REFERER']);
$pag_referida=$url[0];
$redir=$pag_referida;
// chequear si se llama directo al script.
if ($_SERVER['HTTP_REFERER'] == ""){
die ("Error cod.:1 - Acceso incorrecto!");
exit;
}


// Chequeamos si se está autentificandose un usuario por medio del formulario
if (isset($_POST['user']) && isset($_POST['pass'])) {

// Conexión base de datos.
// si no se puede conectar a la BD salimos del scrip con error 0 y
// redireccionamos a la pagina de error.
$db_conexion= mysql_connect("$sql_host", "$sql_usuario", "$sql_pass") or die(header ("Location:  $redir?error_login=0"));
mysql_select_db("$sql_db");
mysql_query("SET NAMES utf8");
// realizamos la consulta a la BD para chequear datos del Usuario.
$usuario_consulta = mysql_query("SELECT id_usuario,nombre_usuario,contrasena FROM $sql_tabla WHERE id_usuario='".$_POST['user']."'") or die(header ("Location:  $redir?error_login=1"));
//-------realizo la consulta para el rol-------------
$usuario_consulta2 = mysql_query("SELECT id_rol FROM usuario_rol WHERE id_usuario='".$_POST['user']."'") or die(header ("Location:  $redir?error_login=1"));
 // miramos el total de resultado de la consulta (si es distinto de 0 es que existe el usuario)
 if (mysql_num_rows($usuario_consulta) != 0) {

    // eliminamos barras invertidas y dobles en sencillas
    $login = stripslashes($_POST['user']);
    // encriptamos el password en formato md5 irreversible.
    $password = ($_POST['pass']);

    // almacenamos datos del Usuario en un array para empezar a chequear.
 	$usuario_datos = mysql_fetch_array($usuario_consulta);
    $usuario_datos2 = mysql_fetch_array($usuario_consulta2);
    // liberamos la memoria usada por la consulta, ya que tenemos estos datos en el Array.
    mysql_free_result($usuario_consulta);
    // cerramos la Base de dtos.
    mysql_close($db_conexion);
    
    // chequeamos el nombre del usuario otra vez contrastandolo con la BD
    // esta vez sin barras invertidas, etc ...
    // si no es correcto, salimos del script con error 4 y redireccionamos a la
    // página de error.
    if ($login != $usuario_datos['id_usuario']) {
        echo"<script>alert('Usuario erroneo');";
        echo"document.location=('login.php');</script>";
		exit;}

    // si el password no es correcto ..
    // salimos del script con error 3 y redireccinamos hacia la página de error
    if ($password != $usuario_datos['contrasena']) {
        echo "<script>alert('Contrase\u00f1a incorrecta');";
        echo "document.location=('login.php');</script>";
	    exit;}

    // Paranoia: destruimos las variables login y password usadas
    unset($login);
    unset ($password);

    // En este punto, el usuario ya esta validado.
    // Grabamos los datos del usuario en una sesion.
    
     // le damos un mobre a la sesion.
    session_name($usuarios_sesion);
     // incia sessiones
    session_start();

    // Paranoia: decimos al navegador que no "cachee" esta página.
    session_cache_limiter('nocache,private');
    
    // Asignamos variables de sesión con datos del Usuario para el uso en el
    // resto de páginas autentificadas.

    // definimos usuarios_id como IDentificador del usuario en nuestra BD de usuarios
    $_SESSION['usuario_id']=$usuario_datos['id_usuario'];
    
    // definimos usuario_nivel con el Nivel de acceso del usuario de nuestra BD de usuarios
    $_SESSION['usuario_nivel']=$usuario_datos2['id_rol'];
    
    //definimos usuario_nivel con el Nivel de acceso del usuario de nuestra BD de usuarios
    $_SESSION['usuario_login']=$usuario_datos['nombre_usuario'];

    //definimos usuario_password con el password del usuario de la sesión actual (formato md5 encriptado)
    $_SESSION['usuario_password']=$usuario_datos['contrasena'];


    // Hacemos una llamada a si mismo (scritp) para que queden disponibles
    // las variables de session en el array asociado $HTTP_...
    $pag=$_SERVER['PHP_SELF'];
    Header ("Location: $pag?");
    exit;
    
   } else if (mysql_num_rows($usuario_consulta) == 0){
      // si no esta el nombre de usuario en la BD o el password ..
      // se devuelve a pagina q lo llamo con error
      echo"<script>alert('Usuario incorrecto');";
      echo"document.location=('login.php');</script>";
      
      exit;}
} else {

// -------- Chequear sesión existe -------

// usamos la sesion de nombre definido.
session_name($usuarios_sesion);
// Iniciamos el uso de sesiones
session_start();

// Chequeamos si estan creadas las variables de sesión de identificación del usuario,
// El caso mas comun es el de una vez "matado" la sesion se intenta volver hacia atras
// con el navegador.

if (!isset($_SESSION['usuario_login']) && !isset($_SESSION['usuario_password'])){
// Borramos la sesion creada por el inicio de session anterior
session_destroy();
die ("Por seguridad se ha cerrado su sesión, favor de iniciarla nuevamente ");
exit;
}
}
?>
