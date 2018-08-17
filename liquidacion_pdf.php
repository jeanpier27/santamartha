<?php 
if(isset($_GET['id'])){

require_once('fpdf/fpdf.php');
require_once('conexion.php');
$id=$_GET['id'];
$fecha=$_GET['fecha'];
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/logo_transparente.png',85,3,25);
    // Arial bold 15
    // $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    // $this->Cell(80);
    // Título
    // $this->Cell(30,10,'Title',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    // $this->SetY(-15);
    // // Arial italic 8
    // $this->SetFont('Arial','I',8);
    // // Número de página
    // $this->Cell(0,10,''.$this->PageNo().'/{nb}',0,0,'C');
}
}

$meses=array('','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$emple=$conexion->query("SELECT `tb_empleado`.*, `tb_liquidacion`.* FROM `tb_empleado` inner JOIN `tb_liquidacion` ON `tb_liquidacion`.`id_empleado` = `tb_empleado`.`id_empleado` where tb_liquidacion.id_empleado='".$id."' and tb_liquidacion.fecha='".$fecha."' ");
while($detf=mysqli_fetch_array($emple)){
$iess=9.45;
$total=0;

// Creación del objeto de la clase heredada
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->SetXY(55,30);
$pdf->Cell(0,10,'AUTOSERVICIO SANTA MARTHA',0,1);
$pdf->SetFont('Times','B',12);
$pdf->SetXY(10,40);
$pdf->Cell(0,10,utf8_decode('LIQUIDACIÓN'),0,1);
$pdf->SetFont('Times','B',14);
$pdf->Line(10,50, 190, 50);
$pdf->Line(10,80, 190, 80);
$pdf->SetXY(10,50);
$pdf->Cell(0,10,'Nombres: '.$detf['nombres'],0,1);
$pdf->SetXY(10,60);
$pdf->Cell(0,10,'Cedula: '.$detf['cedula'],0,1);
$pdf->SetXY(10,70);
$pdf->Cell(0,10,'Cargo: '.$detf['cargo'],0,1);
// $pdf->SetXY(15,90);
// $pdf->Cell(85,10,'Ingresos',1,1,'C');
// $pdf->SetXY(100,90);
// $pdf->Cell(85,10,'Egresos',1,1,'C');
// $pdf->Line(15,90, 15, 180);
// $pdf->Line(100,100, 100, 180);
// $pdf->Line(185,100, 185, 180);
// $pdf->Line(15,180, 185, 180);
$pdf->SetFont('Times','',10);
// $pdf->SetXY(15,100);
// $pdf->Cell(35,10,'Sueldo Mensual',0,1);
// $pdf->SetXY(65,100);
// $pdf->Cell(35,10,'$'.$detf['sueldo'],0,1,'R');
// $pdf->SetXY(100,100);
// $pdf->Cell(35,10,'Aporte IESS',0,1);
// $pdf->SetXY(150,100);
// $sub=($detf['sueldo']*($iess*0.01));
// $pdf->Cell(35,10,'$'.number_format($sub,2),0,1,'R');
// $pdf->Line(100,109, 185, 109);
// $pdf->SetXY(100,115);
// $pdf->Cell(35,7,'Faltas',1,1);
$pdf->SetFont('Times','B',16);
$pdf->SetXY(80,220);
$pdf->Cell(55,0,'',1,1);
$pdf->Cell(0,10,'Recibi conforme',0,1,'C');
$pdf->Cell(0,10,$detf['nombres'],0,1,'C');
$pdf->Cell(0,10,$detf['cedula'],0,1,'C');

}
$pdf->Output();
}
 ?>