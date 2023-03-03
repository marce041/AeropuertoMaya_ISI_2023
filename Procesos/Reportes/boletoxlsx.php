<?php

require "../../conexion.php";

require '../../vendor/autoload.php';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Boletos.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Boletos");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Boletos");

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

$hojaActiva->mergeCells('A1:D1');
$hojaActiva->getStyle('A1:G2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de boletos');
$hojaActiva->setCellValue('KI1', 'Usuario:');
$hojaActiva->setCellValue('L1', $rangoinicial);
$hojaActiva->getStyle('F3:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('F2', 'Fecha:');
$hojaActiva->setCellValue('G2', $fechaActual);
$hojaActiva->setCellValue('F3', 'Hora:');
$hojaActiva->setCellValue('G3', $horaActual);


$hojaActiva->setCellValue('A2','Id del boleto');
$hojaActiva->setCellValue('B2','Codigo');
$hojaActiva->setCellValue('C2','Id del asiento');
$hojaActiva->setCellValue('D2','Id del pasajero');
$hojaActiva->setCellValue('E2','Id del vuelo');
$hojaActiva->setCellValue('F2','Id del equipaje');
$hojaActiva->setCellValue('G2','Id del clase');
$hojaActiva->setCellValue('H2','Precio');
$hojaActiva->setCellValue('I2','Estado');


$hojaActiva->getStyle('A1:D2')->applyFromArray($styleArray);
$hojaActiva->getStyle('F1:G3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:D100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


$consulta="SELECT * from tripulacion";
$resultado=$conn->query($consulta);

$fila= 3;

while($row=$resultado->fetch_assoc()){

$hojaActiva->setCellValue('A'. $fila, $row['Cargo']);
$hojaActiva->setCellValue('B'. $fila, $row['Horas_Vuelo']);
$hojaActiva->setCellValue('C'. $fila, $row['Tipo_Licencia']);
$hojaActiva->setCellValue('D'. $fila, $row['Academia']);
$fila++;
}

$hojaActiva->getStyle('A3:C50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;


?>