<?php
// Include PHPExcel library
require 'PHPExcel/Classes/PHPExcel.php';

// SharePoint Excel file URL
$excelUrl = 'staszic-my.sharepoint.com/:x:/r/personal/22dsgawrylak_lo01_pl/_layouts/15/Doc.aspx?sourcedoc=%7BC18C47BB-7BA6-49CE-AD99-5FAA9D937079%7D&file=Książka%202.xlsx';

// Load Excel file
$objPHPExcel = PHPExcel_IOFactory::load($excelUrl);

// Get data from the first sheet
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

$data = array();

for ($row = 1; $row <= $highestRow; $row++) {
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    $data[] = $rowData[0];
}

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>