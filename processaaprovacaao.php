<?php 
require "config.php";

if (isset($_POST['butao'])) {
	$idobra = $_GET['idobra'];
	
	mysqli_query($conexao," UPDATE obra SET status_apro ='aprovado' WHERE codigo = '$idobra'");
	echo "<script>alert('Obra Aprovada Com Sucesso')</script>";

  echo "<script type='text/javascript'>window.location.href ='lista_obra.php?id=$id_user';</script>";
}



 ?>

