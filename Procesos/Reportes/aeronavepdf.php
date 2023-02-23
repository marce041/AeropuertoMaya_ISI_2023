<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
     $this->Image('img/Emirates-Logo-1985-19991.png',10,8,40);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
     // Color de texto
     $this->SetTextColor(66,92,90);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de Aeronaves',0,0,'C');
    // Salto de línea
    $this->Ln(25);
    $this->Cell(5);
    $this->cell(50,10,'Matricula',1,0,'C',0);
    $this->cell(42,10,'Modelo',1,0,'C',0);
    $this->cell(40,10,'Capacidad',1,0,'C',0);
    $this->cell(50,10,'Tipo',1,1,'C',0);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
}
}

require "../../conexion.php";
$consulta="SELECT * from aeronave";
$resultado=$conn->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(5);
    $pdf->cell(50,10,$row['Matricula'],1,0,'C',0);
    $pdf->cell(42,10,$row['Modelo'],1,0,'C',0); 
    $pdf->cell(40,10,$row['Capacidad'],1,0,'C',0);
    $pdf->cell(50,10,$row['Tipo'],1,0,'C',0);
    $pdf->Ln(10);
   

}

$pdf->Output();

?>