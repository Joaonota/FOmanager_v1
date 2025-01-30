<?php
// Incluindo a conexão com o banco de dados
include('db/conexao.php');

// Verifique se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Inicializando as variáveis de dados
$total_obras = 0;
$obras_ativas = 0;
$obras_finalizadas = 0;

// Consulta para obter o total de obras
$sql = "SELECT COUNT(*) as total_obras FROM obra";
$result = $conn->query($sql);
if ($result) {
    $total_obras = $result->fetch_assoc()['total_obras'];
} else {
    // Se a consulta falhar, retorne um erro JSON
    echo json_encode(['error' => 'Erro ao buscar total de obras: ' . $conn->error]);
    exit;
}

// Consulta para obter o total de obras ativas
$sql_ativas = "SELECT COUNT(*) as obras_ativas FROM obra WHERE status = 'ativo'";
$result_ativas = $conn->query($sql_ativas);
if ($result_ativas) {
    $obras_ativas = $result_ativas->fetch_assoc()['obras_ativas'];
} else {
    // Se a consulta falhar, retorne um erro JSON
    echo json_encode(['error' => 'Erro ao buscar obras ativas: ' . $conn->error]);
    exit;
}

// Consulta para obter o total de obras finalizadas
$sql_finalizadas = "SELECT COUNT(*) as obras_finalizadas FROM obra WHERE status = 'finalizado'";
$result_finalizadas = $conn->query($sql_finalizadas);
if ($result_finalizadas) {
    $obras_finalizadas = $result_finalizadas->fetch_assoc()['obras_finalizadas'];
} else {
    // Se a consulta falhar, retorne um erro JSON
    echo json_encode(['error' => 'Erro ao buscar obras finalizadas: ' . $conn->error]);
    exit;
}

// Fechar a conexão
$conn->close();

// Retornar os dados em formato JSON
echo json_encode([
    'total_obras' => $total_obras,
    'obras_ativas' => $obras_ativas,
    'obras_finalizadas' => $obras_finalizadas
]);
?>
