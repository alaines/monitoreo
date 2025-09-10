<?php
App::import('Vendor', 'PhpSpreadsheet', array('file' => 'autoload.php'));

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()->setCreator('Maarten Balliauw')
    ->setLastModifiedBy('Maarten Balliauw')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file');

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
    ->setCellValue('M1', 'Fecha ultimo Estado')
    ->setCellValue('N1', 'Día')
    ->setCellValue('O1', 'Mes')
    ->setCellValue('P1', 'Año');

$linea = 1;
$contar = 0;
foreach ($tickets as $t){
    ++$linea; ++$contar;
    $spreadsheet->getActiveSheet()->setCellValue('A'.$linea, $contar);
    $spreadsheet->getActiveSheet()->setCellValue('B'.$linea, $t['Ticket']['id']);
    $spreadsheet->getActiveSheet()->setCellValue('C'.$linea, $t['Incidencia']['ParentIncidencia']['tipo']);
    $spreadsheet->getActiveSheet()->setCellValue('D'.$linea, $t['Incidencia']['tipo']);
    $spreadsheet->getActiveSheet()->setCellValue('E'.$linea, $t['Cruce']['codigo'] . " - " . $t['Cruce']['nombre']);
    $spreadsheet->getActiveSheet()->setCellValue('F'.$linea, $t['Cruce']['Ubigeo']['distrito']);
    $spreadsheet->getActiveSheet()->setCellValue('G'.$linea, $t['Cruce']['Administradore']['nombre']);
    $spreadsheet->getActiveSheet()->setCellValue('H'.$linea, $t['Equipo']['nombre']);
    $spreadsheet->getActiveSheet()->setCellValue('I'.$linea, $t['Ticket']['descripcion']);
    $spreadsheet->getActiveSheet()->setCellValue('J'.$linea, $t['Ticket']['usuario_registra']);
    $spreadsheet->getActiveSheet()->setCellValue('K'.$linea, $t['Estado']['nombre']);
    $spreadsheet->getActiveSheet()->setCellValue('L'.$linea, $t['Ticket']['created']);
    $spreadsheet->getActiveSheet()->setCellValue('M'.$linea, $t['Ticket']['modified']);
    $spreadsheet->getActiveSheet()->setCellValue('N'.$linea, $t['Ticket']['dia']);
    $spreadsheet->getActiveSheet()->setCellValue('O'.$linea, $t['Ticket']['mes']);
    $spreadsheet->getActiveSheet()->setCellValue('P'.$linea, $t['Ticket']['anho']);
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
$spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);

$spreadsheet->getActiveSheet()->getStyle('A1:P1')->getFont()->setBold(true);
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


$spreadsheet->getActiveSheet()->getStyle('A1:P'.$linea)->applyFromArray($styleArray);

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