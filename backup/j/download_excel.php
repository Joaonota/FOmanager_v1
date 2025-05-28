<?php
require '../vendor/autoload.php';
require '../db/conexao.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$conn = Conexao();
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Cabeçalhos
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

// Estilo dos cabeçalhos
$headerStyle = [
    'font' => ['bold' => true, 'name' => 'New Times Roman']
];
$sheet->getStyle('A1:O1')->applyFromArray($headerStyle);

$limit = 1000;  // quantidade de linhas por vez
$offset = 0;
$rowIndex = 2;

// LOOP paginado
while (true) {
    $sql = "
        SELECT 
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
        ORDER BY hora_extra_obra.data_marcada DESC, CAST(codigo_obra_extra AS SIGNED) ASC
        LIMIT $limit OFFSET $offset
    ";

    $result = $conn->query($sql);
    if (!$result || $result->num_rows == 0) break;

    while ($row = $result->fetch_assoc()) {
        $horaNormal = calculateHours($row['entrada'], $row['saida']);
        $horaExtra = calculateHours($row['entrada_extra'], $row['saida_extra']);

        $sheet->setCellValue('A' . $rowIndex, $row['id_extra'])
              ->setCellValue('B' . $rowIndex, $row['codigo_obra_extra'])
              ->setCellValue('C' . $rowIndex, strtoupper($row['descricao_extra']))
              ->setCellValue('D' . $rowIndex, $row['colaborador_extra'])
              ->setCellValue('E' . $rowIndex, $row['entrada'])
              ->setCellValue('F' . $rowIndex, $row['saida'])
              ->setCellValue('G' . $rowIndex, '1:00')
              ->setCellValue('H' . $rowIndex, $horaNormal)
              ->setCellValue('I' . $rowIndex, $row['entrada_extra'])
              ->setCellValue('J' . $rowIndex, $row['saida_extra'])
              ->setCellValue('K' . $rowIndex, $horaExtra)
              ->setCellValue('L' . $rowIndex, $row['data_marcada'])
              ->setCellValue('M' . $rowIndex, $row['cargo'])
              ->setCellValue('N' . $rowIndex, $row['localizacao'])
              ->setCellValue('O' . $rowIndex, $row['custo']);

        foreach (['E','F','G','H','I','J','K'] as $col) {
            $sheet->getStyle($col . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');
        }

        $rowIndex++;
    }

    $offset += $limit; // Pega o próximo "bloco" de dados
}

// Totais
$sheet->setCellValue('H' . $rowIndex, 'TOTAL DE TODAS HORAS NORMAIS')
      ->setCellValue('I' . $rowIndex, '=SUM(H2:H' . ($rowIndex - 1) . ')')
      ->setCellValue('K' . $rowIndex, 'TOTAL DE TODAS HORAS EXTRAS')
      ->setCellValue('L' . $rowIndex, '=SUM(K2:K' . ($rowIndex - 1) . ')');

$sheet->getStyle('I' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');
$sheet->getStyle('L' . $rowIndex)->getNumberFormat()->setFormatCode('hh:mm');

$totalStyle = ['font' => ['bold' => true]];
$sheet->getStyle("H$rowIndex:I$rowIndex")->applyFromArray($totalStyle);
$sheet->getStyle("K$rowIndex:L$rowIndex")->applyFromArray($totalStyle);

// Ajustar colunas
foreach (range('A', 'O') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

// Cabeçalhos HTTP
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Obras.xlsx"');
header('Cache-Control: max-age=0');

// Salvar
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Fecha conexão
$conn->close();

// Função auxiliar
function calculateHours($entrada, $saida) {
    $entradaTime = strtotime($entrada);
    $saidaTime = strtotime($saida);
    if (!$entradaTime || !$saidaTime) return "00:00";
    if ($saidaTime < $entradaTime) {
        $saidaTime += 24 * 60 * 60;
    }
    $diff = $saidaTime - $entradaTime;
    return gmdate("H:i", $diff);
}
?>
