<?php

require "../db/config.php";

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
        echo '
        <div data-container="">
        <label data-label="" class="OSFillParent">Colaborador Selecionado:</label>
<div data-container="" style="text-align: left;">
    <span data-expression="" style="font-weight: bold;">'. strtoupper($row["nome"]). '</span>
</div>
</div>';
       echo '<input data-input="" name="id_colaborador" value="'.$idUser.'"   class="form-control OSFillParent" type="hidden" aria-required="false"  id="id_obra">';
        // Adicione mais campos conforme necessário

      $idss= $row["id_colaborador"];



       echo '<input data-input="" name="colaborador"  class="form-control OSFillParent" type="hidden" aria-required="false" value="'. strtoupper($row["nome"]). '" id="Input_TimeIn3">';
       echo '<input data-input="" name="cell"  class="form-control OSFillParent" type="hidden" aria-required="false" value="'. $row["cell"]. '" id="Input_TimeIn3">';

       

        $sqlctual =mysqli_query($conexao,"SELECT * FROM obra_andamento WHERE id_colaborador = '$idUser'");

        $dar = mysqli_fetch_assoc($sqlctual);
         $codigoobras = $dar['codigo_obra'];
         $horasaida = $dar['saida'];
                

                echo '<div data-container="">
        <label data-label="" class="OSFillParent">Obra Actal do Funcionario: <span data-expression="" style="font-weight: bold;">'.$codigoobras.'</span></label>

</div>';

$listaobra = mysqli_query($conexao,"SELECT * from obra where codigo <>'$codigoobras' AND id_user =$id_user");
 
 $dars = mysqli_fetch_assoc($listaobra);
         $codigoobra = $dars['codigo'];
         $descricao = $dars['descricao'];


echo '<input data-input="" name="id_colaborador" value="'.$idUser.'"   class="form-control OSFillParent" type="hidden" aria-required="false"  id="id_obra">';

         echo '
<div data-container="" style="margin-top: 20px;">
    <label data-label="" class="OSFillParent">
        <span style="font-weight: bold;">Hora Out da obra corrente</span>
    </label>
   
    <span class="input-time">
        <input data-input="" class="form-control OSFillParent" disabled type="time" aria-required="true" value="'.$horasaida.'" id="Input_DateTimeVar5"></span>
      
</div>
';

    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
