<?php 
require "../db/config.php";

$edita = $_GET['edita'];
if (isset($_POST['butao'])) {
	$cliente = $_POST['cliente'];
				$codigo = $_POST['codigo'];
				$descricao = $_POST['descricao'];
				$localizacao = $_POST['localizacao'];
				$datai = $_POST['datai'];
				$dataf = $_POST['dataf'];



mysqli_query($conexao,"UPDATE obra SET codigo = '$codigo', descricao = '$descricao',localizacao='$localizacao',datai='$datai', dataf='$dataf' where codigo = '$edita' ");


	echo "<script>alert('A Obra Foi actuliada sussedica')</script>";
                     echo "<script>location='lista_obra.php?id=$id_user';</script>";
}

 ?>