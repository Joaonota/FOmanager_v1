<?php 
require "../db/config.php";
  if (@$_GET['func']== 'deletar' ) {
    $d = $_GET['d'];

    mysqli_query($conexao, "DELETE FROM centro_custo WHERE  id_custo  ='$d'");
 
  echo "<script>alert('Centro de custo Removido com Sucesso')</script>";

  echo "<script>location='centro_custo.php';</script>";
  }




   ?>