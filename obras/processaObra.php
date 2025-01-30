<?php 

require 'conexao.php';
			if (isset($_POST['butao'])) {
				$cliente = $_POST['cliente'];
				$codigo = $_POST['codigo'];
				$id_user = $_POST['id_user'];
				$descricao = $_POST['descricao'];
				$localizacao = $_POST['localizacao'];
				$datai = $_POST['datai'];
				$dataf = $_POST['dataf'];

				#formatacao da data
				$dataI_formatada =date("d-m-Y",strtotime($datai));
				$dataF_formatada =date("d-m-Y",strtotime($dataf));

				#$dif = $dataI_formatada - $dataF_formatada;

				#$difd = floor($dif /(60 * 60 * 24));

				#echo "Falta $difd para terminio da obra";


$mysqdd = mysqli_query($conexao, "INSERT INTO obra (id_user,cliente,codigo,localizacao,descricao,datai,dataf,status,status_apro) VAlues ('$id_user','$cliente','$codigo','$localizacao','$descricao','$dataI_formatada','$dataF_formatada','ativo','espera') ");


	echo "<script>alert('Parabens Os dados fora Inseridos com sucesso')</script>";
                     echo "<script>location='add_obra.php';</script>";


			}

			 ?>