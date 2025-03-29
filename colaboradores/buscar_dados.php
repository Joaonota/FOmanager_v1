<?php
require "../int.php"; 
require "../db/config.php";

 $usuario = $_POST['usuario'] ?? '';
$clienteSelecionado = $_POST['colaborador'] ?? '';
$pagina = isset($_POST['pagina']) ? (int)$_POST['pagina'] : 1;
$resultados_por_pagina = 5;
$deslocamento = ($pagina - 1) * $resultados_por_pagina;

// Consulta paginada
$query = "SELECT * FROM hora_extra_obra WHERE id_colaborador_extra = ? AND codigo_obra_extra = ? LIMIT ?, ?";
$stmt = mysqli_prepare($conexao, $query);
mysqli_stmt_bind_param($stmt, "ssii", $usuario, $clienteSelecionado, $deslocamento, $resultados_por_pagina);
mysqli_stmt_execute($stmt);
$myslclinte = mysqli_stmt_get_result($stmt);

// Renderização dos dados da tabela
if ($myslclinte && $myslclinte->num_rows > 0) {
    while ($row = $myslclinte->fetch_assoc()) {
        // Formatação da data
        $dataOriginal = $row["data_marcada"];
        $dataformatada = DateTime::createFromFormat('d/m/Y', $dataOriginal)->format('d M Y');


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

    // Consulta para contar o total de registros
    $query_total = "SELECT COUNT(*) AS total FROM hora_extra_obra WHERE id_colaborador_extra = ? AND codigo_obra_extra = ?";
    $stmt_total = mysqli_prepare($conexao, $query_total);
    mysqli_stmt_bind_param($stmt_total, "ss", $usuario, $clienteSelecionado);
    mysqli_stmt_execute($stmt_total);
    $resultado_total = mysqli_stmt_get_result($stmt_total);
    $total_registros = mysqli_fetch_assoc($resultado_total)['total'];
    $total_paginas = ceil($total_registros / $resultados_por_pagina);

    // Botões de paginação estilizados
    echo '<tr><td colspan="7" style="text-align: center; padding: 10px;">';

    // Botão "Anterior"
    if ($pagina > 1) {
        echo '<button class="btn-page" onclick="carregarDados(' . ($pagina - 1) . ')" style="margin: 0 5px; padding: 10px 15px; border: none; background-color: #f1f1f1; color: #000; border-radius: 5px; cursor: pointer;">Anterior</button> ';
    }

    for ($i = 1; $i <= $total_paginas; $i++) {
        $active = ($i == $pagina) ? 'active' : '';
        echo '<button class="btn-page ' . $active . '" onclick="carregarDados(' . $i . ')" style="margin: 0 5px; padding: 10px 15px; border: none; background-color: ' . ($active ? '#4CAF50' : '#f1f1f1') . '; color: ' . ($active ? '#fff' : '#000') . '; border-radius: 5px; cursor: pointer;">' . $i . '</button> ';
    }

    // Botão "Próximo"
    if ($pagina < $total_paginas) {
        echo '<button class="btn-page" onclick="carregarDados(' . ($pagina + 1) . ')" style="margin: 0 5px; padding: 10px 15px; border: none; background-color: #f1f1f1; color: #000; border-radius: 5px; cursor: pointer;">Próximo</button> ';
    }

    echo '</td></tr>';
    echo '</td></tr>';

} else {
    echo '<tr><td colspan="7" style="text-align: center;">Nenhum Dado Encontrado.</td></tr>';
}
?>