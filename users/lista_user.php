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
<title>Lista Dos Usuarios</title>
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
            <span style="font-weight: bold;">Lista dos Usuarios</span>
        </div>
    </h1>
    <div class="header-right" id="b1-HeaderRight">
        <a data-link="" href="add_users.php" aria-label="add request">
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

        $mysqlmostra = mysqli_query($conexao, "SELECT * FROM acesso");
        while ($rows = mysqli_fetch_assoc($mysqlmostra)) {
       



         ?>
            <div data-list="" class="list list-group OSFillParent" style="position: relative;">
                
       

                <div data-list-item="" data-not-scrollable="" class="list-item" id="l1-61_0-ListItem1">
                    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-61_0-$b3">
<div class="vertical-align flex-direction-row" id="l1-61_0-b3-Content">
    <span data-expression="" class="bold ThemeGrid_Width4"><?php echo $rows['nome']; ?></span>
       <span data-expression="" class="bold ThemeGrid_Width6 ThemeGrid_MarginGutter"><?php echo $rows['apelido']; ?></span>
        <span data-expression="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter"><?php echo $rows['username']; ?></span>
        <span data-expression="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter"><?php echo $rows['cell']; ?></span>
        <span data-expression="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter"><?php echo $rows['painel']; ?></span>
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
        <div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
            <a data-link="" href="edita_user.php?id=<?php echo $rows['id_user']; ?>" aria-label="edit user">
                <i data-icon="" class="icon fa fa-edit fa-2x"></i>
            </a>
        </div>
        <div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left; color: red;">
            <a data-link="" href="delete_user.php?id=<?php echo $rows['id_user']; ?>" aria-label="excluir usuário">
                <i data-icon="" class="icon fa fa-trash fa-2x"></i>
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

