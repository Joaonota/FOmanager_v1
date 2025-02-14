<?php
require 'vendor/autoload.php';
require '../db/conexao.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Font;

// Conexão com o banco de dados usando a função
$conn = Conexao();
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Consulta SQL para obter os dados filtrados
$obra = $_GET['obra']; // Obtém o valor da URL
$sql = "SELECT DISTINCT hora_extra_obra.id_extra, hora_extra_obra.codigo_obra_extra, hora_extra_obra.descricao_extra, hora_extra_obra.colaborador_extra, hora_extra_obra.entrada, hora_extra_obra.saida, hora_extra_obra.entrada_extra, hora_extra_obra.saida_extra, hora_extra_obra.data_marcada, colaborador.cargo, obra.localizacao 
FROM hora_extra_obra 
JOIN colaborador ON hora_extra_obra.id_colaborador_extra = colaborador.id_colaborador 
JOIN obra ON hora_extra_obra.codigo_obra_extra = obra.codigo 
WHERE codigo_obra_extra = '$obra'";
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
      ->setCellValue('M1', 'CARGO')
      ->setCellValue('N1', 'LOCALIZAÇÃO');

// Formata os cabeçalhos das colunas
$headerStyle = [
    'font' => [
        'bold' => true,
        'name' => 'New Times Roman'
    ]
];
$sheet->getStyle('A1:N1')->applyFromArray($headerStyle);

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
              ->setCellValue('G' . $rowIndex, '1:30') // Hora de almoço fixa
              ->setCellValue('H' . $rowIndex, '=IF(E' . $rowIndex . '<=F' . $rowIndex . ', F' . $rowIndex . '-E' . $rowIndex . ', (F' . $rowIndex . '+1)-E' . $rowIndex . ')')
              ->setCellValue('I' . $rowIndex, $row['entrada_extra'])
              ->setCellValue('J' . $rowIndex, $row['saida_extra'])
              ->setCellValue('K' . $rowIndex, '=IF(I' . $rowIndex . '<=J' . $rowIndex . ', J' . $rowIndex . '-I' . $rowIndex . ', (J' . $rowIndex . '+1)-I' . $rowIndex . ')')
              ->setCellValue('L' . $rowIndex, $row['data_marcada'])
              ->setCellValue('M' . $rowIndex, $row['cargo'])
              ->setCellValue('N' . $rowIndex, $row['localizacao']);
        
        // Formata as células de hora
        $sheet->getStyle('E' . $rowIndex . ':K' . $rowIndex)->getNumberFormat()->setFormatCode('[hh]:mm');

        $rowIndex++;
    }
} else {
    $rowIndex = 2; // Define o índice da linha para a linha de totalização
}

// Adiciona a linha de totalização
$sheet->setCellValue('A' . $rowIndex, '')
      ->setCellValue('B' . $rowIndex, '')
      ->setCellValue('C' . $rowIndex, '')
      ->setCellValue('D' . $rowIndex, '')
      ->setCellValue('E' . $rowIndex, '')
      ->setCellValue('F' . $rowIndex, '')
      ->setCellValue('G' . $rowIndex, '')
      ->setCellValue('H' . $rowIndex, 'TOTAL DE TODAS HORAS NORMAIS')
      ->setCellValue('I' . $rowIndex, '=SUM(H2:H' . ($rowIndex - 1) . ')')
      ->setCellValue('J' . $rowIndex, '')
      ->setCellValue('K' . $rowIndex, 'TOTAL DE TODAS HORAS EXTRAS')
      ->setCellValue('L' . $rowIndex, '=SUM(K2:K' . ($rowIndex - 1) . ')');

// Formata as células de totais para o formato [hh]:mm
$sheet->getStyle('I' . $rowIndex)->getNumberFormat()->setFormatCode('[hh]:mm');
$sheet->getStyle('L' . $rowIndex)->getNumberFormat()->setFormatCode('[hh]:mm');

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
foreach (range('A', 'N') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

// Configura o cabeçalho HTTP para download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Obra_filtrada.xlsx"');
header('Cache-Control: max-age=0');

// Salva o arquivo Excel no buffer de saída
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Fecha a conexão com o banco de dados
$conn->close();
?>
