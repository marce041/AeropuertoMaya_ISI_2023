<?php

require "../../conexion.php";

require '../../vendor/autoload.php';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Pasajero.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$spreadsheet ->getProperties()->setTitle("Pasajero");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();
$hojaActiva->setTitle("Pasajero");

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
    $spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(110, 'pt');

$hojaActiva->mergeCells('A1:G1');
$hojaActiva->getStyle('A1:J2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->setCellValue('A1','Reporte de Aeropuerto');
$hojaActiva->setCellValue('I1', 'Usuario:');
$hojaActiva->setCellValue('J1', $rangoinicial);
$hojaActiva->getStyle('I3:J3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$hojaActiva->setCellValue('I2', 'Fecha:');
$hojaActiva->setCellValue('J2', $fechaActual);
$hojaActiva->setCellValue('I3', 'Hora:');
$hojaActiva->setCellValue('J3', $horaActual);


$hojaActiva->setCellValue('A2','Nombre');
$hojaActiva->setCellValue('B2','Tipo de Documento');
$hojaActiva->setCellValue('C2','Numero de Documento');
$hojaActiva->setCellValue('D2','Telefono');
$hojaActiva->setCellValue('E2','Correo');
$hojaActiva->setCellValue('F2','Id de Pais');
$hojaActiva->setCellValue('G2','Fecha de Nacimiento');

$hojaActiva->getStyle('A1:G2')->applyFromArray($styleArray);
$hojaActiva->getStyle('I1:J3')->applyFromArray($styleArray);
$spreadsheet->getDefaultStyle()->getFont()->setBold(false);

$hojaActiva->getStyle('A3:G100')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


$consulta="SELECT * from pasajero";
$resultado=$conn->query($consulta);

$fila= 3;

while($row=$resultado->fetch_assoc()){

$hojaActiva->setCellValue('A'. $fila, $row['Nombre']);
$hojaActiva->setCellValue('B'. $fila, $row['Tipo_Documento']);
$hojaActiva->setCellValue('C'. $fila, $row['Numero_Documento']);
$hojaActiva->setCellValue('D'. $fila, $row['Telefono']);
$hojaActiva->setCellValue('D'. $fila, $row['Correo']);
$hojaActiva->setCellValue('D'. $fila, $row['Id_Pais']);
$hojaActiva->setCellValue('D'. $fila, $row['Fecha_Nacimiento']);
$fila++;
}

$hojaActiva->getStyle('A3:C50')->applyFromArray($styleArray);
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;


?>