<?php
// Inicia o buffer de saída
ob_start();

// Inicia a sessão
session_start();
require "conexao.php";

// Verificar se as variáveis de sessão estão definidas e não estão vazias
if (empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['nome']) || empty($_SESSION['apelido'])) {
    header("Location: ../index.php");
    exit;
}

// Atribuir variáveis de sessão a variáveis locais
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$nome = $_SESSION['nome'];
$apelido = $_SESSION['apelido'];
$painel = $_SESSION['painel'] ?? ''; // Adiciona verificação para evitar warnings
$id_user = $_SESSION['id_user'] ?? 0; // Adiciona verificação para evitar warnings

// Verificar se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Usar prepared statement para evitar SQL Injection
$sqlconfi = $conexao->prepare("SELECT * FROM acesso WHERE username = ? AND password = ?");
if (!$sqlconfi) {
    die("Erro ao preparar statement: " . $conexao->error);
}

$sqlconfi->bind_param("ss", $username, $password); // 'ss' para strings
$sqlconfi->execute();
$result = $sqlconfi->get_result();

// Verificar se o usuário ainda existe no banco
if ($result->num_rows === 0) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Fechar o statement para liberar recursos
$sqlconfi->close();

// Lógica para logout
if (isset($_GET['pg']) && $_GET['pg'] === 'sair') {
    session_destroy();
    header("Location: ../index.php");
    exit;
}

// Lógica para quebra de sessão
if (isset($_GET['acao']) && $_GET['acao'] === 'quebra') {
    session_destroy();
    header("Location: ../index.php");
    exit;
}
?>
