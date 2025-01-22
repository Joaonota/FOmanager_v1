<?php
require "conexao.php";
// Verifica se o método da solicitação é POST e se o parâmetro 'status' está definido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["status"])) {
    // Conecte-se ao seu banco de dados. Substitua 'host', 'username', 'password' e 'dbname' com suas próprias credenciais.
   

    // Verifica se há erro na conexão
    if ($conexao->connect_error) {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    // Prepara e executa uma declaração preparada para atualizar o status no banco de dados
    $status = $_POST["status"];
 $idobra = $_POST["idobra"];
   
    $sql = "UPDATE obra_andamento SET status = $status WHERE codigo_obra = '$idobra'"; // Substitua 'sua_tabela' pelo nome da sua tabela e 'id' pelo identificador do registro
    if ($conexao->query($sql) === TRUE) {
        echo "Status atualizado com sucesso";
    } else {
        echo "Erro ao atualizar o status: " . $conexao->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>
