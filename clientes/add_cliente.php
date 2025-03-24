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
<?php require "../estilo.php"; ?>
<title>Adicionar Clinte</title>
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
    <span style="font-weight: bold;">Novo Cliente</span>
</div>
</h1>
<div class="header-right" id="b1-HeaderRight">
    
</div>
</div>
</div>
</div>
<div class="header-top-content ph" id="b1-HeaderContent">
     
</div>
</header>
<!-- drawer-->
<div data-container="" class="content" id="b1-ContentWrapper">
    <div data-container="" class="main-content ThemeGrid_Container" role="main" id="b1-MainContentWrapper">
        <div class="content-middle" id="b1-Content">
            

            <form method="post" action="processaCliente.php" class="form card OSFillParent" >
                <div data-container="">
                <label data-label="" class="OSFillParent" for="Input_Name">
                    <span style="font-weight: bold;">Nome</span>
                </label>
                <span class="input-text">
                    <input data-input="" name="nome" class="form-control OSFillParent" type="text" maxlength="250"  id="Input_Name" wfd-id="id0">
                </span>
            </div>
            <div data-container="">

                <label data-label="" class="OSFillParent" for="Input_Address">
                    <span style="font-weight: bold;">Morada</span>
                </label>
                <span class="input-text">
                    <input data-input="" name="morada" class="form-control OSFillParent" type="text"  maxlength="250"  id="Input_Address" wfd-id="id1"></span>
                </div>
                <div data-container="">

                <label data-label="" class="OSFillParent" for="Input_Address">
                    <span style="font-weight: bold;">Responsavel</span>
                </label>
                <span class="input-text">
                    <input data-input="" name="responsavel" class="form-control OSFillParent" type="text"  maxlength="250" id="Input_Address" wfd-id="id1"></span>
                </div>
                <div data-container="">
                    <label data-label="" class="OSFillParent" for="TextArea_Description">
                        <span style="font-weight: bold;">Descrição</span>
                    </label>
                    <span>
                        <textarea data-input="" name="descricao" class="form-control OSFillParent" rows="3" maxlength="500" id="TextArea_Description" style="width: 1222px; height: 100px;"></textarea>

                    </span>
                </div>
                <div data-container="" style="padding-left: 57px;">
                    <label data-label="" class="OSFillParent" for="Checkbox1">

                        <span style="font-weight: bold; ">Ativo</span>

                    </label>
                    <span >
                        <input data-checkbox="" name="status" value="ativo" checked class="checkbox" type="checkbox"  id="Checkbox1" wfd-id="id2">
                    </span>

                </div>
                <div data-container="" style="margin-top: 20px;">
                <button data-button="" class="btn btn-secondary float-right ThemeGrid_MarginGutter w-100" type="button" onclick="history.back();">Voltar</button>
                    <button  data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- footer-->
</div>
</div>
</div>
</div> 
</div>

    
</body>
<script src="js/menusub.js"></script> 
</html>
