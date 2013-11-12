<?php
$email= htmlspecialchars($_POST['Email']);

$variable1=htmlspecialchars($_POST['id_usuario']);
$variable2=$_POST['Password1'];
//utf8_decode($variable1); 

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
$mail->Subject = "Confirmacion de acceso.";
$mail->AltBody = "";
//$mail->MsgHTML("Hola, te doy mi nuevo numero<br><b>xxxx</b>.");
$mail->MsgHTML('<html>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8"/> 
<meta charset="UTF-8">
<style>
body {
  margin: 0px;
}
.maintable {
  width: 600px;
  border-left: 1px solid gray;
  border-right: 1px solid gray;  
}
.header {
 
  background-repeat: no-repeat;
  height: 152px;
}

.footer {
  background-image: url(images/footer.jpg);
  background-repeat: no-repeat;
  height: 283px;
  background-color: #d19f19;
}
.company {
  position: relative;
  font-size: 40px;
  font-family: Times-Rom;
  color: #FFFFFF;
  left: 24px;
  top: -25px;
  width: 300px;
}

.moto {
  position: relative;
  font-size: 20px;
  font-family: Times-Rom;
  color: #FFFFFF;
  left: 89px;
  top: -25px;
  width: 150px;  
}

.address {
  position: relative;
  font-size: 16px;
  font-family: Times-Rom;
  color: #6e6d6d;
  left: 20px;
  top: -70px;
  width: 180px;  
}

.fd {
  position: relative;
  font-size: 16px;
  font-family: Times-Rom;
  color: #6e6d6d;
  left: 380px;
  top: -20px;
  width: 180px;  
}

.bl {
  background-color: #464444;
  width: 25px; 
}
.br {
  background-image: url(images/border_right.jpg);
  background-repeat: repeat-y;
  width: 24px;
}

.title {
  color: #044582;  
  font-family: Times-Rom;
  font-size: 20px;
  font-weight: bold;
}

.text {
  color: #777676;  
  font-family: Times-Rom;
  font-size: 14px;
}

.padding {
  padding-left: 20px;
}

.content {
  padding-left: 20px;
  padding-right: 20px;  
}

.mail {
  width: 247px;
  height: 359px;
  background-repeat: no-repeat;  
}
.nomail {
  width: 353px;
}

.upbottom {
  height: 328px;
}

.bottom {
  background-color: #464645;
  height: 31px;
}
</style>

<body>
  <center>
    <td></td>
    <table class="maintable" cellspacing="0" cellpadding="0">
      <tr>
  <img src="c.png">
        <td colspan="2" background="images/c.png" class="header"> 
               
        </td>  
      </tr>    

     
      
      
      <tr>
        <td class="content text" colspan="2">              
         <font color="black"><h3>  </h3></font>
        </td>  
      </tr>  
      
      <tr>
        <td class="nomail">              
          <table width="100%" cellspacing="0" cellpadding="0">
            <font color="black">
              <td class="upbottom">
                <table width="100%" cellpadding="0" cellspacing="0">
                  <font color="black">
                    <td class="text padding">
                    </td>
                    <td class="text padding"><br>
       <font color="#4000FF"> <h3>Gracias por registrarse. </h3></font><br>
      

      <font color="black"><h3> Su Usuario : '.utf8_decode($variable1).'</h3></font><br>
      <font color="black"><h3> Su Contrase&ntilde;a : '.$variable2.' </h3></font>
                      <br><br>
                      <font color="black"><h4>Estimado usuario:</h4></font>
                      <font color="black"><h4>Si desea participar con alg&uacute;n trabajo, podr&aacute; registrarlo a partir del d&iacute;a 29 de Octubre de 2013</h4></font> 
                      <font color="black"><h4>Favor de estar al pendiente de las fechas importantes del Congreso, podr&aacute; consultarlas en el apartado derecho de la p&aacute;gina principal:</h4></font> 
                      <font color="black"><h4><a href="http://congresomatematicas.cuautitlan2.unam.mx">http://congresomatematicas.cuautitlan2.unam.mx</a></h4></font>
                      </b>
                      <font color="black"><h3>Contacto.</h3></font><br>
      <font color="black"><h5>56 23 18 86</h5></font>
      <font color="black"><h5>56 23 18 90</h5></font> 
<a href="http://congresomatematicas.cuautitlan2.unam.mx">6&deg; Congreso Internacional para la Ense&ntilde;anza y Aplicaci&oacute;n de las Matem&aacute;ticas 2014</a>    
</h4></font><br><br>
                    </td>
                  </tr>                 
                </table>
              </td>
            </tr>
            <tr>
              <td class="bottom">&nbsp;</td>
            </tr>
          </table>
        </td>  
   
      </tr>     
  </font>       
    </table>  
  </center>      
</body>

</html>');
$mail->AddAddress("".$email, "".$email);
$mail->IsHTML(true);
 
if(!$mail->Send()) {
  echo "Hubo un error al momento de enviar el correo electronico porfavor guarde su usuario y contraseña en un lugar seguro";
} else {
  echo "Mensaje enviado correctamente";
}
