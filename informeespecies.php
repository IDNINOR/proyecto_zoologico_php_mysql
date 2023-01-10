<?php
$conexion=mysqli_connect("localhost","root","","zoo");
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo

    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte Especies',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->cell(60,10,"Nombre",1,0,"c",0);
    $this->cell(60,10,utf8_decode("Estado extinción"),1,0,"c",0);
    $this->cell(60,10,"Zoologico",1,1,"c",0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}



$sql="SELECT especie.nombre_cientifico, estado_extincion.estado_extincion, zoo.nombre
      FROM especie INNER JOIN estado_extincion ON (especie.id_estado_extincion_fk = estado_extincion.id_estado_extincion)
      INNER JOIN zoo ON (especie.id_zoo_fk = zoo.id_zoo)";
$result=mysqli_query($conexion,$sql);

$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','',16);
while($row = $result->fetch_assoc())
{
    $pdf->cell(60,10,$row["nombre_cientifico"],1,0,"c",0);
    $pdf->cell(60,10,$row["estado_extincion"],1,0,"c",0);
    $pdf->cell(60,10,$row["nombre"],1,1,"c",0);
}
$pdf->Output();
?>