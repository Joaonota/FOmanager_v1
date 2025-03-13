<?php 
require "../db/config.php";

$ids_obra = $_GET['ids_obra'];



mysqli_query($conexao,"UPDATE obra SET status = 'inativo' where codigo = '$ids_obra' ");


	echo "<script>alert('A Obra Foi actuliada sussedica')</script>";
                     echo "<script>location='lista_obra.php?id=$id_user';</script>";


 ?>