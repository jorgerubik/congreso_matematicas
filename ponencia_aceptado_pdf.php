<?php
 
require('fpdf/fpdf.php');
require('script/conexion.php');
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
        $this->Cell(-190,110,utf8_decode('Clave del trabajo:'),0,0,'C');
        $this->Cell(190,117,utf8_decode('Categoría:'),0,0,'C');
        $this->Cell(-190,125,utf8_decode('Modalidad:'),0,0,'C');

        //Cuerpo de la carta
        $this->Cell(-80,130,utf8_decode('Estimado(s):'),0,0,'C');
        $this->Cell(80,137,utf8_decode(''),0,0,'C');
        $this->Cell(-10,160,utf8_decode('Tenemos el agrado de comunicarle(s) que su PONENCIA ORAL:'),0,0,'C');
        $this->Cell(100,170,utf8_decode(' '),0,0,'C');
        $this->Cell(-200,180,utf8_decode('Presentado para este congreso, ha sido ACEPTADO.'),0,0,'C');
        $this->Cell(175,190,utf8_decode('El comité evaluador le(s) recomienda:'),0,0,'C');
        $this->Cell(-200,200,utf8_decode(''),0,0,'C');
        $this->Cell(320,210,utf8_decode('La Ponencia será presentado el día y fecha que se le indique, en caso omiso quedara fuera de concurso.'),0,0,'C');
        $this->Cell(-345,220,utf8_decode('La estructura de la ponencia la puede consultar en el menú de presentaciones de la página:'),0,0,'C');
        $this->Cell(290,230,utf8_decode('http://congresomatematicas.cuautitlan2.unam.mx'),0,0,'C');
        $this->Cell(-300,260,utf8_decode('Sin más por el momento, quedamos de usted.'),0,0,'C');
        $this->Cell(250,280,utf8_decode('Atentamente'),0,0,'C');
        $this->Cell(-200,290,utf8_decode('"Por mi Raza Hablará el Espíritu"'),0,0,'C');
        $this->Cell(230,300,utf8_decode('Cuautitlán Izcalli, Edo, Méx. a 10 de diciembre de 2013'),0,0,'C');
       
        $this->Cell(-130,450,utf8_decode("Dr. Juan Alfonso Oaxaca Luna                                                                    Dra. María del Carmen Valderrama Bravo"),0,0,'C');
        $this->Cell(118,470,utf8_decode('Coordinadores generales del congreso'),0,0,'C');
       
       //firmas
        $this->Cell(200,100,'',0,0,'C',$this->Image('imagenes/firma_oaxaca.jpeg', 10,180, 100));
        $this->Cell(200,100,'',0,0,'C',$this->Image('imagenes/firma_2.jpeg', 140,180, 20));



       
       $this->Ln(25);
    }
 
}
//BD
$mysql = new mysql;
    $mysql->connect();
   $mysql->select($data_base);
    

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
   $modalidad = $id_modalidad;
   $categoria = $id_categoria;
   $rfc = $RFC;
   $aceptado = $comentario_aceptado;


 
        $pdf = new PDF();             
        $pdf->AddPage('P', 'Letter'); 

 //insertar datos de BD en pdf
 //$pdf->SetFont('Arial', 'B', 14);
//$pdf->Cell(70, 10, "Nombre de Quien Reporta", 1);
//$pdf->Cell(80,137, $describe, 1);
//$pdf->Ln(10);
//$pdf->SetFont('Arial', 'I', 12);
$pdf ->Cell(350,60, utf8_decode($id), 0,0, 'C');    
$pdf ->Cell(-350,68, utf8_decode($categoria), 0,0, 'C');  
$pdf ->Cell(350,76, utf8_decode($modalidad), 0,0, 'C');  
$pdf->Cell(-650,100, utf8_decode($rfc), 0,0, 'C');
$pdf ->Cell(650, 120,utf8_decode($titulo), 0,0, 'C');
$pdf ->Cell(-650, 150, utf8_decode($aceptado),0,0, 'C');
//$pdf->Cell(50, 10, $falla, 0);

//$pdf->Output('mipdf.pdf','d');    

       $pdf->Output($id.'.pdf', 'F'); //esta linea guarda el pdf en el navegador
      //$pdf->Output(); //esta linea solo muestra el pdf en el navegador    
//Cerramos la Conexion a MySQL si existe

if(isset($mysql))$mysql->close();    
header("location: index.php");              
?>