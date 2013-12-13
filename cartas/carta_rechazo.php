<?php
 
require('fpdf/fpdf.php');
//require('script/conexion.php');
header("Content-Type: text/html; charset=iso-8859-1 ");
 
class PDF extends FPDF
{
    function Footer() 
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('6° Congreso Internacional sobre la Enseñanza y Aplicación de las Matemáticas 7,8 y 9 de Mayo 2014'),'T',0,'C');
    }
 
    function Header() 
    {
        
        $this->SetFont('Arial','B',9);
 
        /* Líneas paralelas
         * Line(x1,y1,x2,y2)
         * El origen es la esquina superior izquierda
         * Cambien los parámetros y chequen las posiciones
         * */
        $this->Line(10,10,206,10);
        $this->Line(10,35.5,206,35.5);
 
        /* Explicaré el primer Cell() (Los siguientes son similares)
         * 30 : de ancho
         * 25 : de alto
         * ' ' : sin texto
         * 0 : sin borde
         * 0 : Lo siguiente en el código va a la derecha (en este caso la segunda celda)
         * 'C' : Texto Centrado
         * $this->Image('images/logo.png', 152,12, 19) Método para insertar imagen
         *     'images/logo.png' : ruta de la imagen
         *     152 : posición X (recordar que el origen es la esquina superior izquierda)
         *     12 : posición Y
         *     19 : Ancho de la imagen (w)
         *     Nota: Al no especificar el alto de la imagen (h), éste se calcula automáticamente
         * */
 
        $this->Cell(30,25,'',0,0,'C',$this->Image('imagenes/logomate.jpeg', 182,12, 19));
        $this->Cell(140,20,utf8_decode('Universidad Nacional Autónoma de México'),0,0,'C');
        $this->Cell(-140,28,utf8_decode('Facultad de Estudios Superiores Cuautitlán'),0,0,'C');
        $this->Cell(140,38,utf8_decode('Departamento de Matemáticas'),0,0,'C');
        $this->Cell(40,25,'',0,0,'C',$this->Image('imagenes/logo_unam2.png', 12, 12, 19));

        //lineas del logo del congreso y nombre de congreso
        $this->Line(10,40,206,40);
        $this->Line(10,60,206,60);
        //logo del congreso dentro de lineas
        $this->Cell(35,25,'',0,0,'C',$this->Image('imagenes/logo_congreso.jpeg', 50,41, 105));
        
        // clave,categoría y modalidad
        $this->Text(150,64,utf8_decode('Clave del trabajo:'));
        //Cuerpo de la carta
        $this->Text(10,70,utf8_decode('Estimado(s):'));
        //$this->Text(10,73,utf8_decode(''));
        $this->Text(10,100,utf8_decode('Por este medio le (s) comunicamos que su  PROPUESTA:'));
        //$this->Cell(100,170,utf8_decode(' '),0,0,'C');
        $this->Text(10,115,utf8_decode('Presentado para este congreso, ha sido RECHAZADA.'));
        $this->Text(10,120,utf8_decode('Los motivos que originan la decisión son los siguientes:'));
        //$this->Cell(-200,200,utf8_decode(''),0,0,'C');
        
        $this->Text(10,135,utf8_decode('Sin más por el momento, quedamos de usted.'));
        $this->Text(10,140,utf8_decode('Atentamente'));
        $this->Text(20,145,utf8_decode('"Por mi Raza Hablará el Espíritu"'));
        $this->Text(20,150,utf8_decode('Cuautitlán Izcalli, Edo, Méx. a 10 de diciembre de 2013'));
       
        $this->Text(20,225,utf8_decode("Dr. Juan Alfonso Oaxaca Luna                                                                    Dra. María del Carmen Valderrama Bravo"));
        $this->Text(65,240,utf8_decode('Coordinadores generales del congreso'));
       
       //firmas
        $this->Cell(200,100,'',0,0,'C',$this->Image('imagenes/firma_oaxaca.jpeg', 10,180, 100));
        $this->Cell(200,100,'',0,0,'C',$this->Image('imagenes/firma_2.jpeg', 140,180, 20));



       
       $this->Ln(25);
    }
 
}
//BD
//$mysql = new mysql;
  //  $mysql->connect();
   //$mysql->select($data_base);
    

//La consulta

// $sql = $mysql->query("SELECT * FROM ponencias_cartel WHERE RFC = 'BAAR921117HDF'");
// $result = $mysql->f_array($sql);
// $rfc = utf8_decode($result['RFC']);
// $id = utf8_decode($result['id_ponencia_cartel']);
// $categoria = utf8_decode($result['id_categoria']);
// $modalidad = utf8_decode($result['id_modalidad']);
// $titulo = utf8_decode($result['titulo_cartel']);
// $describe= utf8_decode("Descripción de la Falla");
// $falla  = $result['Desc_falla'];
   $id = $id_trabajo;
   $titulo = $titulo_trabajo;
   
   $rfc = $RFC;
   $aceptado = $comentario_aceptado;
   $rechazado = $comentario_rechazado;
   $nombre = array_values($nombre_usuario);
   $primerap = array_values($apellido_paterno);
   $segundoap = array_values($apellido_materno);
 
        $pdf = new PDF();             
        //$pdf -> SetLeftMargin(30);
        $pdf->AddPage('P', 'Letter'); 
 //insertar datos de BD en pdf
 //$pdf->SetFont('Arial', 'B', 14);
//$pdf->Cell(70, 10, "Nombre de Quien Reporta", 1);
//$pdf->Cell(80,137, $describe, 1);
//$pdf->Ln(10);
//$pdf->SetFont('Arial', 'I', 12);
$pdf ->Text(180,64, utf8_decode($id));    
//
 $pdf -> SetXY(10,71);
for ($i=0; $i < 5 ; $i++) { 
    
    $pdf -> MultiCell(80,5, utf8_decode($nombre[$i].' '.$primerap[$i].' '.$segundoap[$i]),0,'L');
    //$pdf -> Ln(1);
}
//$pdf->Text(10,75, utf8_decode($rfc));
$pdf -> SetXY(10,102);
$pdf ->MultiCell(0,3, utf8_decode($titulo),0,'L');
$pdf -> SetXY(10,122);
$pdf ->MultiCell(0,3,utf8_decode($rechazado),0,'L'); //Text(10,105, utf8_decode($rechazado));
//$pdf->Cell(50, 10, $falla, 0);

//$pdf->Output('mipdf.pdf','d');    

       $pdf->Output('cartas/'.$id.'.pdf', 'F'); //esta linea guarda el pdf en el navegador
      //$pdf->Output(); //esta linea solo muestra el pdf en el navegador    
//Cerramos la Conexion a MySQL si existe

if(isset($mysql))$mysql->close();    
header("location: index.php");              
?>