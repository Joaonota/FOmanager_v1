<?php 
require "conexao.php";

$edita = $_GET['edita'];
if (isset($_POST['butao'])) {
				$nome = $_POST['nome'];
				$descricao = $_POST['descricao'];
				$morada = $_POST['morada'];
				$responsavel = $_POST['responsavel'];
				$status = $_POST['status'];
				



mysqli_query($conexao,"UPDATE clientes SET nome = '$nome', status = '$status',descricao = '$descricao',morada='$morada',responsavel='$responsavel' where id_cliente = '$edita' ");


	echo "<script>alert('Os Dados do Cliente Foram actuliados Com Sucesso')</script>";
                     echo "<script>location='lista_clientes.php';</script>";
}

 ?>
