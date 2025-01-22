<?php 
require "conexao.php";
  if (@$_GET['func']== 'deletar' ) {
    $id_d_cola = $_GET['id_d_cola'];
    $idobra_exta = $_GET['idobra_exta'];

    mysqli_query($conexao, "DELETE FROM obra_andamento WHERE  id_colaborador ='$id_d_cola'");
 echo "<script>alert('Colaborador Removido com sucesso da Obra')</script>";

  echo "<script>location='detalhe_obra.php?ids_obra=$idobra_exta';</script>";
  }




   ?>