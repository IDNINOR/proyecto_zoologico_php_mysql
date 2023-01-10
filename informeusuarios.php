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
    $this->Cell(30,10,'Reporte Usuarios',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->cell(40,10,"Nombre",1,0,"c",0);
    $this->cell(40,10,"Clave",1,0,"c",0);
    $this->cell(40,10,"Respuesta1",1,0,"c",0);
    $this->cell(40,10,"Respuesta2",1,1,"c",0);
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



$sql="SELECT * FROM usuarios WHERE tipo_usuario=\"usuario\" ";
$result=mysqli_query($conexion,$sql);

$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','',16);
while($row = $result->fetch_assoc())
{
    $pdf->cell(40,10,$row["usuario"],1,0,"c",0);
    $pdf->cell(40,10,$row["clave"],1,0,"c",0);
    $pdf->cell(40,10,$row["respuesta1"],1,0,"c",0);
    $pdf->cell(40,10,$row["respuesta2"],1,1,"c",0);
}
$pdf->Output();
?>