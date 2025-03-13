<style>
/* Adicionando estilo para permitir o scroll */
body {
    overflow-y: scroll;
}

.pagination {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
    gap: 4px;
}

.pagination a, .pagination .ellipsis {
    color: black;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    margin: 0 2px;
    border-radius: 5px;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {
    background-color: #ddd;
}

.pagination .ellipsis {
    background-color: #f1f1f1;
    color: gray;
    border: none;
    cursor: default;
}

</style>
<?php
require "../db/config.php";

$resultados_por_pagina = 5;

$clienteSelecionado = isset($_POST['cliente']) ? $_POST['cliente'] : "";
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;

// Validar a página
$pagina = max(1, $pagina);
$deslocamento = ($pagina - 1) * $resultados_por_pagina;

// Consulta segura para obter os dados da página atual
$query = "SELECT * FROM hora_extra_obra WHERE id_colaborador_extra = ? AND codigo_obra_extra = ? LIMIT ?, ?";
$stmt = mysqli_prepare($conexao, $query);
mysqli_stmt_bind_param($stmt, "ssii", $usuario, $clienteSelecionado, $deslocamento, $resultados_por_pagina);
mysqli_stmt_execute($stmt);
$myslclinte = mysqli_stmt_get_result($stmt);

// Renderização dos dados da tabela
if ($myslclinte && $myslclinte->num_rows > 0) {
    while ($row = $myslclinte->fetch_assoc()) {
        // Pegue a data original do banco
        $dataOriginal = $row["data_marcada"];
        $dataformatada = date('d M Y', strtotime($dataOriginal));

        echo '<tr class="table-row">
            <td></td>
            <td style="text-align: right;">' . $dataformatada . '</td>
            <td style="text-align: right;">' . $row["entrada"] . '</td>
            <td style="text-align: right;">' . $row["saida"] . '</td>
            <td style="text-align: right;">' . $row["entrada_extra"] . '</td>
            <td style="text-align: right;">' . $row["saida_extra"] . '</td>
            <td style="text-align: right;">
                <a href="edita_hora.php?hora=' . $row["id_extra"] . '&id_d_cola=' . $row["id_colaborador_extra"] . '" style="color: red;">
                    <i class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;"></i>
                </a>
                <a href="processa_deleta_hora.php?func=deletar&id_hora=' . $row["id_extra"] . '&id_d_cola=' . $row["id_colaborador_extra"] . '" style="color: red;">
                    <i class="fa fa-trash-o" style="font-size: 34px;"></i>
                </a>
            </td>
        </tr>';
    }
} else {
    echo '<tr><td colspan="7" style="text-align: center;">Nenhum Dado Encontrado.</td></tr>';
}

// Consulta segura para contar o total de registros
$queryTotal = "SELECT COUNT(*) AS total FROM hora_extra_obra WHERE id_colaborador_extra = ? AND codigo_obra_extra = ?";
$stmtTotal = mysqli_prepare($conexao, $queryTotal);
mysqli_stmt_bind_param($stmtTotal, "ss", $usuario, $clienteSelecionado);
mysqli_stmt_execute($stmtTotal);
$resultTotal = mysqli_stmt_get_result($stmtTotal);

if ($resultTotal && $resultTotal->num_rows > 0) {
    $rowTotal = $resultTotal->fetch_assoc();
    $total_ress = $rowTotal['total'];
    $totalP = ceil($total_ress / $resultados_por_pagina);

  // Renderização da paginação
echo "<div class='pagination' style='text-align: right;'>";

// Botão "Anterior" antes de tudo
if ($pagina > 1) {
    echo '<a href="?pagina=' . ($pagina - 1) . '&id_d_cola=' . $usuario . '&cliente=' . $clienteSelecionado . '">Anterior</a>';
}

$max_links = 10; // Quantidade máxima de links exibidos
$start = max(1, $pagina - floor($max_links / 2));
$end = min($totalP, $pagina + floor($max_links / 2));

if ($start > 1) {
    $activeClass = ($pagina == 1) ? 'active' : '';
    echo '<a class="' . $activeClass . '" href="?pagina=1&id_d_cola=' . $usuario . '&cliente=' . $clienteSelecionado . '">1</a>';
    if ($start > 2) {
        echo "<span class='ellipsis'>...</span>";
    }
}

for ($i = $start; $i <= $end; $i++) {
    $activeClass = ($pagina == $i) ? 'active' : '';
    echo '<a class="' . $activeClass . '" href="?pagina=' . $i . '&id_d_cola=' . $usuario . '&cliente=' . $clienteSelecionado . '">' . $i . '</a>';
}

if ($end < $totalP) {
    if ($end < $totalP - 1) {
        echo "<span class='ellipsis'>...</span>";
    }
    $activeClass = ($pagina == $totalP) ? 'active' : '';
    echo '<a class="' . $activeClass . '" href="?pagina=' . $totalP . '&id_d_cola=' . $usuario . '&cliente=' . $clienteSelecionado . '">' . $totalP . '</a>';
}

// Botão "Próximo"
if ($pagina < $totalP) {
    echo '<a href="?pagina=' . ($pagina + 1) . '&id_d_cola=' . $usuario . '&cliente=' . $clienteSelecionado . '">Próximo</a>';
}
echo "</div>";

}

// Fechando conexões
mysqli_stmt_close($stmt);
mysqli_stmt_close($stmtTotal);
mysqli_close($conexao);
?>
