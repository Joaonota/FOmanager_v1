<?php 




require 'conexao.php';
			if (isset($_POST['butao'])) {
				$codigo_obra = $_POST['codigo_obra'];
				$entrada = $_POST['entrada'];
				$saida = $_POST['saida'];
				$id_colaborador = $_POST['id_colaborador'];

				if ($entrada == "00:00" && $saida == "00:00") {
					$id_colaborador = $_POST['id_colaborador'];
					$myd = mysqli_query($conexao,"select * from obra where codigo = '$codigo_obra'");
					$mdd = mysqli_fetch_assoc($myd);
					$descricao_extra = $mdd['descricao'];

                    $colaborador = $_POST['colaborador'];
                    
                     $entrada_extra = $_POST['entrada_extra'];
                     $saida_extra = $_POST['saida_extra'];

                     $dataAtual = date('d/m/Y');

                

$mysqdd = mysqli_query($conexao, "UPDATE  obra_andamento SET codigo_obra = '$codigo_obra',entrada = '$entrada_extra', saida ='$saida_extra' where id_colaborador = '$id_colaborador'");

    $mysqdd = mysqli_query($conexao, "INSERT INTO hora_extra_obra (codigo_obra_extra,descricao_extra,id_colaborador_extra,colaborador_extra,entrada_extra,saida_extra,entrada,saida,data_marcada) values ('$codigo_obra','$descricao_extra','$id_colaborador','$colaborador','$entrada_extra','$saida_extra','$entrada','$saida','$dataAtual') ");
             echo "<script>alert('Transferencia sussedica')</script>";
    echo "<script>location='detalhe_obra.php?ids_obra=$codigo_obra';</script>";
				}else{

					$myd = mysqli_query($conexao,"select * from obra where codigo = '$codigo_obra'");
					$mdd = mysqli_fetch_assoc($myd);
					$descricao_extra = $mdd['descricao'];

                    $colaborador = $_POST['colaborador'];
                    
                     $entrada_extra = $_POST['entrada_extra'];
                     $saida_extra = $_POST['saida_extra'];

                     $dataAtual = date('d/m/Y');

				
					$mysqdd = mysqli_query($conexao, "UPDATE  obra_andamento SET codigo_obra = '$codigo_obra',entrada = '$entrada', saida ='$saida' where id_colaborador = '$id_colaborador'");

					 $mysqddh = mysqli_query($conexao, "INSERT INTO hora_extra_obra (codigo_obra_extra,descricao_extra,id_colaborador_extra,colaborador_extra,entrada_extra,saida_extra,entrada,saida,data_marcada) values ('$codigo_obra','$descricao_extra','$id_colaborador','$colaborador','$entrada_extra','$saida_extra','$entrada','$saida','$dataAtual') ");


	echo "<script>alert('Transferencia sussedica')</script>";
    echo "<script>location='detalhe_obra.php?ids_obra=$codigo_obra';</script>";

				}
				


				




			}

			 ?>