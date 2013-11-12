<?php

$result  = mysql_query("SELECT email, RFC FROM usuarios WHERE RFC = '$rfc_autor';", $conn);
 if ($row = mysql_fetch_array($result)){ 
                    do {     
                        $email = $row["email"];
                        $nombre=$row["nombre_usuario"];
                        $rfc_1=$row["RFC"];
                        } while ($row = mysql_fetch_array($result));
                    }

$result1  = mysql_query("SELECT email FROM usuarios WHERE RFC = '$rfc_coautor1';", $conn);
 if ($row = mysql_fetch_array($result1)){ 
                    do {     
                        $email1 = $row["email"];
                        $nombre1=$row["nombre_usuario"];
                        } while ($row = mysql_fetch_array($result1));
                    }else{
                      $rfc_coautor1='';
                    }
$result2  = mysql_query("SELECT email FROM usuarios WHERE RFC = '$rfc_coautor2';", $conn);
 if ($row = mysql_fetch_array($result2)){ 
                    do {     
                        $email2 = $row["email"];
                        $nombre2=$row["nombre_usuario"];
                        } while ($row = mysql_fetch_array($result2));
                         }else{
                      $rfc_coautor2='';
                    }
$result3  = mysql_query("SELECT email FROM usuarios WHERE RFC = '$rfc_coautor3';", $conn);
 if ($row = mysql_fetch_array($result3)){ 
                    do {     
                        $email3 = $row["email"];
                        $nombre3=$row["nombre_usuario"];
                        } while ($row = mysql_fetch_array($result3));
                         }else{
                      $rfc_coautor3='';
                    }
 $result4  = mysql_query("SELECT email FROM usuarios WHERE RFC = '$rfc_coautor4';", $conn);
 if ($row = mysql_fetch_array($result4)){ 
                    do {     
                        $email4 = $row["email"];
                        $nombre4=$row["nombre_usuario"];
                        } while ($row = mysql_fetch_array($result4));
                         }else{
                      $rfc_coautor4='';
                    }
                
if($email1==''){
  $rfc_coautor1='';
}
if($email2==''){
  $rfc_coautor2='';
}
if($email3==''){
  $rfc_coautor3='';
}
if($email4==''){
  $rfc_coautor4='';
}




include("class.phpmailer.php");
include("class.smtp.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "congresomate6@gmail.com"; //ness.reaper@gmail.com
$mail->Password = "chiquitamia"; //ask514ion497




$mail->From = "congresomate6@gmail.com";
$mail->FromName = "Congreso Matematicas";
$mail->Subject = "Se ha registrado un trabajo.";
if ($email1 == '' && $email2 == '' && $email3 == '' && $email4 == ''){
  $mail->MsgHTML('<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<style>
body {
  margin: 0px; }
.maintable {
  width: 600px;
  border-top: 1px solid gray;
  border-left: 1px solid gray;
  border-right: 1px solid gray;  }
.text {
  color: #777676;  
  font-family: Times-Rom;
  font-size: 14px; }
.padding {
  padding-left: 20px; }
.bottom {
  background-color: #464645;
  height: 31px; }
</style>
<body>
  <center>
    <table class="maintable" cellspacing="0" cellpadding="0">
        <td class="content text" colspan="2"></td></tr>  
      <img src="c.png">
      <br></br><br></br>
        <td class="nomail">              
          <table width="100%" cellspacing="0" cellpadding="0">
            <font color="black">
              <td class="upbottom">
                <table width="100%" cellpadding="0" cellspacing="0">
                  <font color="black">
                    <td class="text padding"></td>
                    <td class="text padding"><br>
            <font color="#4000FF"> <h3>El siguiente trabajo se ha registrado:'.$titulo.' </h3></font><br>
          <font color="black"><h3>Por el usuario : '.$rfc_1.'</h3></font>
          <font color="black"><h3> Categor&iacute;a: '.$categoria.'</h3></font>
          <font color="black"><h3>Clave del cartel: '.$codigo_cartel.'</h3></font>
        <font color="black"><h3> No se han registrado coautores en el trabajo, podr&aacute; registrarlos posteriormente
         en el apartado de<br>edici&oacute;n de trabajos, dentro de Editar Perfil</h3></font><br>
         <font color="black"><h3>Nota: por favor no olviden estar atentos a las fechas de revisi&oacute;n de trabajos y env&iacute;o de resultados. Los res&uacute;menes registrados podr&aacute;n ser editados hasta el d&iacute;a 29 de Noviembre de 2013.</h3></font><br><br>
                    </td></tr>                 
                    </table></td></tr>
              <td class="bottom">&nbsp;</td></tr>
          </table>
      </center>      
</body>
</html>');
}  

else{      
$mail->MsgHTML('<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<style>
body {
  margin: 0px; }
.maintable {
  width: 600px;
  border-top: 1px solid gray;
  border-left: 1px solid gray;
  border-right: 1px solid gray;  }
.text {
  color: #777676;  
  font-family: Times-Rom;
  font-size: 14px; }
.padding {
  padding-left: 20px; }
.bottom {
  background-color: #464645;
  height: 31px; }
</style>
<body>
  <center>
    <table class="maintable" cellspacing="0" cellpadding="0">
        <td class="content text" colspan="2"></td></tr>  
      <img src="c.png">
      <br></br><br></br>
        <td class="nomail">              
          <table width="100%" cellspacing="0" cellpadding="0">
            <font color="black">
              <td class="upbottom">
                <table width="100%" cellpadding="0" cellspacing="0">
                  <font color="black">
                    <td class="text padding"></td>
                    <td class="text padding"><br>
            <font color="#4000FF"> <h3>El siguiente trabajo se ha registrado:'.$titulo.' </h3></font><br>
          <font color="black"><h3>Por el usuario : '.$rfc_1.'</h3></font>
          <font color="black"><h3> Categor&iacute;a: '.$categoria.'</h3></font>
          <font color="black"><h3>Clave del cartel: '.$codigo_cartel.'</h3></font>
        <font color="black"><h3> Sus coautores: </h3></font>
      '.$rfc_coautor1.'
          <br></br>
      '.$rfc_coautor2.'
          <br></br>
      '.$rfc_coautor3.'
          <br></br>
      '.$rfc_coautor4.'
          <br>
        <font color="black"><h3>Nota: por favor no olviden estar atentos a las fechas de revisi&oacute;n de trabajos y env&iacute;o de resultados. Los res&uacute;menes registrados podrán ser editados hasta el día 29 de Noviembre de 2013.</h3></font><br><br>
                    </td></tr>                 
                    </table></td></tr>
              <td class="bottom">&nbsp;</td></tr>
          </table>
      </center>      
</body>
</html>');
}

$mail->AddAddress(''.$email,''.$email);
$mail->IsHTML(true);


if($email1!=''){
$mail->AddAddress(''.$email1,''.$email1);
$mail->IsHTML(true);
}

if($email2!=''){
$mail->AddAddress(''.$email2,''.$email2);
$mail->IsHTML(true);
}

if($email3!=''){
$mail->AddAddress(''.$email3,''.$email3);
$mail->IsHTML(true);
}

if($email4!=''){
$mail->AddAddress(''.$email4,''.$email4);
$mail->IsHTML(true);
}


if(!$mail->Send()) {
  echo "No fue posible enviar el correo, pero su
trabajo se registró exitosamente";
} else {
  echo "Se ha enviado un correo electrónico con la información del trabajo registrado al autor y coautores correspondientes.<br>";
}


?>
