<?php
require 'Spout/Autoloader/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

// Crie uma nova instância do escritor XLS
$writer = WriterEntityFactory::createXLSXWriter();

// Inicie o buffer de saída
ob_start();

// Abra uma nova planilha
$writer->openToBrowser('Lista_de_Obras.xlsx');

// Adicione os cabeçalhos HTTP adequados
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Lista_de_Obras.xlsx"');
header('Cache-Control: max-age=0');

// Adicione as colunas com seus respectivos nomes
$writer->addRow(WriterEntityFactory::createRowFromArray(['ID', 'Codigo Da Obra', 'Descricao', 'Cliente', 'Data Inicio Da Obra', 'Data Terminio Da Obra', 'Status', 'Status da Aprovação']));

// Conecte-se ao seu banco de dados e obtenha os dados
// Substitua 'localhost', 'usuário', 'senha' e 'banco_de_dados' pelos seus próprios dados
$conn = new mysqli('localhost', 'shisselc_fo', '7&ErZ+cV=E@h', 'shisselc_fo');
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

$sql = "SELECT * FROM obra";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $writer->addRow(WriterEntityFactory::createRowFromArray([$row['id_obra'], $row['codigo'], $row['descricao'], $row['cliente'], $row['datai'], $row['dataf'], $row['status'], $row['status_apro']]));
    }
} else {
    echo "0 resultados encontrados";
}

// Ajuste automaticamente a largura das colunas
$columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
foreach ($columns as $column) {
    $writer->getCurrentSheet()->getColumnDimension($column)->setAutoSize(true);
}
// Feche a planilha
$writer->close();

// Limpe o buffer de saída e envie o arquivo para download
ob_end_flush();
?>
