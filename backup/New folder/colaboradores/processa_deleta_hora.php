<?php 
require "../db/config.php";
  if (@$_GET['func']== 'deletar' ) {
    $id_hora = $_GET['id_hora'];
    $id_d_cola = $_GET['id_d_cola'];

    mysqli_query($conexao, "DELETE FROM hora_extra_obra WHERE  id_extra ='$id_hora'");
 
  echo "<script>alert('Cliente Remivido com Sucesso')</script>";

 echo "<script>location='edita_colaborador.php?id_d_cola=$id_d_cola';</script>";
  }




   ?>
