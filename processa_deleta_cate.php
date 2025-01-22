<?php 
require "config.php";
  if (@$_GET['func']== 'deletar' ) {
    $id_cola = $_GET['id_cola'];

    mysqli_query($conexao, "DELETE FROM categoria_cola WHERE  id_categoria_cola ='$id_cola'");
 
  echo "<script>alert('Categoria Remivida com Sucesso')</script>";

 echo "<script>location='add_categoria.php';</script>";
  }




   ?>
