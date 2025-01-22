<?php 
require "config.php";
  if (@$_GET['func']== 'deletar' ) {

    $ido = $_GET['ido'];

    mysqli_query($conexao, "DELETE FROM obra WHERE  id_obra ='$ido'");
 echo "<script>alert('Obra Removida com sucesso ')</script>";

  echo "<script>location='lista_obra.php?id=$id_user';</script>";
  }




   ?>