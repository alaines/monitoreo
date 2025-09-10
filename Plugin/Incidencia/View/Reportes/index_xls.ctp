<?php
App::import('Vendor', 'PhpSpreadsheet', array('file' => 'autoload.php'));

//use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()->setCreator('EMC-GMU')
    ->setLastModifiedBy('EMC-GMU')
    ->setTitle('Reporte de incidencias')
    ->setSubject('Reporte de incidencias')
    ->setDescription('Reporte de incidencias generado por el centro de control')
    ->setKeywords('Reporte incidencias EMC control centro')
    ->setCategory('Reportes');

// Agregando Cabeceras
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Nro')
    ->setCellValue('B1', 'Ticket')
    ->setCellValue('C1', 'Incidencia')
    ->setCellValue('D1', 'Tipo')
    ->setCellValue('E1', 'Cruce')
    ->setCellValue('F1', 'Distrito')
    ->setCellValue('G1', 'Administrado por')    
    ->setCellValue('H1', 'Asignado a')
    ->setCellValue('I1', 'Detalle')
    ->setCellValue('J1', 'Operador')
    ->setCellValue('K1', 'Estado')
    ->setCellValue('L1', 'Fecha de registro')
    ->setCellValue('M1', 'Fecha ultimo Estado');

$linea = 1;
$contar = 0;
foreach ($tickets as $t){
    ++$linea; ++$contar;
    $spreadsheet->getActiveSheet()->setCellValue('A'.$linea, $contar);
    $spreadsheet->getActiveSheet()->setCellValue('B'.$linea, $t['Reporte']['Ticket']);
    $spreadsheet->getActiveSheet()->setCellValue('C'.$linea, $t['Reporte']['Tipo']);
    $spreadsheet->getActiveSheet()->setCellValue('D'.$linea, $t['Reporte']['Incidencia']);
    $spreadsheet->getActiveSheet()->setCellValue('E'.$linea, $t['Reporte']['Cruce']);
    $spreadsheet->getActiveSheet()->setCellValue('F'.$linea, $t['Reporte']['Distrito']);
    $spreadsheet->getActiveSheet()->setCellValue('G'.$linea, $t['Reporte']['Administrado_por']);
    $spreadsheet->getActiveSheet()->setCellValue('H'.$linea, $t['Reporte']['Equipo']);
    $spreadsheet->getActiveSheet()->setCellValue('I'.$linea, $t['Reporte']['Detalle']);
    $spreadsheet->getActiveSheet()->setCellValue('J'.$linea, $t['Reporte']['Operador']);
    $spreadsheet->getActiveSheet()->setCellValue('K'.$linea, $t['Reporte']['Estado']);
    $spreadsheet->getActiveSheet()->setCellValue('L'.$linea, $t['Reporte']['Fecha_registro']);
    $spreadsheet->getActiveSheet()->setCellValue('M'.$linea, $t['Reporte']['Fecha_modificado']);
}

$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);

$spreadsheet->getActiveSheet()->getStyle('A1:M1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->setAutoFilter($spreadsheet->getActiveSheet()->calculateWorksheetDimension());

/**$styleArray = [
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
        'bottom'	=> array('borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),
	'right'		=> array('borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM)
    ]
];**/
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        ]
    ]
];


$spreadsheet->getActiveSheet()->getStyle('A1:M'.$linea)->applyFromArray($styleArray);

//Dando nombre a la hoja activa
$spreadsheet->getActiveSheet()->setTitle('Reporte');
//Indicando cual es la hoja activa al abrir Excel
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xls)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte_incidencias.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');
exit;


?>