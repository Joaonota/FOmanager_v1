<?php 

require "../db/config.php";
  if (@$_GET['func']== 'deletar' ) {
    $id_d_cola = $_GET['id_d_cola'];

    mysqli_query($conexao, "DELETE FROM colaborador WHERE  id_colaborador ='$id_d_cola'");
 echo "<script>alert('Colaborador Removido com sucesso')</script>";

  echo "<script>location='lista_colaboradores.php';</script>";
  }




   ?>