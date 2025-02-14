<?php
require "../db/config.php";

$resultados_por_pagina = 5;

// Verificar se há um cliente selecionado via POST
$clienteSelecionado = isset($_POST['cliente']) ? $_POST['cliente'] : "";
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$deslocamento = ($pagina - 1) * $resultados_por_pagina;

$myslclinte = mysqli_query($conexao,"SELECT * FROM hora_extra_obra WHERE id_colaborador_extra = '$clienteSelecionado' LIMIT $deslocamento, $resultados_por_pagina ");


if ($myslclinte->num_rows > 0) {
    while($row = $myslclinte->fetch_assoc()) {
       $dataformatada = date('d M Y', strtotime($row["data_marcada"] ));

     
     echo '<tr class="table-row">
         <td data-header="">
   <a href="relatorio.php?id='.$row["id_colaborador_extra"].'"  style="text-align: left;" >
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
 <a href="relatorio.php?id='.$row["id_colaborador_extra"].'"  style="text-align: left;" >
  <a href="relatorio.php?id='.$row["id_colaborador_extra"].'"  style="text-align: left;" >
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div data-icon="" class="icon fa fa-file-p fa-2x"><a href="relatorio.php?id='.$row["id_colaborador_extra"].'" data-icon="" class="icon fa fa-fsile-pdf-o fa-2x"></a></div>
    </div>
</div>
</a>
</td>
<td data-header="Dia">
    <div data-container="" style="text-align: right;">
    <span data-expression="">'.$dataformatada.'</span>
</div>
</td>
<td data-header="Hora de entrada">
    <div data-container="" style="text-align: right;">
    <span data-expression="">'.$row["entrada"] .'</span>
</div>
</td>
<td data-header="Hora de saida">
    <div data-container="" style="text-align: right;">
    <span data-expression="">'.$row["saida"] .'</span>
</div>
</td>
<td data-header="Hora de entrada Extra">
    <div data-container="" style="text-align: right;">
    <span data-expression="">'.$row["entrada_extra"] .'</span>
</div>
</td>
<td data-header="Hora de saida Extra">
    <div data-container="" style="text-align: right;">
    <span data-expression="">'.$row["saida_extra"] .'</span>
</div>
</td>
<td data-header="Hora de saida Extra">
    
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="relatorio.php?id='.$row["id_colaborador_extra"].'" style="color:  blue;">
        <i data-icon="" class="fa fa-file-pdf" style="font-size: 34px;">
        </i>
        </a>
</div>

</div>
</td>
</tr>';
}

}else{
    echo '<h2 style="text-align: center;">Nenhuma Hora Extra  encontrada para este Colaborador.</h2>';
}

/*$mysqlcont = mysqli_query($conexao, "SELECT COUNT(*) AS total FROM hora_extra_obra WHERE id_colaborador_extra = '$clienteSelecionado'");

      $rowTotal = $mysqlcont ->fetch_assoc();
      $total_ress = $rowTotal['total'];
      $tatalP = ceil($total_ress/$resultados_por_pagina);
      echo "<div>";
      for ($i=1; $i <= $tatalP ; $i++) { 
          echo '<a class="pagination-button"  href="?pagina='.$i.'">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div data-icon="" class="icon fa fa-file-p fa-2x">'.$i.'</div>
    </div>
</div>
</a>';


      
      echo "</div>";
}*/
?>
