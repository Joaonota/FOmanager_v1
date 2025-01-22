<?php
require 'Spout/Autoloader/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

// Crie uma nova instância do escritor XLSX
$writer = WriterEntityFactory::createXLSXWriter();

// Abra uma nova planilha
$writer->openToFile('Lista_de_Obras.xlsx');
$writer ->openToBrowser('Lista_de_Obras.xlsx');

// Adicione as colunas com seus respectivos nomes
$writer->addRow(WriterEntityFactory::createRowFromArray(['ID', 'Codigo Da Obra', 'Descricao', 'Cliente', 'Data Inicio Da Obra', 'Data Terminio Da Obra', 'Status', 'Status da Aprovação']));

// Conecte-se ao seu banco de dados e obtenha os dados
// Substitua 'localhost', 'usuário', 'senha' e 'banco_de_dados' pelos seus próprios dados
$conn = new mysqli('localhost', 'root', '', 'fomaneger');
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
$writer->getCurrentSheet()->getColumnIterator()->rewind();
foreach ($writer->getCurrentSheet()->getColumnIterator() as $column) {
    $column->setAutoSize(true);
}
// Feche a planilha
$writer->close();

echo "Arquivo Excel criado com sucesso!";
?>
