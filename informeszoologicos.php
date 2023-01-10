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
    $this->Cell(30,10,'Reporte Zoologicos',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->cell(50,10,"Nombre",1,0,"c",0);
    $this->cell(50,10,utf8_decode("Tamaño"),1,0,"c",0);
    $this->cell(50,10,"P. Anual",1,0,"c",0);
    $this->cell(45,10,"Pais",1,1,"c",0);
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



$sql="SELECT zoo.nombre, zoo.tamano, zoo.presupuesto_anual, pais.pais 
      FROM zoo INNER JOIN pais ON (zoo.id_pais_fk = pais.id_pais)";

$result=mysqli_query($conexion,$sql);

$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','',12);
while($row = $result->fetch_assoc())
{
    $pdf->cell(50,10,$row["nombre"],1,0,"c",0);
    $pdf->cell(50,10,$row["tamano"],1,0,"c",0);
    $pdf->cell(50,10,$row["presupuesto_anual"],1,0,"c",0);
    $pdf->cell(45,10,$row["pais"],1,1,"c",0);
}
$pdf->Output();
?>