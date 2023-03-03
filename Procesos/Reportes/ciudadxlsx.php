<?php

require "../../conexion.php";

require '../../vendor/autoload.php';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Ciudad.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Ciudades");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Ciudades");

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
    $spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(70, 'pt');

$hojaActiva->mergeCells('A1:E1');
$hojaActiva->getStyle('A1:G2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de ciudades');
$hojaActiva->setCellValue('G1', 'Usuario:');
$hojaActiva->setCellValue('H1', $rangoinicial);
$hojaActiva->getStyle('G3:H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('G2', 'Fecha:');
$hojaActiva->setCellValue('H2', $fechaActual);
$hojaActiva->setCellValue('G3', 'Hora:');
$hojaActiva->setCellValue('H3', $horaActual);


$hojaActiva->setCellValue('A2','Id de la ciudad');
$hojaActiva->setCellValue('B2','Nombre');
$hojaActiva->setCellValue('C2','Codigo');
$hojaActiva->setCellValue('D2','Terminal');
$hojaActiva->setCellValue('E2','Id del pais');

$hojaActiva->getStyle('A1:E2')->applyFromArray($styleArray);
$hojaActiva->getStyle('G1:H3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:E100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


$consulta="SELECT * from ciudad";
$resultado=$conn->query($consulta);

$fila= 3;

while($row=$resultado->fetch_assoc()){

$hojaActiva->setCellValue('A'. $fila, $row['Id_Ciudad']);
$hojaActiva->setCellValue('B'. $fila, $row['Nombre']);
$hojaActiva->setCellValue('C'. $fila, $row['Codigo']);
$hojaActiva->setCellValue('D'. $fila, $row['Terminal']);
$hojaActiva->setCellValue('E'. $fila, $row['Id_Pais']);
$fila++;
}

$hojaActiva->getStyle('A3:E50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;


?>