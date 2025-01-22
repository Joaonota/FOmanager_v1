<?php
require "config.php";

$resultados_por_pagina = 5;

$clienteSelecionado = isset($_POST['cliente']) ? $_POST['cliente'] : "";
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;

// Validar a página
$pagina = max(1, $pagina);
$deslocamento = ($pagina - 1) * $resultados_por_pagina;

// Consultar dados
$query = "SELECT * FROM hora_extra_obra WHERE id_colaborador_extra = '$usuario' AND codigo_obra_extra = '$clienteSelecionado' LIMIT $deslocamento, $resultados_por_pagina";
$myslclinte = mysqli_query($conexao, $query);

// Debug: Verifique a consulta SQL
// echo $query;

if ($myslclinte && $myslclinte->num_rows > 0) {
    while ($row = $myslclinte->fetch_assoc()) {
        // Pegue a data original do banco
        $dataOriginal = $row["data_marcada"];

        // Tente formatar a data com diferentes formatos
        $dataformatada = 'Data inválida'; // Valor padrão

        // Formatos que você deseja tentar
        $formatos = ['d/m/Y', 'd-m-Y', 'Y-m-d', 'Y/m/d'];

        foreach ($formatos as $formato) {
            $data = DateTime::createFromFormat($formato, $dataOriginal);
            if ($data !== false) {
                $dataformatada = $data->format('d M Y');
                break; // Se conseguiu formatar, pare de tentar outros formatos
            }
        }

        echo '<tr class="table-row">
            <td></td>
            <td style="text-align: right;">'.$dataformatada.'</td>
            <td style="text-align: right;">'.$row["entrada"].'</td>
            <td style="text-align: right;">'.$row["saida"].'</td>
            <td style="text-align: right;">'.$row["entrada_extra"].'</td>
            <td style="text-align: right;">'.$row["saida_extra"].'</td>
            <td style="text-align: right;">
                <a href="edita_hora.php?hora='.$row["id_extra"].'&id_d_cola='.$row["id_colaborador_extra"].'" style="color: red;">
                    <i class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;"></i>
                </a>
                <a href="processa_deleta_hora.php?func=deletar&id_hora='.$row["id_extra"].'&id_d_cola='.$row["id_colaborador_extra"].'" style="color: red;">
                    <i class="fa fa-trash-o" style="font-size: 34px;"></i>
                </a>
            </td>
        </tr>';
    }

} else {
    echo '<tr><td colspan="7" style="text-align: center;">Nenhum Dado Encontrado.</td></tr>';
}

// Contagem total de resultados
$queryTotal = "SELECT COUNT(*) AS total FROM hora_extra_obra WHERE id_colaborador_extra = '$usuario' and codigo_obra_extra ='$clienteSelecionado'";
$mysqlcont = mysqli_query($conexao, $queryTotal);

if ($mysqlcont && $mysqlcont->num_rows > 0) {
    $rowTotal = $mysqlcont->fetch_assoc();
    $total_ress = $rowTotal['total'];
    $totalP = ceil($total_ress / $resultados_por_pagina);
    
    echo "<div style='text-align: right;'>";
    for ($i = 1; $i <= $totalP; $i++) {
        echo '<a class="pagination-button" href="?pagina='.$i.'&id_d_cola='.$usuario.'&cliente='.$clienteSelecionado.'">
            <span>'.$i.'</span>
        </a> ';
    }
    echo "</div>";
}
?>
