<?php
require_once("conexao.php");
if(isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $sql = "DELETE FROM acesso WHERE id_user = '$id_user'";
    $result = mysqli_query($conexao, $sql);
    if($result) {
        echo "Usuário deletado com sucesso.";
        header('Location: lista_user.php');
    } else {
        echo "Erro ao deletar o usuário.";
    }
}
