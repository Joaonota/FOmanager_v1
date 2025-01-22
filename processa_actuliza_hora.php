<?php 
require "conexao.php";

$hora = $_GET['hora'];
if (isset($_POST['butao'])) {
				$entrada = $_POST['entrada'];
				$saida = $_POST['saida'];
				$entrada_extra = $_POST['entrada_extra'];
				$saida_extra = $_POST['saida_extra'];
				$datas = $_POST['datas'];
				
				



mysqli_query($conexao,"UPDATE hora_extra_obra SET  saida = '$saida',entrada = '$entrada',entrada_extra='$entrada_extra',saida_extra='$saida_extra', data_marcada = '$datas' where id_extra = '$hora' ");


	echo "<script>alert('Os Dados do Cliente Foram actuliados Com Sucesso')</script>";
                     echo "<script>location='edita_hora.php?hora=$hora';</script>";
}

 ?>
