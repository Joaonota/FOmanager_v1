<!DOCTYPE html>
<html lang="en">
<head>
<?php require "estilo.php" ?>
<title>Lista Dos Clientes</title>
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
            <span style="font-weight: bold;">Lista de Clientes</span>
        </div>
    </h1>
    <div class="header-right" id="b1-HeaderRight">
        <a data-link="" href="add_cliente.php" aria-label="add request">
            <i data-icon="" class="icon fa fa-plus fa-2x"></i>
        </a>
    </div>
</div>
</div>

</div>
<div class="header-top-content ph" id="b1-HeaderContent">
    
</div>
</header>
<div data-container="" class="content" id="b1-ContentWrapper">
    <div data-container="" class="main-content ThemeGrid_Container" role="main" id="b1-MainContentWrapper">
        <div class="content-middle" id="b1-Content">
             <?php 

        $mysqlmostra = mysqli_query($conexao, "SELECT * FROM clientes");
        while ($rows = mysqli_fetch_assoc($mysqlmostra)) {
       



         ?>
            <div data-list="" class="list list-group OSFillParent" style="position: relative;">
                
       

                <div data-list-item="" data-not-scrollable="" class="list-item" id="l1-61_0-ListItem1">
                    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-61_0-$b3">
<div class="vertical-align flex-direction-row" id="l1-61_0-b3-Content">
    <span data-expression="" class="bold ThemeGrid_Width4"><?php echo $rows['nome']; ?></span>
            <span data-expression="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter"><?php echo $rows['morada']; ?></span>
            <span data-expression="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter"><?php echo $rows['responsavel']; ?></span>
            <div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;"><div data-block="Content.Tag" class="OSBlockWidget" id="l1-61_0-$b4">
                <?php 
                if ($rows['status'] == "ativo") {
                 
                 ?>
<div class="tag border-radius-rounded background-primary background-green-lightest text-green-darker OSInline" id="l1-61_25-b4-Tag"><?php echo $rows['status']; ?></div>
<?php } ?>
  <?php 
                if ($rows['status'] == "inativo") {
                 
                 ?>
<div class="tag border-radius-rounded background-primary background-red-lightest text-red-darker OSInline" id="l1-61_25-b4-Tag"><?php echo $rows['status']; ?></div>
<?php } ?>



                
            </div>

        </div>
        <div data-container="" class="ThemeGrid_Width" >
                <a data-link="" href="editar_cliente.php?edita=<?php echo $rows['id_cliente']; ?>">
                    <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 172, 227); font-size: 34px;">
                </i>
            </a>
            </div>
            <div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" height: 34px;">
                    <a data-link="" href="processa_deleta_clinte.php?func=deletar&d=<?php echo $rows['id_cliente']; ?>">
                        <i data-icon="" class="fa fa-trash-o" style="color: rgb(8224, 82, 67); font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
    </div>
</div>
        </div>
<?php } ?>
        </div>
    </div>
</div>
</div>
<footer data-advancedhtml="" role="contentinfo" class="content-bottom">
    <div class="footer ph" id="b1-Bottom">
        <div data-block="Common.BottomBar" class="OSBlockWidget" id="$b6">
            <div data-container="" class="bottom-bar-wrapper">
            <div data-container="" class="bottom-bar ph"></div>
        </div>
    </div>
</div>
</footer>
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
       

       

    
</body>
<script src="js/menusub.js"></script> 
</html>