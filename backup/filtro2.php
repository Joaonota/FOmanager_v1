<!DO<!DOCTYPE html>
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
            <span style="font-weight: bold;">Editar Obra</span>
    </div>
</h1>
    <div class="header-right" id="b1-HeaderRight">
        <div data-block="DownloadFlow.Download" class="OSBlockWidget" id="$b4">
        <span hidden="">&lt;Download&gt;</span>
</div>
    <a data-link="" class="ThemeGrid_MarginGutter" href="https://personal-vziumkqy.outsystemscloud.com/FOManager/ProjectEditor?Clientid=40&amp;ProjectId=1028#">
        <i data-icon="" class="icon fa fa-file-excel-o fa-2x"></i>
</a>
</div>
</div>
</div>
</div>
<div class="header-top-content ph" id="b1-HeaderContent">
    <div data-container="" class="ThemeGrid_Width8" style="text-align: right;">
</div>
</div>
</header>
<div data-container="" class="content" id="b1-ContentWrapper">
    <div data-container="" class="main-content ThemeGrid_Container" role="main" id="b1-MainContentWrapper">
    <div class="content-middle" id="b1-Content">
    <div data-container="" style="text-align: center; margin-top: 10px;">
    <div data-container="" class="ThemeGrid_Width3" style="text-align: center;">
    <span style="font-size: 16px; font-weight: bold;">Detalhes da Obra</span>
<div data-block="Interaction.Search" class="OSBlockWidget" id="$b5">
    <div data-container="" class="search  " role="search">
    <div class="search-input" id="b5-Input">
    <label data-label="" class="wcag-hide-text OSFillParent">Search input</label>
<span class="input-search">
    <input data-input="" class="form-control OSFillParent" type="search" placeholder="Procurar Obra" aria-required="false" maxlength="100" value="" id="Input_SearchKeywordProject">
</span>
</div>
    <div data-container="" class="search-glass" style="cursor: pointer;">
        <div data-container="" class="search-stick-bottom">
    </div>
    <div data-container="" class="search-round">
    </div>
</div>
</div>
</div>

    <div data-container="">
        <div data-block="Content.Card" class="OSBlockWidget" id="$b6">
            <div class="ph card card-content card-overflow" id="b6-Content">
                <form id="filtro_obras">
        <div id="Dropdown1-container" class="dropdown-container" data-dropdown="">
            
            <select name="cliente" id="cliente" class="dropdown-display dropdown" >
                <?php 
            $mysqls= mysqli_query($conexao, "SELECT DISTINCT nome FROM clientes");

            while ($row = mysqli_fetch_assoc($mysqls)) {
                // code...
            

             ?>
                <option value="<?php echo $row['nome'] ?>"><?php echo $row['nome'] ?> </option>

                <?php  } ?>
           
    </select>
</div>
</form>
<table id="tabela_obras">
     <tbody id="obras_body"></tbody>
<div data-container="" style="margin-top: 20px;">
    <div data-list="" class="list list-group OSFillParent" style="position: relative;">
   

</div>
</div>
</table>
</div>
</div>
</div>
</div><div data-container="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter">
    <span style="font-size: 16px; font-weight: bold;">Colaboradores na Obra</span>
    <div data-container="">
        <div data-block="Content.Card" class="OSBlockWidget" id="$b7">
            <div style="height: 500px;" class="ph card card-content card-overflow" id="b7-Content">
                <div data-container="" style="text-align: center; margin-top: 50px;">
                    <span style="font-weight: bold;">Não existem Colaboradores</span>
                </div>
                <div data-container="" style="text-align: center;">
                    <img data-image="" class="ThemeGrid_Width5" src="img/FOManager.empty_list2.svg">
                </div>
                </div>
            </div>
        </div>
    </div><div data-container="" class="ThemeGrid_Width3 ThemeGrid_MarginGutter">
        <span style="font-size: 16px; font-weight: bold;">Colaboradores Disponiveis</span>
        <div data-container="">
            <div data-block="Interaction.Search" class="OSBlockWidget" id="$b8">
                <div data-container="" class="search  " role="search">
                    <div class="search-input" id="b8-Input">
<label data-label="" class="wcag-hide-text OSFillParent">Search input</label>
<span class="input-search">
    <input data-input="" class="form-control OSFillParent" type="search" placeholder="Procurar Colaborador" aria-required="false" maxlength="100" value="" id="Input_SearchKeyword"></span>
</div>
<div data-container="" class="search-glass" style="cursor: pointer;">
    <div data-container="" class="search-stick-bottom"></div>
    <div data-container="" class="search-round"></div>
</div>
</div>
</div>
<?php   

$sqlcola =mysqli_query($conexao,"SELECT * FROM colaborador");

while ($row = mysqli_fetch_assoc($sqlcola)) {
    // code...


 ?>
<div data-block="Content.Card" class="OSBlockWidget" id="$b9">
    <div class="ph card card-content card-overflow" id="b9-Content">
        <div data-list="" class="list list-group OSFillParent" style="position: relative;">
            <script style="display: flex; height: 0px; width: 100%;"></script>
            <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-56_120-ListItem2">
                <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-56_120-$b10">
                    <div class="vertical-align flex-direction-row" id="l4-56_120-b10-Content">
<span data-expression="" class="bold ThemeGrid_Width10"><?php echo strtoupper($row['nome']); ?></span>
<i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i>
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
    </div>
    </div>
        <footer data-advancedhtml="" role="contentinfo" class="content-bottom"><div class="footer ph" id="b1-Bottom"><div data-block="Common.BottomBar" class="OSBlockWidget" id="$b12"><div data-container="" class="bottom-bar-wrapper"><div data-container="" class="bottom-bar ph"></div></div></div></div></footer></div><div data-container="" class="offline-data-sync"><div data-block="Common.OfflineDataSyncEvents" class="OSBlockWidget" id="b1-$b2"><div data-block="Private.OfflineDataSyncCore" class="OSBlockWidget" id="b1-b2-$b1"><div data-block="Private.NetworkStatusChanged" class="OSBlockWidget" id="b1-b2-b1-$b1"><div data-container=""></div></div></div></div></div></div></div></div></div></div>
        
    <script>
        document.getElementById("cliente").addEventListener("change", function() {
            var clienteSelecionado = this.value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("obras_body").innerHTML = this.responseText;
                }
            };
            xhr.open("POST", "obras1.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("cliente=" + clienteSelecionado);
        });

        // Inicializar a tabela de obras com base no cliente selecionado ao carregar a página
        window.onload = function() {
            document.getElementById("cliente").dispatchEvent(new Event('change'));
        };
    </script>
</body>
</html>