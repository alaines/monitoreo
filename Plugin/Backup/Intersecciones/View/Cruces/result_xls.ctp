<?php
App::import('Vendor', 'PhpSpreadsheet', array('file' => 'autoload.php'));

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()->setCreator('PROTRANSITO')
    ->setLastModifiedBy('PROTRANSITO')
    ->setTitle('Reporte de intersecciones')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Reporte de consulta de intersecciones semaforizadas de LIMA')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file');

// Agregando Cabeceras
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Nro')
    ->setCellValue('B1', 'Codigo')
    ->setCellValue('C1', 'Intersección')
    ->setCellValue('D1', 'Distrito')
    ->setCellValue('E1', 'Proyecto')
    ->setCellValue('F1', 'Código Proyecto')
    ->setCellValue('G1', 'Administrado por');

$linea = 1;
$contar = 0;
//$cruces = base64_decode($cruces);
foreach ($cruces as $t){
    ++$linea; ++$contar;
    $spreadsheet->getActiveSheet()->setCellValue('A'.$linea, $contar);
    $spreadsheet->getActiveSheet()->setCellValue('B'.$linea, $t['Cruce']['codigo']);
    $spreadsheet->getActiveSheet()->setCellValue('C'.$linea, $t['Cruce']['nombre']);
    $spreadsheet->getActiveSheet()->setCellValue('D'.$linea, $t['Ubigeo']['distrito']);
    $spreadsheet->getActiveSheet()->setCellValue('E'.$linea, $t['Proyecto']['nombre']);
    $spreadsheet->getActiveSheet()->setCellValue('F'.$linea, $t['Cruce']['codigo_anterior']);
    $spreadsheet->getActiveSheet()->setCellValue('G'.$linea, $t['Administradore']['nombre']);
    //$spreadsheet->getActiveSheet()->setCellValue('H'.$linea, $t['Estado']['nombre']);
    
}

$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
//$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

$spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);
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


$spreadsheet->getActiveSheet()->getStyle('A1:G'.$linea)->applyFromArray($styleArray);

//Dando nombre a la hoja activa
$spreadsheet->getActiveSheet()->setTitle('Intersecciones');
//Indicando cual es la hoja activa al abrir Excel
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xls)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte_intersecciones.xls"');
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