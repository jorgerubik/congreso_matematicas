<?php

//$username= $_POST['username'];
echo "$username";


include("class.phpmailer.php");
include("class.smtp.php");
 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "ness.reaper@gmail.com";
$mail->Password = "ask514ion497";




$mail->From = "uroboros_reaper@gmail.com";
$mail->FromName = "Congreso Matematicas";
$mail->Subject ="Verificasion de datos";
$mail->AltBody = "";
//$mail->MsgHTML("Hola, te doy mi nuevo numero<br><b>xxxx</b>.");
$mail->MsgHTML('<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
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
			 <font color="#4000FF"> <h3>. </h3></font><br>
			

			<font color="black"><h3> "Estimado usuario, con el fin de mantener la integridad de su informaci&oacute;n, le pedimos verifique los siguientes datos:"</h3></font><br><br>
			
                      <font color="black"><h4>
                      <font color="black"><h3>Nombre: </h3></font> 
			<br>

<br>
 <font color="black"><h3>"Por favor responda por &eacute;ste medio a &eacute;sta misma direcci&oacute;n de correo (congresomate6@gmail.com) con sus datos correctos" </h3></font> 
                     <br>
<br>
		
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
$mail->AddAddress("rbalva01@gmail.com", "rbalva01@gmail.com");
$mail->IsHTML(true);
 
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Mensaje enviado correctamente";
}
