<?php
// Inclua os arquivos necessários da biblioteca PhpSpreadsheet
require '../vendor/autoload.php';
require '../db/conexao.php'; // Inclua o arquivo que contém a função Conexao()

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Conexão com o banco de dados usando a função
$conn = Conexao();
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}
/*
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
ORDER BY CAST(codigo_obra_extra AS INTEGER) ASC";
*/

$sql ="SELECT 
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
ORDER BY hora_extra_obra.data_marcada DESC, CAST(codigo_obra_extra AS SIGNED) ASC;
";
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

// Preenche os dados na planilha de forma incremental
$rowIndex = 2;
while ($row = $result->fetch_assoc()) {
    // Calcule as horas normais e extras diretamente no PHP
    $horaNormal = calculateHours($row['entrada'], $row['saida']);
    $horaExtra = calculateHours($row['entrada_extra'], $row['saida_extra']);
    
    // Adiciona os dados à planilha
    $sheet->setCellValue('A' . $rowIndex, $row['id_extra'])
          ->setCellValue('B' . $rowIndex, $row['codigo_obra_extra'])
          ->setCellValue('C' . $rowIndex, strtoupper($row['descricao_extra']))
          ->setCellValue('D' . $rowIndex, $row['colaborador_extra'])
          ->setCellValue('E' . $rowIndex, $row['entrada'])
          ->setCellValue('F' . $rowIndex, $row['saida'])
          ->setCellValue('G' . $rowIndex, '1:00') // Almoço fixo (ajuste conforme necessário)
          ->setCellValue('H' . $rowIndex, $horaNormal) // Hora normal calculada
          ->setCellValue('I' . $rowIndex, $row['entrada_extra'])
          ->setCellValue('J' . $rowIndex, $row['saida_extra'])
          ->setCellValue('K' . $rowIndex, $horaExtra) // Hora extra calculada
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

    // Incrementar o índice da linha
    $rowIndex++;
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

// Função para calcular a diferença entre duas horas no formato 'hh:mm'
function calculateHours($entrada, $saida) {
    $entradaTime = strtotime($entrada);
    $saidaTime = strtotime($saida);
    
    if ($saidaTime < $entradaTime) {
        $saidaTime += 24 * 60 * 60; // Adiciona 24 horas caso a saída seja menor que a entrada
    }
    
    $diff = $saidaTime - $entradaTime;
    return gmdate("H:i", $diff);
}
?>
