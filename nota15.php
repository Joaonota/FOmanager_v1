<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'shisselc_fomanager';
$username = 'shisselc_nota';
$password = '.8V3hGork=8T';



// Conectar ao banco de dados MySQL
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Ler o arquivo Excel
$inputFileName = 'cola.xlsx';
$spreadsheet = IOFactory::load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();

// Iterar sobre as linhas da planilha
foreach ($worksheet->getRowIterator() as $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);

    // Pegar dados da primeira coluna (A)
    $dado = $worksheet->getCell('A' . $row->getRowIndex())->getValue();

    // Inserir dado na tabela do MySQL
    $stmt = $pdo->prepare("INSERT INTO colaborador (nome) VALUES (:dado)");
    $stmt->bindParam(':dado', $dado);
    $stmt->execute();
}

echo "Dados importados com sucesso!";
?>
