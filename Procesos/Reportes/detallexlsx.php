<?php

require "../../conexion.php";

require '../../vendor/autoload.php';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Detalle.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Detalle");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Detalle");

session_start();

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

    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '00000000'],
            ],
        ],
    ];
    
    
    $spreadsheet->getDefaultStyle()->getFont()->setBold(true);
    $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
    $spreadsheet->getDefaultStyle()->getFont()->setSize(12);
    $spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(190, 'pt');

$hojaActiva->mergeCells('A1:I1');
$hojaActiva->getStyle('A1:L2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de Detalle de Factura');
$hojaActiva->setCellValue('K1', 'Usuario:');
$hojaActiva->setCellValue('L1', $rangoinicial);
$hojaActiva->getStyle('K3:L3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('K2', 'Fecha:');
$hojaActiva->setCellValue('L2', $fechaActual);
$hojaActiva->setCellValue('K3', 'Hora:');
$hojaActiva->setCellValue('L3', $horaActual);


$hojaActiva->setCellValue('A2','Id');
$hojaActiva->setCellValue('B2','Id Boleto');
$hojaActiva->setCellValue('C2','Cantidad');
$hojaActiva->setCellValue('D2','Descripcion');
$hojaActiva->setCellValue('E2','SubTotal');
$hojaActiva->setCellValue('F2','Descuento');
$hojaActiva->setCellValue('G2','Impuesto');
$hojaActiva->setCellValue('H2','Total');
$hojaActiva->setCellValue('I2','Estado');

$hojaActiva->getStyle('A1:I2')->applyFromArray($styleArray);
$hojaActiva->getStyle('K1:L3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:I100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


$consulta="SELECT * from detallefactura";
$resultado=$conn->query($consulta);

$fila= 3;

while($row=$resultado->fetch_assoc()){

$hojaActiva->setCellValue('A'. $fila, $row['Id_Detalle']);
$hojaActiva->setCellValue('B'. $fila, $row['Id_Boleto']);
$hojaActiva->setCellValue('C'. $fila, $row['Cantidad']);
$hojaActiva->setCellValue('D'. $fila, $row['Descripcion']);
$hojaActiva->setCellValue('E'. $fila, $row['Subtotal']);
$hojaActiva->setCellValue('F'. $fila, $row['Total_Descuento']);
$hojaActiva->setCellValue('G'. $fila, $row['Total_Impuesto']);
$hojaActiva->setCellValue('H'. $fila, $row['Total']);
$hojaActiva->setCellValue('I'. $fila, $row['Estado']);
$fila++;
}

$hojaActiva->getStyle('A3:I50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;





?>