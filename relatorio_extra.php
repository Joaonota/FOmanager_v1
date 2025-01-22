<!DOCTYPE html>
<html lang="en">
<head>
<?php require "estilo.php" ?>
<title>Relatorio De Hora Extra</title>
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
        <span style="font-weight: bold;">Relatorio De Hora Extra</span>
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
    <!-- aqui tem tabela -->
            <div data-container="" style="text-align: center; font-size: 16px; font-weight: bold; margin-top: 30px;">Historico de Horas</div>
            <div data-container="" class="align-items-center display-flex">
                <div data-container="" class="ThemeGrid_Width4">
                    <form id="filtro_extra">
                <div id="Dropdown1-container" class="dropdown-container" data-dropdown="">

                <select class="dropdown-display dropdown"  id="colaborador">
                    <?php 
                    $mysqlfiltro = mysqli_query($conexao, "SELECT * from colaborador");

                    while ($rowfiltro= mysqli_fetch_assoc($mysqlfiltro)) {
                     ?>
                <option value="<?php echo $rowfiltro['id_colaborador'] ?>"><?php echo strtoupper($rowfiltro['nome']);?></option>
                <?php } ?>
        </select>
        </div>
    </div>
    </form>

        
    <!--div data-container="" class="ThemeGrid_Width7 ThemeGrid_MarginGutter">
            <a data-link="" href="">
        <i data-icon="" class="icon fa fa-file-pdf fa-2x" style="color: rgb(245, 160, 74); font-size: 38px;">
        </i>
    </a>
    </div-->
    </div>
        <div data-container="" style="margin-top: 20px;">
            <table class="table" role="grid" id="tabela_obras">
            <thead>
            <tr class="table-header">
        <th class="" tabindex="0" style="width: 10%;">
        </th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 20%;">Dia<div class="sortable-icon">
        </div>
    </th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 15%;">Hora de entrada<div class="sortable-icon">
        </div>
    </th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 15%;">Hora de saida<div class="sortable-icon"></div>
        </th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 20%;">Hora de entrada Extra<div class="sortable-icon">
            </div
        ></th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 20%;">Hora de saida Extra<div class="sortable-icon">
        </div></th><th class="sortable" tabindex="0" style="text-align: right; width: 20%;">Accoes<div class="sortable-icon">
        </div></th></tr></thead>
<tbody  id="colaborrador_body" >

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
      


  
</body>
<script src="js/menusub.js"></script> 
<script src="js/filtro_colaborador_extra.js"></script> 
</html>


