<?php 
if(isset($_GET['id_fact'])){
error_reporting(0);
require_once('fpdf/fpdf.php');
require_once('conexion.php');
$id_fact=$_GET['id_fact'];
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

$fact=$conexion->query("SELECT `tb_clientes`.*, `tb_factura`.* FROM `tb_clientes` inner JOIN `tb_factura` ON `tb_factura`.`id_clientes` = `tb_clientes`.`id_clientes` where tb_factura.id_factura=".$id_fact);
while($detf=mysqli_fetch_array($fact)){
	$n_factura=$detf['numero_fact'];
	$fecha=$detf['fecha'];
	$cliente=utf8_decode($detf['nombre']).' '.utf8_decode($detf['apellido']);
	$cedula=$detf['cedula_ruc'];
	$telefono=$detf['telefono'];
	$direccion=utf8_decode($detf['direccion']);	
	$descuento=$detf['descuento'];
	$iva=$detf['iva'];
	$total=$detf['total'];
	
}

// Creación del objeto de la clase heredada
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->SetXY(55,30);
$pdf->Cell(0,10,'AUTOSERVICIO SANTA MARTHA',0,1);
// $pdf->SetFont('Times','B',16);
$pdf->SetXY(10,40);
$pdf->Cell(0,10,'FACTURA N.- '.$n_factura,0,1);
$pdf->SetFont('Times','B',14);
$pdf->Line(10,50, 190, 50);
$pdf->Line(10,80, 190, 80);
$pdf->SetXY(10,50);
$pdf->Cell(0,10,'Cliente: '.$cliente,0,1);
$pdf->SetXY(10,60);
$pdf->Cell(0,10,'Cedula: '.$cedula,0,1);
$pdf->SetXY(10,70);
$pdf->Cell(0,10,'Direcion: '.$direccion,0,1);
$pdf->SetXY(130,50);
$pdf->Cell(0,10,'Telefono: '.$telefono,0,1);
$pdf->SetXY(130,60);
$pdf->Cell(0,10,'Fecha: '.$fecha,0,1);
$pdf->SetXY(25,90);
$pdf->Cell(80,10,'Descripcion',1,1,'C');
$pdf->SetXY(105,90);
$pdf->Cell(25,10,'Cantidad',1,1,'C');
$pdf->SetXY(130,90);
$pdf->Cell(35,10,'Valor Unit.',1,1,'C');
$band=0;
$detalle=$conexion->query("SELECT `tb_detalle_ventas`.cantidad as cantidad_p, `tb_producto`.* FROM `tb_producto` inner JOIN `tb_detalle_ventas` ON `tb_detalle_ventas`.`id_producto` = `tb_producto`.`id_producto` where tb_detalle_ventas.id_factura=".$id_fact);
$count=mysqli_num_rows($detalle);
if($count>0){
	$band=1;
	while($resp=mysqli_fetch_array($detalle)){
		$pdf->SetFont('Times','',12);
		$pdf->SetX(25);
		$pdf->Cell(80,10,utf8_decode($resp['producto']),1,0);
		$pdf->SetFont('Times','',14);
		$pdf->SetX(105);
		$pdf->Cell(25,10,$resp['cantidad_p'],1,0,'R');
		$pdf->SetX(130);
		$pdf->Cell(35,10,'$'.$resp['pvv'],1,1,'R');
		$subt=$subt+($resp['cantidad_p']*$resp['pvv']);
	}
}else{
	$detalle_serv=$conexion->query("SELECT `tb_detalle_servicio`.* FROM tb_detalle_servicio where tb_detalle_servicio.id_factura=".$id_fact);
	$band=2;
	while($resp=mysqli_fetch_array($detalle_serv)){
		$pdf->SetFont('Times','',12);
		$pdf->SetX(25);
		$pdf->Cell(80,10,utf8_decode($resp['observacion']),1,0);
		$pdf->SetFont('Times','',14);
		$pdf->SetX(105);
		$pdf->Cell(25,10,'',1,0,'R');
		$pdf->SetX(130);
		$pdf->Cell(35,10,'$'.$total,1,1,'R');
		$subt=$total;
	}
}


// for($i=0;$i<5;$i++){
// 	$pdf->SetFont('Times','',14);
// 	$pdf->SetX(25);
// 	$pdf->Cell(70,10,'Descripcion'.$i,1,0);
// 	$pdf->SetX(95);
// 	$pdf->Cell(25,10,''.$i.'',1,0,'R');
// 	$pdf->SetX(120);
// 	$pdf->Cell(35,10,''.$i.'',1,1,'R');
// }
if($band==1){
	$ivas=($subt*0.12);
}else{
	$ivas=$iva;
}
$pdf->Ln(10);
$pdf->SetFont('Times','B',16);
$pdf->SetX(130);
$pdf->Cell(35,10,'Subtotal $',0,0);
$pdf->SetX(170);
$pdf->Cell(35,10,''.$subt.'',0,1,'R');
$pdf->SetX(130);
$pdf->Cell(35,10,'Descuento %',0,0);
$pdf->SetX(170);
$pdf->Cell(35,10,''.$descuento,0,1,'R');
$pdf->SetX(130);
$pdf->Cell(35,10,'Iva 12%',0,0);
$pdf->SetX(170);
$pdf->Cell(35,10,''.$ivas.'',0,1,'R');
$pdf->SetX(130);
$pdf->Cell(77,10,'Total $',0,0);
$pdf->SetX(170);
$pdf->Cell(35,10,''.$total,0,1,'R');
$pdf->SetX(130);
$pdf->Cell(74,0,'',1,1,'R');
$pdf->Output();
}
 ?>