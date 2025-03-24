<?php require "../int.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link rel="stylesheet" href="css/FOManager.MainFlow.css"-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/script.css">
     <link rel="stylesheet" href="../css/aba.css">
    <link rel="stylesheet" href="../css/Basic.css">
  <link rel="stylesheet" href="../css/FOManager.FOManager.css">
  <link rel="stylesheet" href="../css/OutSystemsReactWidgets.css">
  <link rel="stylesheet" href="../css/OutSystemsUI.OutSystemsUI.css">
  <link rel="stylesheet" href="../css/OutSystemsUI.OutSystemsUI.extra.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../css/brands.min.css">
  <link rel="stylesheet" href="../css/solid.min.css">
  <link rel="stylesheet" href="../css/fontawesome.css">
  <script src="../js/script.js"></script>
<?php require "../estilo.php" ?>
<title>Adicionar Categoria</title>
<body>
<div id="reactContainer">
   <div  id="transitionContainer">
    <div class="active-screen screen-container slide-from-right-enter-done">
    <div data-block="Common.Layout" class="OSBlockWidget" id="$b1">
    <div   class="layout layout-side layout-native ios-bounce aside" id="b1-LayoutWrapper">
        <!-- drawer-->
    <?php require "../drawer.php" ?>

				<h1 data-advancedhtml="" class="header-title">
					<div class="OSInline" id="b1-Title">
						<span style="font-weight: bold;">Nova Categoria Para Colaborador</span>
					</div>
				</h1>
				<div class="header-right" id="b1-HeaderRight"></div>
			</div>
		</div>
	</div>
	<div class="header-top-content ph" id="b1-HeaderContent"></div>
</header>
<div data-container="" class="content" id="b1-ContentWrapper">
	<div data-container="" class="main-content ThemeGrid_Container" role="main" id="b1-MainContentWrapper">
		<div class="content-middle" id="b1-Content">
			<?php 

			if (isset($_POST['butao'])) {
				
				$categoria = trim($_POST['categoria']);

				if (!empty($categoria)) {
					$mysql = mysqli_query($conexao, "INSERT INTO categoria_cola (categoria) VALUES ('$categoria')");
					echo "<script>alert('Categoria adicionada com sucesso');</script>";
				} else {
					echo "<script>alert('O campo categoria não pode estar vazio');</script>";
				}


			}


			 ?>
			<form  method="post"   class="form card OSFillParent" >
				
				<div data-container="">
					<label data-label="" class="OSFillParent" for="Input_Name2">
						<span style="font-weight: bold;">Nome</span>
					</label>
					<span class="input-text">
						<input data-input="" class="form-control OSFillParent" type="text"  maxlength="250" name="categoria"  wfd-id="id3"></span>
					</div>

						<div data-container="" style="margin-top: 20px;">
						<a href="javascript:history.back()" data-button="" class="btn" type="button">Voltar</a>
						<button data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Guardar</button>
						</div>
					</form>
					<div data-container="" style="margin-top: 20px;">
   <table class="table" role="grid">
      <thead>
         <tr class="table-header">
            <th class="sortable" tabindex="0" style="text-align: right; width: 20%;">
               ID
               <div class="sortable-icon"></div>
            </th>
            <th class="sortable" tabindex="0" style="text-align: right; width: 15%;">
              Descrição
               <div class="sortable-icon"></div>
            </th>
            <th class="sortable" tabindex="0" style="text-align: right; width: 15%;">
              Acçoes
               <div class="sortable-icon"></div>
            </th>
         </tr>
      </thead>

      <tbody>
      	<?php
         	$mmm = mysqli_query($conexao,"SELECT * from categoria_cola");

         	while ($dados = mysqli_fetch_assoc($mmm)) {
         		// code...
         	

         	 ?>
         <tr class="table-row">
         	
            <td data-header="Dia">
               <div data-container="" style="text-align: right;"><span data-expression=""><?php echo strtoupper($dados['id_categoria_cola']);?></span></div>
            </td>
            <td data-header="Hora de entrada">
               <div data-container="" style="text-align: right;"><span data-expression=""><?php echo strtoupper($dados['categoria']);?></span></div>
            </td>
            <td data-header="Hora de entrada">
               <div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="edita_categoria.php?id=<?php echo strtoupper($dados['id_categoria_cola']);?>" style="color: red;">
        <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
        </i>
        </a>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="processa_deleta_cate.php?func=deletar&id_cola=<?php echo strtoupper($dados['id_categoria_cola']);?>" style="color: red;">
        <i data-icon="" class="fa fa-trash-o" style="font-size: 34px;">
        </i>
        </a>
</div>
            </td>
        
         </tr>
         <?php } ?>
      </tbody>
   </table>
  
</div>
				</div>
			</div>

		</div>

		
	</div>
	
</div>
</div>
</div>
</div>
</div>
<script src="../js/data.js"></script>  
<script src="../js/menusub.js"></script>      
</body>
</html>