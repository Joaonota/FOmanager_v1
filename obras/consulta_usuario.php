<?php
 require "../int.php"; 
require "../db/conexao.php";

// Verifica a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Obter o ID do usuário enviado via POST
$idUser = $_POST['id'];

// Consulta ao banco de dados com o ID do usuário
$sql = "SELECT * FROM colaborador WHERE id_colaborador = $idUser";
$result = $conexao->query($sql);

// Exibindo os resultados da consulta
if ($result->num_rows > 0) {
    // Exiba os dados do usuário
    while($row = $result->fetch_assoc()) {
        echo '<span data-expression=""  style="font-size: 16px; font-weight: bold;">'. strtoupper($row["nome"]). '</span>';
       echo '<input data-input="" name="id_colaborador" value="'.$idUser.'"   class="form-control OSFillParent" type="hidden" aria-required="false"  id="id_obra">';
       echo '<input data-input="" name="id_colaborador_extra" value="'.$idUser.'"   class="form-control OSFillParent" type="hidden" aria-required="false"  id="id_obra">';
        // Adicione mais campos conforme necessário

      $idss=  $row["id_colaborador"];



       echo '<input data-input="" name="colaborador"  class="form-control OSFillParent" type="hidden" aria-required="false" value="'. strtoupper($row["nome"]). '" id="Input_TimeIn3">';
       echo '<input data-input="" name="cell"  class="form-control OSFillParent" type="hidden" aria-required="false" value="'. $row["cell"]. '" id="Input_TimeIn3">';

       
        #$id = $_GET['id'];
        $sqlverfica = mysqli_query($conexao,"select * from obra_andamento where id_colaborador = '$idss' ");

        if (mysqli_num_rows($sqlverfica)> 0) {
            echo ' <button data-toggle="modal" type="button" data-target="#exampleModaltra" data-iduser="'.$idss.'" >
                    <i data-icon="" class="icon fa fa-exchange fa-2x" style="color: rgb(78, 213, 85);">
                     </i>
                </a>';
            
        }else{
            echo '<div data-container="" class="ThemeGrid_Width5 ThemeGrid_MarginGutter" style="text-align: right;">
            <i data-icon="" class="icon fa fa-exchange fa-2x" style="color: rgb(191, 191, 191); font-size: 32px;"></i>
        </div>';
            

           

        }

        
                
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
