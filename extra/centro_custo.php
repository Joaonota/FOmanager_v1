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
						<span style="font-weight: bold;">Centro de Custo</span>
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
				
				$descicao = $_POST['descicao'];
				$status = $_POST['status'];

				if (!empty($descicao) && !empty($status)) {
					$mysql = mysqli_query($conexao,"INSERT INTO centro_custo (descicao, status) VALUES ('$descicao', '$status')");
					echo "<script>alert('Centro de Custo Adicionada com sucesso');</script>";
				} else {
					echo "<script>alert('Por favor, preencha todos os campos');</script>";
				}


			}


			 ?>
			<form  method="post"   class="form card OSFillParent" >
				
				<div data-container="">
					<label data-label="" class="OSFillParent" for="Input_Name2">
						<span style="font-weight: bold;">Descricao</span>
					</label>
					<span class="input-text">
						<input data-input="" class="form-control OSFillParent" type="text"  maxlength="250" name="descicao"  wfd-id="id3"></span>
					</div>
					<div data-container="">
					<label data-label="" class="OSFillParent" for="Dropdown4">
						<span style="font-weight: bold;">Status</span>
					</label>
					<div id="Dropdown4-container" class="dropdown-container" data-dropdown="">
						<select class="dropdown-display dropdown" name="status"  >

							<option value="ativo">Ativo</option>
							<option value="inativo">Inativo</option>
						
						</select>
					</div>
				</div>
						<div data-container="" style="margin-top: 20px;">
							
						<button data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Guardar</button>
                  <a data-button="" href="javascript:history.back()" class="btn">Voltar</a>
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
              Status
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
         	$mmm = mysqli_query($conexao,"SELECT * from centro_custo");

         	while ($dados = mysqli_fetch_assoc($mmm)) {
         		// code...
         	

         	 ?>
         <tr class="table-row">
         	
            <td data-header="Dia">
               <div data-container="" style="text-align: right;"><span data-expression=""><?php echo strtoupper($dados['id_custo']);?></span></div>
            </td>
            <td data-header="Hora de entrada">
               <div data-container="" style="text-align: right;"><span data-expression=""><?php echo strtoupper($dados['descicao']);?></span></div>
            </td>
            <td data-header="Hora de entrada">
               <div data-container="" style="text-align: right;"><span data-expression=""><?php echo strtoupper($dados['status']);?></span></div>
            </td>
            <td data-header="Hora de entrada">
               <div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="edita_centro.php?id=<?php echo strtoupper($dados['id_custo']);?>" style="color: red;">
        <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
        </i>
        </a>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="javascript:void(0);" onclick="if(confirm('Tem certeza que deseja deletar este colaborador?')) { window.location.href='processa_deleta_cc.php?func=deletar&d=<?php echo $dados['id_custo']; ?>'; }" style="color: red;">
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
	<div data-container="" class="offline-data-sync">
		<div data-block="Common.OfflineDataSyncEvents" class="OSBlockWidget" id="b1-$b2">
			<div data-block="Private.OfflineDataSyncCore" class="OSBlockWidget" id="b1-b2-$b1">
				<div data-block="Private.NetworkStatusChanged" class="OSBlockWidget" id="b1-b2-b1-$b1">
					<div data-container=""></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
<script src="js/data.js"></script>  
<script src="js/menusub.js"></script>      
</body>
</html>