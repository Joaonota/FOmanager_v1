<?php 
require "conexao.php";


if (isset($_POST['butao'])) {
	$id_d_cola = $_GET['id_d_cola'];
				$nome = $_POST['nome'];
				$cargo = $_POST['cargo'];
				$cell = $_POST['cell'];
				$habilidades = $_POST['habilidades'];
				$status = $_POST['status'];
				$custo = $_POST['custo'];
				



mysqli_query($conexao,"UPDATE colaborador SET nome = '$nome', cargo = '$cargo',cell='$cell',habilidades='$habilidades',status = '$status', custo = '$custo' where id_colaborador = '$id_d_cola' ");


	echo "<script>alert('Os Dados do Colaborador Foram actuliados Com Sucesso')</script>";
                     echo "<script>location='lista_colaboradores.php';</script>";
}

 ?>
	
	
