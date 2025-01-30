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
<?php require "../estilo.php"; ?>
<title>Adicionar Colaborador</title>
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
        <span style="font-weight: bold;">Novo Colaborador</span>
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
            
            
            <form  method="post" action="processaColaboradore.php"  class="form card OSFillParent" >
                <div data-container="">
                    <label data-label="" class="OSFillParent" for="Dropdown3">
                        <span style="font-weight: bold;">Categoria do Colaborador</span>
                    </label>
                    <div id="Dropdown3-container" class="dropdown-container" data-dropdown="">
                       
                        <select name="cargo" class="dropdown-display dropdown" >
                             <?php   
                        $sqlola = mysqli_query($conexao,"SELECT * FROM categoria_cola");

                        while ($rows = mysqli_fetch_assoc($sqlola)) {
                            // code...
                     

                         ?>
                <option value="<?php echo $rows['categoria']; ?>"><?php echo $rows['categoria']; ?></option>
                            <?php  } ?>
                        </select>
                          
                    </div>
                </div>
                <div data-container="">
                    <label data-label="" class="OSFillParent" for="Dropdown3">
                        <span style="font-weight: bold;">Centro de Custo</span>
                    </label>
                    <div id="Dropdown3-container" class="dropdown-container" data-dropdown="">
                       
                        <select name="custo" class="dropdown-display dropdown" >
                             <?php   
                        $sqlola = mysqli_query($conexao,"SELECT * FROM centro_custo");

                        while ($rows = mysqli_fetch_assoc($sqlola)) {
                            // code...
                     

                         ?>
                <option value="<?php echo $rows['descicao']; ?>"><?php echo $rows['descicao']; ?></option>
                            <?php  } ?>
                        </select>
                          
                    </div>
                </div>
                <div data-container="">
                    <label data-label="" class="OSFillParent" for="Input_Name">
                        <span style="font-weight: bold;">Nome do Colaborador</span>
                    </label>
                    <span class="input-text">
                        <input data-input="" class="form-control OSFillParent" type="text" maxlength="250" name="nome" ></span>
                    </div>
                    <div data-container="">
                        <label data-label="" class="OSFillParent" for="Input_Phone">
                            <span style="font-weight: bold;">Nr. Funcionario</span>
                        </label>
                        <span class="input-tel">
                            <input data-input="" name="cell" class="form-control OSFillParent" type="number"  maxlength="9"  >
                        </span>
                        </div>
                        <div data-container="">
                            <label data-label="" class="OSFillParent" for="TextArea_Bio">
                                <span style="font-weight: bold;">Habilidades</span>
                            </label>
                            <span>
                <textarea data-textarea="" name="habilidades" class="form-control OSFillParent" rows="3" maxlength="500" >
                    
                </textarea>
            </span>
        </div>
        <div data-container="">
        <label data-label="" class="OSFillParent" for="Checkbox1">Activo</label>
        <span><input data-checkbox="" class="checkbox" type="checkbox" id="Checkbox1"></span>
        </div>
        <div data-container="" style="margin-top: 20px;">
        <button data-button="" class="btn btn-secondary float-right ThemeGrid_MarginGutter w-100" type="button" onclick="history.back();">Voltar</button>
            <button data-button="" name="butao" class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </form>
   
      


  
</body>
<script src="js/menusub.js"></script> 
</html>