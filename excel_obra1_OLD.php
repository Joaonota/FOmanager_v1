<?php
// Inclua os arquivos necessários da biblioteca PhpSpreadsheet


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Conexão com o banco de dados
//$conn = new mysqli('localhost', 'root', '', 'fomaneger');
$conn = new mysqli('localhost', 'shisselc_nota', '.8V3hGork=8T', 'sshisselc_fomanager');
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Consulta SQL para obter os dados
$sql = "SELECT * FROM obra";
$result = $conn->query($sql);

// Cria um novo objeto Spreadsheet
$spreadsheet = new Spreadsheet();

// Defina as propriedades do documento
$spreadsheet->getProperties()
    ->setCreator("Seu Nome")
    ->setLastModifiedBy("Seu Nome")
    ->setTitle("Título do Documento")
    ->setSubject("Assunto do Documento")
    ->setDescription("Descrição do Documento")
    ->setKeywords("excel phpspreadsheet php")
    ->setCategory("Categoria do Documento");

// Adicione as colunas com seus respectivos nomes
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'ID')
      ->setCellValue('B1', 'Codigo Da Obra')
      ->setCellValue('C1', 'Descricao')
      ->setCellValue('D1', 'Cliente')
      ->setCellValue('E1', 'Data Inicio Da Obra')
      ->setCellValue('F1', 'Data Terminio Da Obra')
      ->setCellValue('G1', 'Status')
      ->setCellValue('H1', 'Status da Aprovação');

// Preenche os dados na planilha Excel
if ($result->num_rows > 0) {
    $rowIndex = 2;
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A'.$rowIndex, $row['id_obra'])
              ->setCellValue('B'.$rowIndex, $row['codigo'])
              ->setCellValue('C'.$rowIndex, $row['descricao'])
              ->setCellValue('D'.$rowIndex, $row['cliente'])
              ->setCellValue('E'.$rowIndex, $row['datai'])
              ->setCellValue('F'.$rowIndex, $row['dataf'])
              ->setCellValue('G'.$rowIndex, $row['status'])
              ->setCellValue('H'.$rowIndex, $row['status_apro']);
        $rowIndex++;
    }
} else {
    echo "0 resultados encontrados";
}

// Defina o formato do arquivo Excel e faça o download
$filename = "Lista_de_Obras.xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=\"$filename\"");
header('Cache-Control: max-age=0');

// Salva o arquivo Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Fecha a conexão com o banco de dados
$conn->close();
?>
