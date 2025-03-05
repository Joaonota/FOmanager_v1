<?php 
require 'conexao.php';



$Sql_obra = "SELECT * from hora_extra_obra";

$result_obra = mysqli_query($conexao,$Sql_obra);
if ($result_obra ->num_rows >0) {
	while ($row = $result_obra->fetch_assoc()) {
		$obra_id = $row['id_extra'];
		$descri_obra = $row['descricao_extra'];


		$sql_entrada = "SELECT SUM(entrada) AS total_Entrada FROM hora_extra_obra where id_extra ='$obra_id' ";
		$resulta_entrda = mysqli_query($conexao,$sql_entrada);

		$row_entrada= $resulta_entrda->fetch_assoc();
		$total_entrada = $row_entrada['total_Entrada'];


		$sql_saida = "SELECT SUM(saida) AS total_saida FROM hora_extra_obra where id_extra ='$obra_id' ";
		$resulta_saida = mysqli_query($conexao,$sql_saida);

		$row_saida= $resulta_saida->fetch_assoc();
		$total_saida = $row_saida['total_saida'];

		
		$tempo_gasto = $total_saida -$total_entrada;
		
		echo "Obra: $descri_obra\n";
		echo "Entrada: $total_entrada \n";
		echo "Saida: $total_saida \n";
		echo "Total de horas Trabalhas nesta Obra: $tempo_gasto \n";

	}
	// code...
}


 ?>