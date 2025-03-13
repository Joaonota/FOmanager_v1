<?php
require '../vendor/autoload.php';
require '../db/conexao.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Crie uma nova planilha
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Adicione as colunas com seus respectivos nomes
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Cargo');
$sheet->setCellValue('C1', 'Nome');
$sheet->setCellValue('D1', 'Numero De Telefone');
$sheet->setCellValue('E1', 'Habilidades');
$sheet->setCellValue('F1', 'Status');


$conn = Conexao();
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

$sql = "SELECT * FROM colaborador";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rowNumber = 2; // Começar da segunda linha porque a primeira linha são os cabeçalhos
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $rowNumber, $row['id_colaborador']);
        $sheet->setCellValue('B' . $rowNumber, $row['cargo']);
        $sheet->setCellValue('C' . $rowNumber, $row['nome']);
        $sheet->setCellValue('D' . $rowNumber, $row['cell']);
        $sheet->setCellValue('E' . $rowNumber, $row['habilidades']);
        $sheet->setCellValue('F' . $rowNumber, $row['status']);
        $rowNumber++;
    }
} else {
    echo "0 resultados encontrados";
}

// Ajuste automaticamente a largura das colunas
foreach(range('A', 'F') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

// Defina os cabeçalhos HTTP adequados
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Lista_de_Obras.xlsx"');
header('Cache-Control: max-age=0');

// Crie o escritor do Excel e envie para o navegador
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

$conn->close();
?>
