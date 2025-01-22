<!DOCTYPE html>
<html lang="en">
<head>
<?php require "estilo.php"; ?>
<title>Adicionar Categoria</title>
<body>
<div id="reactContainer">
   <div  id="transitionContainer">
    <div class="active-screen screen-container slide-from-right-enter-done">
    <div data-block="Common.Layout" class="OSBlockWidget" id="$b1">
    <div   class="layout layout-side layout-native ios-bounce aside" id="b1-LayoutWrapper">
        <!-- drawer-->
    <?php 

    $id= $_GET['id'];
    require "drawer.php"; ?>

				<h1 data-advancedhtml="" class="header-title">
					<div class="OSInline" id="b1-Title">
						<span style="font-weight: bold;">Actualizar Categoria Para Colaborador</span>
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
				
				$categoria = $_POST['categoria'];

				$mysql = mysqli_query($conexao,"UPDATE categoria_cola set categoria = '$categoria' where id_categoria_cola = '$id'");
				echo "<script>alert('categoria Adicionada  com sucesso');</script>";


			}


			 ?>
			<form  method="post"   class="form card OSFillParent" >
				
				<div data-container="">
					<label data-label="" class="OSFillParent" for="Input_Name2">
						<span style="font-weight: bold;">Nome</span>
					</label>
					<?php
         	$mmm = mysqli_query($conexao,"SELECT * from categoria_cola WHERE id_categoria_cola = '$id'");

         	while ($dados = mysqli_fetch_assoc($mmm)) {
         
         	 ?>
					<span class="input-text">
						<input data-input="" value="<?php echo strtoupper($dados['categoria']);?>" class="form-control OSFillParent" type="text"  maxlength="250" name="categoria"  wfd-id="id3"></span>
					</div>
				<?php } ?>

						<div data-container="" style="margin-top: 20px;">
							<a href="add_categoria.php" data-button="" class="btn" type="button">Voltar</a>
						<button data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Guardar</button>
						</div>
					</form>