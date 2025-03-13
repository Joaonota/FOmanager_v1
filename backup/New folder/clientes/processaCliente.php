  
  <!-- summernote  success, erro,info  -->
  <link rel="stylesheet" href="css/Basic.css">
  <link rel="stylesheet" href="css/FOManager.FOManager.css">
  <link rel="stylesheet" href="css/OutSystemsReactWidgets.css">
  <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.css">
  <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.extra.css">
</head>
<?php 

require "../db/conexao.php";

            if (isset($_POST['butao'])) {

               $nome = $_POST['nome'];
               $morada = $_POST['morada'];
                 $responsavel = $_POST['responsavel'];
                  $descricao = $_POST['descricao'];
                  $status= $_POST['status'];
                   
                  if ($status == 'ativo') {
                    $status = "ativo";
            $mysqladd = mysqli_query($conexao, "INSERT INTO clientes (nome,morada,responsavel,descricao,status) values ('$nome','$morada','$responsavel','$descricao','$status')");
             #echo "<script>location='lista_clientes.php';</script>";
                      // code..bbbb.
                  }else{
                    $status = "inativo";
                    $mysqladd = mysqli_query($conexao, "INSERT INTO clientes (nome,morada,responsavel,descricao,status) values ('$nome','$morada','$responsavel','$descricao','$status')");
echo "<script>alert('Parabens Os dados fora Inseridos com sucesso')</script>";
                     "<script>location='lista_clientes.php';</script>";
                  }


                  
            
}

if ($mysqdd =! '' ) {

  
echo '   <div id="feedbackMessageContainer" class="feedback-message-wrapper">
            <div class="feedback-message feedback-message-success" tabindex="0" role="alert">
                <i></i>
                <div class="feedback-message-text">Parabens Os dados fora Inseridos com sucesso</div>
    </div>
</div>';
sleep(5);
echo "<script>location='lista_clientes.php';</script>";
}else{
  echo '   <div id="feedbackMessageContainer" class="feedback-message-wrapper">
            <div class="feedback-message feedback-message-erro" tabindex="0" role="alert">
                <i></i>
                <div class="feedback-message-text">erro ao inserir os Dado</div>
    </div>
</div>';

}
             ?>