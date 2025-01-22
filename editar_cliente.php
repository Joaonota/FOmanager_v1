<!DOCTYPE html>
<html lang="en">
<head>
<?php  
$edita = $_GET['edita'];

require "estilo.php"; ?>
<title>Editar Clinte</title>
<body>
<div id="reactContainer">
   <div  id="transitionContainer">
    <div class="active-screen screen-container slide-from-right-enter-done">
    <div data-block="Common.Layout" class="OSBlockWidget" id="$b1">
    <div   class="layout layout-side layout-native ios-bounce aside" id="b1-LayoutWrapper">
        <!-- drawer-->
    <?php require "drawer.php" ?>
<h1 data-advancedhtml="" class="header-title">
    <div class="OSInline" id="b1-Title">
    <span style="font-weight: bold;">Editar Cliente</span>
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
        	<?php 
            

            $selecUp = mysqli_query($conexao, "SELECT * from clientes where id_cliente = '$edita'");

            while ($rows2 = mysqli_fetch_assoc($selecUp)) {
                // code...
          


             ?>
            

            <form method="post" action="processa_edita_cliente.php?edita=<?php echo $edita ?>" class="form card OSFillParent" >
                <div data-container="">
                <label data-label="" class="OSFillParent" for="Input_Name">
                    <span style="font-weight: bold;">Nome</span>
                </label>
                <span class="input-text">
                    <input data-input="" name="nome" value="<?php echo $rows2['nome']; ?>" class="form-control OSFillParent" type="text" maxlength="250"  id="Input_Name" wfd-id="id0">
                </span>
            </div>
            <div data-container="">

                <label data-label="" class="OSFillParent" for="Input_Address">
                    <span style="font-weight: bold;">Morada</span>
                </label>
                <span class="input-text">
                    <input data-input="" name="morada" class="form-control OSFillParent" type="text"  maxlength="250"  value="<?php echo $rows2['morada']; ?>" id="Input_Address" wfd-id="id1"></span>
                </div>
                <div data-container="">

                <label data-label="" class="OSFillParent" for="Input_Address">
                    <span style="font-weight: bold;">Responsavel</span>
                </label>
                <span class="input-text">
                    <input data-input="" name="responsavel" class="form-control OSFillParent" type="text"  maxlength="250" id="Input_Address" value="<?php echo $rows2['responsavel']; ?>"   wfd-id="id1"></span>
                </div>
                <div data-container="">
                    <label data-label="" class="OSFillParent" for="TextArea_Description">
                        <span style="font-weight: bold;">Descrição</span>
                    </label>
                    <span>
                        <textarea data-input="" name="descricao" class="form-control OSFillParent" rows="3" maxlength="500" id="TextArea_Description" style="width: 1222px; height: 100px;"><?php echo $rows2['descricao']; ?></textarea>

                    </span>
                </div>
                <div data-container="" >
                    <label data-label="" class="OSFillParent" for="Checkbox1">

                        <span style="font-weight: bold; ">Status</span>

                    </label>
                    <div id="Dropdown4-container" class="dropdown-container" data-dropdown="">
                        <select class="dropdown-display dropdown" name="status"  >
                    <option value="<?php echo $rows2['status']; ?>"><?php echo $rows2['status']; ?></option>
                    <option disabled>========</option>

                            
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                       
                        </select>
                    </div>

                </div>
                <div data-container="" style="margin-top: 20px;">
                    <button data-button="" class="btn" type="button">Voltar</button>
                    <button  data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Guardar</button>
                </div>
            </form>
        <?php } ?>
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
