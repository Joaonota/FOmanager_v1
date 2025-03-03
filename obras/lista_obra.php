<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Lista de Obras</title>
    <meta name="description" content="OutSystems Reactive Web Application">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Obras</title>
<head >
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

<style>
/* Adicionando estilo para permitir o scroll */
body {
    overflow-y: scroll;
}

.pagination {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
            border-radius: 5px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        .pagination .ellipsis {
            padding: 8px 16px;
            text-decoration: none;
            color: black;
        }
</style>

</head>
<body>

<?php if (@$painel == "staff") {
      require "../staff.php";
    }elseif ($painel == "basic") {
        require "../basic.php";
    } else {

     ?>
<div>
   <div  id="transitionContainer">
    <div class="active-screen screen-container slide-from-right-enter-done">
    <div data-block="Common.Layout" class="OSBlockWidget" id="$b1">
    <div   class="layout layout-side layout-native ios-bounce aside" id="b1-LayoutWrapper">
        <!-- drawer-->
    <?php require "../drawer.php"; ?>
            <h1 data-advancedhtml="" class="header-title">

            <div class="OSInline" id="b1-Title">
                <span style="font-weight: bold;">Lista de Obras</span>
            </div></h1><div class="header-right" id="b1-HeaderRight"><a data-link="" href="add_obra.php" aria-label="add request"><i data-icon="" class="icon fa fa-plus fa-2x"></i></a></div></div></div></div>
            <div class="header-top-content ph" id="b1-HeaderContent">
    <div data-button-group="" class="button-group OSFillParent" role="radiogroup" aria-activedescendant="ButtonGroupItem2" id="ButtonGroup1">
        <div>
            <button data-button-group-item="" class="button-group-item" aria-checked="false" role="radio" id="ButtonGroupItem1" onclick="changeTab('tab1', this)">Todos</button>
            <button data-button-group-item="" class="button-group-item" aria-checked="true" role="radio" id="ButtonGroupItem2" onclick="changeTab('tab2', this)">Activos</button>
            <button data-button-group-item="" class="button-group-item" aria-checked="false" role="radio" id="ButtonGroupItem3" onclick="changeTab('tab3', this)">Inactivos</button>
        </div>
    </div>
    <div class="nav-bar" id="navBar"></div>
</div>
</header>
<div data-container="" class="content" id="b1-ContentWrapper">
    <div data-container="" class="main-content ThemeGrid_Container" role="main" id="b1-MainContentWrapper">
        <div class="content-middle" id="b1-Content">
            <div data-container="" style="text-align: right; margin-top: 20px;">
                <div data-container="" class="ThemeGrid_Width2" style="text-align: right;">
                    <div data-block="DownloadFlow.Download" class="OSBlockWidget" id="$b4"><span hidden="">&lt;Download&gt;</span>
                    </div>
                    <a data-link="" class="ThemeGrid_MarginGutter" href="lista_de_obras_excel.php">
                        <i data-icon="" class="icon fa fa-file-excel-o fa-2x"></i>
                    </a>
                </div>
                <div data-container="" class="ThemeGrid_Width5 ThemeGrid_MarginGutter" style="text-align: right; margin-bottom: 20px;">
                    <div data-block="Interaction.InputWithIcon" class="OSBlockWidget" id="$b5">
                        <div data-container="" class="input-with-icon " id="b5-InputWithIconWrapper">
                            <div class="input-with-icon-content-icon center ph" id="b5-Icon"><i data-icon="" class="icon fa fa-search fa-1x"></i>
                            </div>
                            <div class="input-with-icon-input" id="b5-Input">
                <div data-block="Interaction.Search" class="OSBlockWidget" id="$b6">
                    <div data-container="" class="search  " role="search">

                        <div class="search-input" id="b6-Input">
                <span class="input-search">
            <input data-input="" class="form-control ThemeGrid_Width5" type="text" placeholder="Procurar obra"  id="searchInput"></span>
        </div>
        <div data-container="" class="search-glass" style="cursor: pointer;">
            <div data-container="" class="search-stick-bottom"></div>
            <div data-container="" class="search-round"></div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

 <div  id="searchResults">
    <div id="initialData">

 <div data-block="Content.Accordion" id="tab2" class="tab-content active">
    
<?php 
$limite = 20;
$pagina= isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $limite;
@$id = $_GET['id'];
 $mysqlshow = mysqli_query($conexao,"SELECT  * FROM obra where status = 'ativo' LIMIT $inicio,$limite ");
while ($rows= mysqli_fetch_assoc($mysqlshow)) {
                       // code...
                   


                    ?>

<div data-list-item="" class="list-item" id="l1-30_0-ListItem1" style="background-color: white; padding: 10px;">
    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-30_0-$b7">
        <div class="vertical-align flex-direction-row" id="l1-30_0-b7-Content">
            <span data-expression="" class="bold ThemeGrid_Width3"><?php echo $rows['codigo']; ?></span>
            <span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['descricao']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['datai']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['dataf']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['cliente']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['localizacao']); ?></span>

<?php if ($rows['status_apro'] == "aprovado"){

?>
    

<a onclick="mostrapofinaliza()"  href="lista_obra.php?obra_id=<?php echo $rows['id_obra']; ?>">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-green-lightest text-green-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
</div>
</a>

<br>
<?php }elseif ($rows['status_apro'] == "finalizado") {
    // code...

?>

<a onclick="mostrapovalida()" href="lista_obra.php?obra=<?php echo $rows['codigo']; ?>">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-grey-lightest text-grey-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
</div>
<?php }elseif ($rows['status_apro'] == "espera") {
    // code...

?>
    

<a onclick="mostrapovalida()" href="lista_obra.php?obra=<?php echo $rows['codigo']; ?>">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-yellow-lightest text-yellow-darker OSInline" id="l1-30_0-b9-Tag">Validar</div>
    </div>
</div>
</a>
<?php }elseif ($rows['status_apro'] == "reprovado") {
    // code...
?>
    

<a onclick="mostrapovalida()" href="lista_obra.php?obra=<?php echo $rows['codigo']; ?>">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-red-lightest text-red-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
    
</div>

<?php }  ?>


<div data-container="" class="ThemeGrid_Width3" style="text-align: center; height: 34px;">
  
    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-30_0-$b11">
        <div class="vertical-align flex-direction-row" id="l1-30_0-b11-Content">
            <div data-container="" class="ThemeGrid_Width3" style="text-align: left;">
                <a data-link="" href="edita_obra.php?edita=<?php echo $rows['codigo']; ?>">
                    <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 172, 227); font-size: 34px;">
                </i>
            </a><br>
            </div>
            <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: center; height: 34px;">
                    <a data-link="" href="processa_editaSta.php?ids_obra=<?php echo $rows['codigo']; ?>">
                        <i data-icon="" class="icon fa fa-ban " style="color: red; font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
                <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: center; height: 34px;">
                    <a data-link="" href="detalhe_obra.php?ids_obra=<?php echo $rows['codigo']; ?>">
                        <i data-icon="" class="icon fa fa-list " style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
    <div data-container="" class="ThemeGrid_Width3 ThemeGrid_MarginGutter" style="text-align: right; color: rgb(224, 82, 67);">
       <a data-link="" href="#" onclick="if(confirm('Deseja realmente deletar esta obra?')) { window.location.href = 'processa_deletar_obra.php?func=deletar&ido=<?php echo $rows['id_obra']; ?>'; }" style="color: red;">
        <i data-icon="" class="fa fa-trash-o" style="font-size: 34px;">
        </i>
        </a>
</div>

</div>
</div>
</div>
</div>
</div>
</div>


<?php }



$result_count = mysqli_query($conexao, "SELECT COUNT(*) as total FROM obra WHERE status = 'ativo'");
$row_count = mysqli_fetch_assoc($result_count);
$total_paginas = ceil($row_count['total'] / $limite);

echo '<div class="pagination">';
if ($pagina > 1) {
    echo "<a href='lista_obra.php?pagina=" . ($pagina - 1) . "'>Anterior</a>";
}

$max_links = 20;
if ($total_paginas > 20) {
    if ($pagina > 10) {
        echo "<a href='lista_obra.php?pagina=1'>1</a>";
        echo "<span class='ellipsis'>...</span>";
    }
    $start = max(1, min($pagina - 9, $total_paginas - 19));
    $end = min($total_paginas, $start + 19);
} else {
    $start = 1;
    $end = $total_paginas;
}
$start = max(1, $pagina - floor($max_links / 2));
$end = min($total_paginas, $pagina + floor($max_links / 2));

for ($i = $start; $i <= $end; $i++) {
    if ($i == $pagina) {
        echo "<a class='active' href='lista_obra.php?pagina=$i'>$i</a>";
    } else {
        echo "<a href='lista_obra.php?pagina=$i'>$i</a>";
    }
}

if ($pagina < $total_paginas) {
    echo "<a href='lista_obra.php?pagina=" . ($pagina + 1) . "'>Próximo</a>";
}
echo '</div>';

 ?>
</div>
</div>


  <div data-block="Content.Accordion" id="tab1" class="tab-content">
<?php 
$limite = 20;
$pagina= isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$inicio = ($pagina - 1) * $limite;
                   $mysqlshow = mysqli_query($conexao,"SELECT  * FROM obra LIMIT $inicio,$limite");
                   while ($rows= mysqli_fetch_assoc($mysqlshow)) {
                       // code...
                   


                    ?>

<div data-list-item="" class="list-item" id="l1-30_0-ListItem1" style="background-color: white;">
    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-30_0-$b7">
        <div class="vertical-align flex-direction-row" id="l1-30_0-b7-Content">
            <span data-expression="" class="bold ThemeGrid_Width3"><?php echo $rows['codigo']; ?></span>
            <span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['descricao']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['datai']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['dataf']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['cliente']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['localizacao']); ?></span>
<?php if ($rows['status_apro'] == "aprovado"){

?>
    

<a onclick="mostrapofinaliza()"  href="lista_obra.php?obra_id=<?php echo $rows['id_obra']; ?>">
</a>
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-green-lightest text-green-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
</div>
<?php }elseif ($rows['status_apro'] == "finalizado") {
    // code...

?>
    


<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-grey-lightest text-grey-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
</div>
<?php }elseif ($rows['status_apro'] == "espera") {
    // code...

?>
    

<a onclick="mostrapovalida()" href="lista_obra.php?obra=<?php echo $rows['codigo']; ?>">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-yellow-lightest text-yellow-darker OSInline" id="l1-30_0-b9-Tag">Validar</div>
    </div>
</div>
</a>
<?php }elseif ($rows['status_apro'] == "reprovado") {
    // code...
?>
    


<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-red-lightest text-red-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
</div>
<?php }  ?>


<div data-container="" class="ThemeGrid_Width3" style="text-align: center; height: 34px;">
    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-30_0-$b11">
        <div class="vertical-align flex-direction-row" id="l1-30_0-b11-Content">
            <div data-container="" class="ThemeGrid_Width3" style="text-align: left;">
                <a data-link="" href="edita_obra.php?edita=<?php echo $rows['codigo']; ?>">
                    <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 172, 227); font-size: 34px;">
                </i>
            </a>
            </div>
            <?php 
            if ($rows['status'] == "ativo") {
                // code...
            


             ?>
            <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: center; height: 34px;">
                    <a data-link="" href="processa_editaSta.php?ids_obra=<?php echo $rows['codigo']; ?>">
                        <i data-icon="" class="icon fa fa-ban " style="color: red; font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
                <?php } ?>
                <?php 
            if ($rows['status'] == "inativo") {
                // code...
            


             ?>
            <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: center; height: 34px;">
                    <a data-link="" href="processaAts.php?ids_obra=<?php echo $rows['codigo']; ?>">
                        <i data-icon="" class="icon fa fa-check " style="color: gren; font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
                <?php } ?>


                <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: center; height: 34px;">
                    <a data-link="" href="detalhe_obra.php?ids_obra=<?php echo $rows['codigo']; ?>">
                        <i data-icon="" class="icon fa fa-list " style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
    <div data-container="" class="ThemeGrid_Width3 ThemeGrid_MarginGutter" style="text-align: right; color: rgb(224, 82, 67);">
       <a data-link="" href="processa_deletar_obra.php?func=deletar&ido=<?php echo $rows['id_obra']; ?>" style="color: red;">
        <i data-icon="" class="fa fa-trash-o" style="font-size: 34px;">
        </i>
        </a>
</div>

</div>
</div>
</div>
</div>
</div>
</div>

<?php }


$result_count = mysqli_query($conexao, "SELECT COUNT(*) as total FROM obra ");
$row_count = mysqli_fetch_assoc($result_count);
$total_paginas = ceil($row_count['total'] / $limite);

for ($i=1; $i <=$total_paginas;  $i++) { 

echo '<div class="pagination">';
    echo "<a href='lista_obra.php?pagina=$i'>$i</a>";
     echo '</div>';
}


 ?>
</div>

   <div data-block="Content.Accordion" id="tab3" class="tab-content">
<?php 
                   $mysqlshow = mysqli_query($conexao,"SELECT  * FROM obra where status = 'inativo'");
                   while ($rows= mysqli_fetch_assoc($mysqlshow)) {
                       // code...
                   


                    ?>

<div data-list-item="" class="list-item" id="l1-30_0-ListItem1" style="background-color: white;">
    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-30_0-$b7">
        <div class="vertical-align flex-direction-row" id="l1-30_0-b7-Content">
            <span data-expression="" class="bold ThemeGrid_Width3"><?php echo $rows['codigo']; ?></span>
            <span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['descricao']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['datai']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['dataf']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['cliente']); ?></span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter"><?php echo strtoupper($rows['localizacao']); ?></span>
<?php if ($rows['status_apro'] == "aprovado"){

?>
    

<a onclick="mostrapofinaliza()"  href="lista_obra.php?obra_id=<?php echo $rows['id_obra']; ?>">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-green-lightest text-green-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
</div>
</a>
<?php }elseif ($rows['status_apro'] == "finalizado") {
    // code...

?>
    


<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-grey-lightest text-grey-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
</div>
<?php }elseif ($rows['status_apro'] == "espera") {
    // code...

?>
    

<a onclick="mostrapovalida()" href="lista_obra.php?obra=<?php echo $rows['codigo']; ?>">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-yellow-lightest text-yellow-darker OSInline" id="l1-30_0-b9-Tag">Validar</div>
    </div>
</div>
</a>
<?php }elseif ($rows['status_apro'] == "reprovado") {
    // code...
?>
    


<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-red-lightest text-red-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
</div>
<?php }  ?>


<div data-container="" class="ThemeGrid_Width3" style="text-align: center; height: 34px;">
    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-30_0-$b11">
        <div class="vertical-align flex-direction-row" id="l1-30_0-b11-Content">
            <div data-container="" class="ThemeGrid_Width3" style="text-align: left;">
                <a data-link="" href="edita_obra.php?edita=<?php echo $rows['codigo']; ?>">
                    <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 172, 227); font-size: 34px;">
                </i>
            </a>
            </div>
            <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: center; height: 34px;">
                    <a data-link="" href="processaAts.php?ids_obra=<?php echo $rows['codigo']; ?>">
                        <i data-icon="" class="icon fa fa-check " style="color: gren; font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
                <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: center; height: 34px;">
                    <a data-link="" href="detalhe_obra.php?ids_obra=<?php echo $rows['codigo']; ?>">
                        <i data-icon="" class="icon fa fa-list " style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
    <div data-container="" class="ThemeGrid_Width3 ThemeGrid_MarginGutter" style="text-align: right; color: rgb(224, 82, 67);">
       <a data-link="" href="processa_deletar_obra.php?func=deletar&ido=<?php echo $rows['id_obra']; ?>" style="color: red;">
        <i data-icon="" class="fa fa-trash-o" style="font-size: 34px;">
        </i>
        </a>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</div>

</div>
</div>
</div>
<?php 
@$obra = $_GET['obra'];

$sqlcolas =mysqli_query($conexao,"SELECT * FROM obra WHERE codigo = '$obra'");
 while ($roww = mysqli_fetch_assoc($sqlcolas)) {
     


 ?>

<form method="post" action="processaaprovacaao.php?idobra=<?php echo $obra ?>">
<div class="popup-backdrop" data-popup-backdrop="" style="display:block ; padding-left: 360px;"   id="meupovalida">
    <div data-popup="" class="popup-dialog popup-dialog"  role="dialog" aria-modal="true" id="AddedTransfer"><div class="popup-content">
        <div data-container="">
        <label data-label="" class="OSFillParent">Codigo da Obra Selecionada:</label>
<div data-container="" style="text-align: left;">
    <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($roww['codigo']); ?></span>
</div>
</div>
<div data-container="">
        <label data-label="" class="OSFillParent">Propetario da Obra Selecionada:</label>
<div data-container="" style="text-align: left;">
    <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($roww['cliente']); ?></span>
</div>
</div>
<div data-container="">
        <label data-label="" class="OSFillParent">Descricao da Obra Selecionada:</label>
<div data-container="" style="text-align: left;">
    <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($roww['descricao']); ?></span>
</div>
</div>
 
            <div data-container="" style="margin-top: 20px;">
                
            </div>
            <div data-container="" style="margin-top: 40px;">
                <a data-button="" href="lista_obra.php?id=<?php echo $id_user ?>"class="btn" >Sair</a>
                <button data-button="" name="butao"  class="btn btn-primary" type="submit" >Aprovar</button>
            </div>
        </div>
    </div>
</div>
</form>
    <?php } ?>
</div>


    <!-- modal para aprovar obra -->



    <?php 
@$obra_id = $_GET['obra_id'];

$sqlcolas =mysqli_query($conexao,"SELECT * FROM obra WHERE id_obra = '$obra_id'");
 while ($roww = mysqli_fetch_assoc($sqlcolas)) {
     


 ?>

<form method="post" action="processa_fializa_obra.php?idobra=<?php echo $obra_id ?>">
<div class="popup-backdrop" data-popup-backdrop="" style="display:block ; padding-left: 360px;"   id="meupofinaliza">

<div data-popup="" class="popup-dialog popup-dialog"  role="dialog" aria-modal="true" id="AddedTransfer">
    <div class="popup-content">
        <div data-container="">
        <label data-label="" class="OSFillParent">Codigo da Obra Selecionada:</label>
<div data-container="" style="text-align: left;">
    <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($roww['codigo']); ?></span>
</div>
</div>
<div data-container="">
        <label data-label="" class="OSFillParent">Propetario da Obra Selecionada:</label>
<div data-container="" style="text-align: left;">
    <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($roww['cliente']); ?></span>
</div>
</div>
<div data-container="">
        <label data-label="" class="OSFillParent">Descricao da Obra Selecionada:</label>
<div data-container="" style="text-align: left;">
    <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($roww['descricao']); ?></span>
</div>
</div>
 
            <div data-container="" style="margin-top: 20px;">
                
            </div>
            <div data-container="" style="margin-top: 40px;">
                <a data-button="" href="lista_obra.php?id=<?php echo $id_user ?>"class="btn" >Sair</a>
                <button data-button="" name="butao"  class="btn btn-primary" type="submit" >finalizar</button>
            </div>
        </div>
    </div>
</div>
</form>
    <?php } ?> 
<footer data-advancedhtml="" role="contentinfo" class="content-bottom">
    <div class="footer ph" id="b1-Bottom">
        <div data-block="Common.BottomBar" class="OSBlockWidget" id="$b12">
            <div data-container="" class="bottom-bar-wrapper"><div data-container="" class="bottom-bar ph"></div>
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

 
    <script src="../js/aba.js"></script> 
  <script src="../js/modal.js"></script>
  <script src="../js/jquery.js"></script>
  <script>
 //$(document).ready(function() {
 //   var initialResults = $('#initialData').html();
 //   $('#searchInput').on('input', function() {
 //       const query = $(this).val();
//
 //       // Se o campo de pesquisa estiver vazio, mostra os dados iniciais e oculta os resultados da pesquisa
 //       if (query === '') {
 //           location.reload();
//
 //           return; // Retorna para evitar que a solicitação AJAX seja feita
 //       }
 //       console.log(initialResults);
//
 //       // Faz uma solicitação AJAX para buscar os resultados da pesquisa no servidor
 //       $.ajax({
 //           url: 'pesquisa1.php', // Caminho para o script PHP que busca os resultados da pesquisa
 //           method: 'POST',
 //           data: { query: query }, // Envia o termo de pesquisa para o servidor
 //           success: function(response) {
 //               $('#initialData').hide();
 //               $('#searchResults').children().not('#initialData').remove();
 //               $('#searchResults').append(response); // Atualiza os resultados da pesquisa com a resposta do servidor
 //           }
 //       });

 $(document).ready(function() {
    var initialResults = $('#initialData').html();
    $('#searchInput').on('input', function() {
        const query = $(this).val();
        if (query === '') {
            $('#initialData').show();
            $('#searchResults').children().not('#initialData').remove();
            return;
        }

        // Solicitação AJAX
        $.ajax({
            url: 'pesquisa1.php',
            method: 'POST',
            data: { query: query },
            success: function(response) {
                $('#initialData').hide();
                $('#searchResults').children().not('#initialData').remove();
                $('#searchResults').append(response);
            }
        });
    });
});

    


    


   </script>
   
<?php } ?>
</body>
</html>
