<?php 
require "../db/conexao.php";

if (isset($_POST['butao'])) {
	$id_colaborador_extra = $_POST['id_colaborador_extra'];
	$codigo_obra_extra = $_POST['codigo_obra_extra'];
	$datactual = date("y-m-d");
$data =date("d-m-Y",strtotime($datactual));


		$datactual = date("y-m-d");
$data =date("d-m-Y",strtotime($datactual));

   


	            $codigo_obra_extra = $_POST['codigo_obra_extra'];
	            $descricao_extra = $_POST['descricao_extra'];
				$colaborador_extra = $_POST['colaborador_extra'];
				$entrada_extra = $_POST['entrada_extra'];
				$saida_extra = $_POST['saida_extra'];
				$entrada = $_POST['entrada'];
				$saida = $_POST['saida'];
				//$falta = $_POST['falta'];
				$id_colaborador_extra = $_POST['id_colaborador_extra'];
				//$data_marcada = $_POST['data_marcada'];
				


			$mysupdd = mysqli_query($conexao, "UPDATE obra_andamento  SET saida = '$saida',entrada = '$entrada' WHERE id_colaborador = '$id_colaborador_extra'  ");	

$mysqdd = mysqli_query($conexao, "INSERT INTO hora_extra_obra (codigo_obra_extra,descricao_extra,id_colaborador_extra,colaborador_extra,entrada_extra,saida_extra,entrada,saida,data_marcada) values ('$codigo_obra_extra','$descricao_extra','$id_colaborador_extra','$colaborador_extra','$entrada_extra','$saida_extra','$entrada','$saida','$data') ");

echo "<script>alert('Hora Extra Adicionada com Sucesso')</script>";
                     echo "<script>location='detalhe_obra.php?ids_obra=$codigo_obra_extra';</script>";


	// code...
}



 ?>
