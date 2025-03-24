<?php 

require "../db/config.php";

if (isset($_POST['butao'])) {
    $cargo = $_POST['cargo'];
    $nome = $_POST['nome'];
    $cell = $_POST['cell'];
    $habilidades = $_POST['habilidades'];
    $custo = $_POST['custo'];

    // Inserção no banco de dados
    $mysqdd = mysqli_query($conexao, "INSERT INTO colaborador (cargo, nome, cell, habilidades, status, custo) values ('$cargo', '$nome', '$cell', '$habilidades', 'ativo', '$custo')");

    if ($mysqdd !== false) { // Verificando se a consulta foi bem-sucedida
        echo ' 
        <div id="feedbackMessageContainer" class="feedback-message-wrapper">
            <div class="feedback-message feedback-message-success" tabindex="0" role="alert">
                <i></i>
                <div class="feedback-message-text">Parabéns! Os dados foram inseridos com sucesso.</div>
            </div>
        </div>';
        echo "<script>setTimeout(function() { location.href = 'add_colaborador.php'; }, 2000);</script>"; // Redireciona após 2 segundos
    } else {
        echo ' 
        <div id="feedbackMessageContainer" class="feedback-message-wrapper">
            <div class="feedback-message feedback-message-error" tabindex="0" role="alert">
                <i></i>
                <div class="feedback-message-text">Erro ao inserir os dados.</div>
            </div>
        </div>';
    }
}
?>
