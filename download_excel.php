<?php
// Inclua a biblioteca PHPExcel
require 'Spout/Autoloader/autoload.php';



use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

// Crie uma nova instância do escritor XLS
$writer = WriterEntityFactory::createXLSXWriter();
//$timenewroman = (new StyleBuilder())->setFontName('Times New Roman')->build();
//$writer->setDefaultRowStyle($timenewroman);

// Inicie o buffer de saída
ob_start();

// Abra uma nova planilha
$writer->openToBrowser('Obras.xlsx');

// Adicione os cabeçalhos HTTP adequados
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Obras.xlsx"');
header('Cache-Control: max-age=0');

// Adicione as colunas com seus respectivos nomes
$writer->addRow(WriterEntityFactory::createRowFromArray(['ID','CODIGO DA OBRA', 'DESCRIÇÃO', 'COLABORADOR', 'HORA DE ENTRADA','HORA DE SAIDA','HORA DE ALMOÇO','TOTAL DE HORA NORAL','ENTRADA EXTRA','SAIDA EXTRA','TOTAL DE HORA EXTRA','DATA']));

// Conecte-se ao seu banco de dados e obtenha os dados
// Substitua 'localhost', 'usuário', 'senha' e 'banco_de_dados' pelos seus próprios dados
//$conn = new mysqli('localhost', 'shisselc_fo', '7&ErZ+cV=E@h', 'shisselc_fo');
$conn = new mysqli('localhost', 'shisselc_nota', '.8V3hGork=8T', 'shisselc_fomanager');
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

$sql = "SELECT * FROM hora_extra_obra";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $writer->addRow(WriterEntityFactory::createRowFromArray([$row['id_extra'], $row['codigo_obra_extra'],strtoupper($row['descricao_extra']), $row['colaborador_extra'], $row['entrada'], $row['saida'], "1:30","=F2-E2",$row['entrada_extra'], $row['saida_extra'],"=J2-I2",$row['data_marcada']]));
    }
} else {
    echo "0 resultados encontrados";
}
$writer->addRow(WriterEntityFactory::createRowFromArray(['', '', '', '', '','','TOTAL DE TODAS HORAS NORMAIS','=SOMA(H2:H3)','','TOTAL DE TODAS HORAS EXTRAS','=SOMA(K2:K3)']));

// Ajuste automaticamente a largura das colunas

// Feche a planilha
$writer->close();

// Limpe o buffer de saída e envie o arquivo para download
ob_end_flush();


?>

