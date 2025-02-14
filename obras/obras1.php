<?php
require "../db/config.php";

// Verificar se há um cliente selecionado via POST
$clienteSelecionado = isset($_POST['cliente']) ? $_POST['cliente'] : "";
$obrasid = isset($_POST['obrasid']) ? $_POST['obrasid'] : "";






$myslclinte = mysqli_query($conexao,"SELECT cliente,codigo,datai,descricao,datatime FROM obra WHERE cliente = '$clienteSelecionado' ");
//$myslclinte = mysqli_query($conexao,"SELECT cliente,codigo,datai,descricao,datatime FROM obra WHERE cliente = '$clienteSelecionado' and id_user = '$id_user' ");


if ($myslclinte->num_rows > 0) {
    while($row = $myslclinte->fetch_assoc()) {
$codig = $row["codigo"];
        $selea= mysqli_query($conexao,"SELECT status from obra_andamento WHERE codigo_obra = '$codig'");
        $dados1 = mysqli_num_rows($selea);
        if ($dados1 <= 0) {
           
        }else{
          $dados = mysqli_fetch_assoc($selea);
        $status = $dados['status']; 

        if ($status ==  1) {
             $dataformatada = date('j M Y H:i', strtotime($row["datatime"] ));
       echo ' <div data-container="" style="margin-top: 20px;">
    <div data-list="" class="list list-group OSFillParent" style="position: relative;">';
     echo '<a style="color: inherit; text-decoration: none;" href="detalhe_obra.php?ids_obra='.$row["codigo"].'"><div data-list-item="" data-not-scrollable="" class="list-item" id="l2-53_65-ListItem1" style="background:#e4ebe4;">
    <div data-container="" style="text-align: left; font-weight: bold;">
    <span data-expression="" class="OSFillParent">'.$row["codigo"] .'</span></div>
<div data-container="" style="text-align: left;">
    <span data-expression="" class="OSFillParent" style="margin-top: 10px;">'. $row["descricao"] .'</span>
</div>
<div data-container="" style="text-align: left;">
    <span data-expression="" class="OSFillParent" style="margin-top: 10px;">'.$dataformatada.'</span>
</div></a>
</div>';
        
    }
         } 
         $dataformatada = date('j M Y H:i', strtotime($row["datatime"] ));
       echo ' <div data-container="" style="margin-top: 20px;">
    <div data-list="" class="list list-group OSFillParent" style="position: relative;">';
     echo '<a style="color: inherit; text-decoration: none;" href="detalhe_obra.php?ids_obra='.$row["codigo"].'"><div data-list-item="" data-not-scrollable="" class="list-item" id="l2-53_65-ListItem1" s>
    <div data-container="" style="text-align: left; font-weight: bold;">
    <span data-expression="" class="OSFillParent">'.$row["codigo"] .'</span></div>
<div data-container="" style="text-align: left;">
    <span data-expression="" class="OSFillParent" style="margin-top: 10px;">'. $row["descricao"] .'</span>
</div>
<div data-container="" style="text-align: left;">
    <span data-expression="" class="OSFillParent" style="margin-top: 10px;">'.$dataformatada.'</span>
</div></a>
</div>';
        }
        
        

      
        
    }
 else {
    echo "<tr><td colspan='1'>Nenhuma obra encontrada para este cliente.</td></tr>";
}
?>
