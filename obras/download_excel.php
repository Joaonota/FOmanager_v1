<?php
// Inclua os arquivos necessários da biblioteca PhpSpreadsheet
require '../vendor/autoload.php';
require '../db/conexao.php'; // Inclua o arquivo que contém a função Conexao()

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

// Conexão com o banco de dados usando a função
$conn = Conexao();
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

$sql = "SELECT 
    hora_extra_obra.id_extra, 
    hora_extra_obra.codigo_obra_extra, 
    hora_extra_obra.descricao_extra,
    hora_extra_obra.colaborador_extra, 
    hora_extra_obra.entrada, 
    hora_extra_obra.saida,
    hora_extra_obra.entrada_extra, 
    hora_extra_obra.saida_extra, 
    hora_extra_obra.data_marcada,
    colaborador.cargo, 
    colaborador.custo, 
    obra.localizacao,
    hora_extra_obra.datatime_extra
FROM hora_extra_obra
JOIN colaborador ON hora_extra_obra.id_colaborador_extra = colaborador.id_colaborador
JOIN obra ON hora_extra_obra.codigo_obra_extra = obra.codigo
ORDER BY hora_extra_obra.datatime_extra DESC";

$result = $conn->query($sql);

// Cria uma nova planilha
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Adiciona os cabeçalhos das colunas
$sheet->setCellValue('A1', 'ID')
      ->setCellValue('B1', 'JOB CARD')
      ->setCellValue('C1', 'DESCRIÇÃO')
      ->setCellValue('D1', 'COLABORADOR')
      ->setCellValue('E1', 'HORA DE ENTRADA')
      ->setCellValue('F1', 'HORA DE SAIDA')
      ->setCellValue('G1', 'HORA DE ALMOÇO')
      ->setCellValue('H1', 'TOTAL DE HORA NORMAL')
      ->setCellValue('I1', 'ENTRADA EXTRA')
      ->setCellValue('J1', 'SAIDA EXTRA')
      ->setCellValue('K1', 'TOTAL DE HORA EXTRA')
      ->setCellValue('L1', 'DATA')
      ->setCellValue('M1', 'CATEGORIA')
      ->setCellValue('N1', 'LOCALIZAÇÃO')
      ->setCellValue('O1', 'CENTRO DE CUSTO');

// Formata os cabeçalhos das colunas
$headerStyle = [
    'font' => [
        'bold' => true,
        'name' => 'New Times Roman'
    ]
];
$sheet->getStyle('A1:O1')->applyFromArray($headerStyle);

// Define a fonte padrão para todo o documento
$defaultFontStyle = [
    'font' => [
        'name' => 'New Times Roman'
    ]
];
$spreadsheet->getDefaultStyle()->applyFromArray($defaultFontStyle);

// Preenche os dados na planilha Excel
if ($result->num_rows > 0) {
    $rowIndex = 2;
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $rowIndex, $row['id_extra'])
              ->setCellValue('B' . $rowIndex, $row['codigo_obra_extra'])
              ->setCellValue('C' . $rowIndex, strtoupper($row['descricao_extra']))
              ->setCellValue('D' . $rowIndex, $row['colaborador_extra'])
              ->setCellValue('E' . $rowIndex, $row['entrada'])
              ->setCellValue('F' . $rowIndex, $row['saida'])
              ->setCellValue('G' . $rowIndex, '1:30')
              ->setCellValue('H' . $rowIndex, '=IF(E' . $rowIndex . '<=F' . $rowIndex . ', TEXT(F' . $rowIndex . '-E' . $rowIndex . ',"hh:mm"), TEXT(1-(E' . $rowIndex . '-F' . $rowIndex . '),"hh:mm"))')
              ->setCellValue('I' . $rowIndex, $row['entrada_extra'])
              ->setCellValue('J' . $rowIndex, $row['saida_extra'])
              ->setCellValue('K' . $rowIndex, '=IF(I' . $rowIndex . '<=J' . $rowIndex . ', TEXT(J' . $rowIndex . '-I' . $rowIndex . ',"hh:mm"), TEXT(1-(I' . $rowIndex . '-J' . $rowIndex . '),"hh:mm"))')
              ->setCellValue('L' . $rowIndex, $row['data_marcada'])
              ->setCellValue('M' . $rowIndex, $row['cargo'])
              ->setCellValue('N' . $rowIndex, $row['localizacao'])
              ->setCellValue('O' . $rowIndex, $row['custo']);

        // Formata as células de hora para o formato hh:mm
        $sheet->getStyle('E' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');
        $sheet->getStyle('F' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');
        $sheet->getStyle('G' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');
        $sheet->getStyle('H' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');
        $sheet->getStyle('I' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');
        $sheet->getStyle('J' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');
        $sheet->getStyle('K' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');

        $rowIndex++;
    }
} else {
    echo "0 resultados encontrados";
}

// Adiciona a linha de totalização
$sheet->setCellValue('H' . $rowIndex, 'TOTAL DE TODAS HORAS NORMAIS')
      ->setCellValue('I' . $rowIndex, '=SUM(H2:H' . ($rowIndex-1) . ')')
      ->setCellValue('K' . $rowIndex, 'TOTAL DE TODAS HORAS EXTRAS')
      ->setCellValue('L' . $rowIndex, '=SUM(K2:K' . ($rowIndex-1) . ')');

// Formata as células de totais para o formato hh:mm
$sheet->getStyle('I' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');
$sheet->getStyle('L' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');

// Formata as células de totais para negrito
$totalStyle = [
    'font' => [
        'bold' => true
    ]
];
$sheet->getStyle('H' . $rowIndex)->applyFromArray($totalStyle);
$sheet->getStyle('I' . $rowIndex)->applyFromArray($totalStyle);
$sheet->getStyle('K' . $rowIndex)->applyFromArray($totalStyle);
$sheet->getStyle('L' . $rowIndex)->applyFromArray($totalStyle);

// Ajusta a largura das colunas automaticamente
foreach (range('A', 'O') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

// Configura o cabeçalho HTTP para download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Obras.xlsx"');
header('Cache-Control: max-age=0');

// Salva o arquivo Excel no buffer de saída
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Fecha a conexão com o banco de dados
$conn->close();
?>
