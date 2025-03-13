<?php 
require "../db/config.php";
  if (@$_GET['func']== 'deletar' ) {
    $d = $_GET['d'];

    mysqli_query($conexao, "DELETE FROM clientes WHERE  id_cliente ='$d'");
 
  echo "<script>alert('Cliente Remivido com Sucesso')</script>";

  echo "<script>location='lista_clientes.php';</script>";
  }




   ?>