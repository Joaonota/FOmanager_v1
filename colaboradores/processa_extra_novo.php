<?php 
require "../db/conexao.php";

if (isset($_POST['butao'])) {
	$codigo_obra_extra = $_POST['codigo_obra_extra'];
	$sss = mysqli_query($conexao,"select * from obra where codigo = '$codigo_obra_extra'");
	$dados = mysqli_fetch_assoc($sss);
	$descricao_extra = $dados['descricao'];
	$datas = $_POST['datas'];
$data =date("d/m/Y",strtotime($datas));

   


	            $codigo_obra_extra = $_POST['codigo_obra_extra'];
				$colaborador_extra = $_POST['colaborador_extra'];
				$entrada_extra = $_POST['entrada_extra'];
				$saida_extra = $_POST['saida_extra'];
				$entrada = $_POST['entrada'];
				$saida = $_POST['saida'];
				$id_colaborador_extra = $_POST['id_colaborador_extra'];
				//$data_marcada = $_POST['data_marcada'];
				


				

$mysqdd = mysqli_query($conexao, "INSERT INTO hora_extra_obra (codigo_obra_extra,descricao_extra,id_colaborador_extra,colaborador_extra,entrada_extra,saida_extra,entrada,saida,data_marcada) values ('$codigo_obra_extra','$descricao_extra','$id_colaborador_extra','$colaborador_extra','$entrada_extra','$saida_extra','$entrada','$saida','$data') ");
}

if ($mysqdd =='' ) {
	echo "<script>alert('Erro')</script>";
                     echo "<script>location='edita_colaborador.php?id_d_cola=$id_colaborador_extra';</script>";
}else{
	echo "<script>alert('Hora Extra Adicionada com Sucesso')</script>";
                     echo "<script>location='edita_colaborador.php?id_d_cola=$id_colaborador_extra';</script>";
}

 ?>