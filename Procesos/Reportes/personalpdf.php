<?php

session_start();
require('fpdf.php');
require "../../conexion.php";


$user=$_SESSION['idUser'];
$queryparametro=mysqli_query($conn, "SELECT Usuario FROM usuario WHERE `idUser`=$user;");
    
    $rangini = array();
  
    while($datos = mysqli_fetch_array($queryparametro)) {
        array_push($rangini, $datos['Usuario']);
    }

    $rangoinicial=$rangini[0];

    date_default_timezone_set('America/Mexico_City');

    $fechaActual = date("d-m-Y");
    $horaActual = date("H:i:s");

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
    $this->Cell(70,10,'Reporte de Personal',0,0,'C');
    
    $this->SetFont('Arial','',12);
	$this->SetTextColor(39,39,51);
	$this->Cell(150,9,utf8_decode(""),0,0,'L');

	$this->Ln(10);
    $this->Cell(150);
	
	$this->Cell(250,9,utf8_decode("Usuario: ".$GLOBALS["rangoinicial"]),0,0,'L');

	$this->Ln(7);
    $this->Cell(150);
	$this->Cell(150,9,utf8_decode("Fecha: ".$GLOBALS["fechaActual"] ),0,0,'L');

	$this->Ln(7);
    $this->Cell(150);
	$this->Cell(150,9,utf8_decode("Hora: ".$GLOBALS["horaActual"]),0,0,'L');
	
    $this->Ln(7);
    $this->Cell(117,7,utf8_decode(''),'',0,'C');
    $this->Cell(10,7,utf8_decode('_____________________________________________________________________________________________________________________________'),'',0,'C');
    // Salto de línea
    $this->SetFont('Arial','B',18);
     // Color de texto
     $this->SetTextColor(66,92,90);
    $this->Ln(15);
    $this->Cell(15);
    $this->cell(50,10,'Codigo',1,0,'C',0);
    $this->cell(70,10,'Carga Academica',1,0,'C',0);
    $this->cell(42,10,'Cargo',1,0,'C',0);
    
    


}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetFont('Arial','',12);
	$this->SetTextColor(39,39,51);
    $this->Ln(7);
    $this->Cell(117,7,utf8_decode(''),'',0,'C');
    $this->Cell(10,7,utf8_decode('_____________________________________________________________________________________________________________________________'),'',0,'C');
    
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}


$consulta="SELECT * from personaltierra";
$resultado=$conn->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Ln(10);
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(15);
    $pdf->cell(50,10,$row['Id_Personal'],1,0,'C',0);
    $pdf->cell(70,10,$row['Carga_Academica'],1,0,'C',0);
    $pdf->cell(42,10,$row['Cargo'],1,0,'C',0);
    $pdf->Ln(10);
   

}

$pdf->Output();

?>