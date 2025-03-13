<?php
require "../db/config.php";

$resultados_por_pagina = 5;

// Verificar se há um cliente selecionado via POST
$clienteSelecionado = isset($_POST['cliente']) ? $_POST['cliente'] : "";
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$deslocamento = ($pagina - 1) * $resultados_por_pagina;

$myslclinte = mysqli_query($conexao,"SELECT * FROM hora_extra_obra WHERE id_colaborador_extra = '$clienteSelecionado' LIMIT $deslocamento, $resultados_por_pagina");

if ($myslclinte->num_rows > 0) {
    while($row = $myslclinte->fetch_assoc()) {
        $dataformatada = date('d M Y', strtotime($row["data_marcada"]));

        echo '<tr class="table-row">
            <td data-header="">
                
            </td>
            <td data-header="Dia">
                <div style="text-align: center;">
                    <span>'.$dataformatada.'</span>
                </div>
            </td>
            <td data-header="Hora de entrada">
                <div style="text-align: center;">
                    <span>'.$row["entrada"].'</span>
                </div>
            </td>
            <td data-header="Hora de saida">
                <div style="text-align: center;">
                    <span>'.$row["saida"].'</span>
                </div>
            </td>
            <td data-header="Hora de entrada Extra">
                <div style="text-align: center;">
                    <span>'.$row["entrada_extra"].'</span>
                </div>
            </td>
            <td data-header="Hora de saida Extra">
                <div style="text-align: center;">
                    <span>'.$row["saida_extra"].'</span>
                </div>
            </td>
        </tr>';
    }

    // Ícone de PDF fora do loop com melhor posicionamento
    echo '<tr>
            <td colspan="6" style="text-align: center; padding: 15px;">
                <div style="display: inline-block; color: rgb(224, 82, 67);">
                    <a href="relatorio.php?id='.$clienteSelecionado.'" style="color: blue;">
                        <i class="fa fa-file-pdf-o" style="font-size: 40px;"></i>
                    </a>
                </div>
            </td>
          </tr>';
} else {
    echo '<h2 style="text-align: center;">Nenhuma Hora Extra encontrada para este Colaborador.</h2>';
}
?>
