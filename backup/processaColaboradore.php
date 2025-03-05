<head>
  
  <!-- summernote  success, erro,info  -->
  <link rel="stylesheet" href="css/Basic.css">
  <link rel="stylesheet" href="css/FOManager.FOManager.css">
  <link rel="stylesheet" href="css/OutSystemsReactWidgets.css">
  <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.css">
  <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.extra.css">
</head>
<?php 
require 'conexao.php';
			if (isset($_POST['butao'])) {
				$cargo = $_POST['cargo'];
				$nome = $_POST['nome'];
				$cell = $_POST['cell'];
				$habilidades = $_POST['habilidades'];
		$custo = $_POST['custo'];
				

$mysqdd = mysqli_query($conexao, "INSERT INTO colaborador (cargo,nome,cell,habilidades,status,custo) values ('$cargo','$nome','$cell','$habilidades','ativo','$custo') ");
if ($mysqdd =! '' ) {

	
echo '	 <div id="feedbackMessageContainer" class="feedback-message-wrapper">
            <div class="feedback-message feedback-message-success" tabindex="0" role="alert">
                <i></i>
                <div class="feedback-message-text">Parabens Os dados fora Inseridos com sucesso</div>
    </div>
</div>';
sleep(5);
echo "<script>location='add_colaborador.php';</script>";
}else{
	echo '	 <div id="feedbackMessageContainer" class="feedback-message-wrapper">
            <div class="feedback-message feedback-message-erro" tabindex="0" role="alert">
                <i></i>
                <div class="feedback-message-text">erro ao inserir os Dado</div>
    </div>
</div>';

}


	#echo "<script>alert('Parabens Os dados fora Inseridos com sucesso')</script>";
         


			}

			 ?>

			