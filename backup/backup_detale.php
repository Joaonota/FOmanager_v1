<!DO<!DOCTYPE html>
<html lang="en">
<head>
<?php
@$ids_obra = $_GET['ids_obra'];

 require "estilo.php" ?>
<title>Lista Dos Clientes</title>
<style type="text/css">
    .hidden{
        display: none;
    }
</style>
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
    <a data-link="" class="ThemeGrid_MarginGutter" href="download_excel1.php" download="obras.xlsx">
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
<!--style="overflow: auto; border: 1px solid #ccc;"-->
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
</div><div data-container="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter" >
    <span style="font-size: 16px; font-weight: bold;">Colaboradores na Obra</span>
    <div data-container="">
        <?php 
        $mysqlve =mysqli_query($conexao,"SELECT * FROM obra_andamento WHERE codigo_obra = '$ids_obra'");
        $numr= mysqli_num_rows($mysqlve);

        if ($numr <= 0) {
            echo '<div style="height: 500px;" class="ph card card-content card-overflow" id="b7-Content">

                <div data-container="" style="text-align: center; margin-top: 50px;">
                    <span style="font-weight: bold;">Não existem Colaboradores</span>
                </div>
                <div data-container="" style="text-align: center;">
                    <img data-image="" class="ThemeGrid_Width5" src="img/FOManager.empty_list2.svg">
                </div>
                </div>';
        }else{
           while ($listas = mysqli_fetch_assoc($mysqlve)) {
               // code...
         
         ?>


         <div data-block="Content.Card" class="OSBlockWidget" id="$b7">
           
     
            <div data-container="">
        <div data-block="Content.Card" class="OSBlockWidget" id="$b7">
          
<div style="height: 500px;" class="ph card card-content card-overflow" id="b7-Content">
<div class="ph card card-content card-overflow" id="b7-Content">

   <table class="table" role="grid">
    <thead>
        <tr class="table-header">
            <th class="sortable" tabindex="0" style="width: 40%;">Nome<div class="sortable-icon"></div></th>
            <th class="sortable" tabindex="0" style="text-align: right; width: 15%;">&nbsp;In<div class="sortable-icon"></div></th>
            <th class="sortable" tabindex="0" style="text-align: right; width: 15%;">&nbsp;Out<div class="sortable-icon"></div></th>
            <th class="" tabindex="0" style="padding: 0px 10px; width: 15%;"></th>
            <th class="" tabindex="0" style="padding: 0px 10px; width: 15%;"></th>
        </tr>
    </thead>
    <tbody>
    
        <tr class="table-row">
            <td data-header="Nome" style="padding: 8px 20px; text-align: left;">
                <span><?php echo strtoupper($listas['colaborador']); ?></span>
                
            </td>
            <td data-header="&nbsp;In" style="padding: 8px 20px;">
                <div data-container="" style="text-align: right;">
                    <span data-expression=""><?php echo $listas['entrada']; ?></span>
                </div>
            </td>
            <td data-header="&nbsp;Out" style="padding: 8px 20px;">
                <div data-container="" style="text-align: right;">
                    <span data-expression=""><?php echo $listas['saida']; ?></span>
                </div>
            </td>
            <td data-header="" style="padding: 8px 5px 8px 10px;">
                <a onclick="mostrapovalida()" href="detalhe_obra.php?idextra=<?php echo $listas['id_colaborador']; ?>&idobra_exta=<?php echo @$ids_obra; ?>"><i data-icon="" class="icon fa fa-clock-o fa-2x" style="color: rgb(89, 172, 227); font-size: 32px;"></i></a>
                
            </td>
            <td data-header="" style="padding: 8px 10px 8px 0px;">
                <div data-container="" style="text-align: left;">
                    <div data-container="" class="ThemeGrid_Width6" style="text-align: left; margin-right: 10px;">
            
                
             <a  onclick="mostrapoptranf()" href="detalhe_obra.php?idt=<?php echo $listas['id_colaborador']; ?>">
                    <i data-icon="" class="icon fa fa-exchange fa-2x" style="color: rgb(78, 213, 85);">
                     </i>
                </a>
           
                    </div>
        <a data-link="" href="processa_deletar_colaboador_obra.php?func=deletar&id_d_cola=<?php echo $listas['id_colaborador']; ?>&idobra_exta=<?php echo @$ids_obra; ?>" class="ThemeGrid_MarginGutter" href="#" style="margin-right: 10px;">
                        <i data-icon="" class="icon fa fa-trash fa-2x" style="color: rgb(227, 91, 89);"></i>
                    </a>
                </div>
            </td>
        </tr>
    
    </tbody>
</table>


</div>
                </div>
     
            
            </div>
        </div>


            </div>
<?php   }
        }
 ?>
        </div>
    </div><div data-container="" class="ThemeGrid_Width3 ThemeGrid_MarginGutter" style="overflow: auto;">
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
<a data-icon="" onclick="mostrapopadd()" href="detalhe_obra.php?id=<?php echo $row['id_colaborador']; ?>&id_obra=<?php echo @$ids_obra; ?>" style="color: rgb(99, 188, 129); font-size: 32px;">
    <i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></a>
</div>
</div>
</div>

    </div>
    </div>
    </div>
    <!-- esse modal e para adicionar o colaborador a uma obra-->
<?php 
@$id_obra = $_GET['id_obra'];
@$id = $_GET['id'];
$sqlcolas =mysqli_query($conexao,"SELECT * FROM colaborador WHERE id_colaborador = '$id'");
 while ($roww = mysqli_fetch_assoc($sqlcolas)) {
     // code...


 ?>



<!-- esse modal e para adicionar o colaborador a uma obra-->
 <div  class="popup-backdrop" data-popup-backdrop="" style="display:block; padding-left: 360px;"   id="meupoadd" >
        <div data-popup="" class="popup-dialog popup-dialog" role="dialog" aria-modal="true">
            <div class="popup-content">
                <form  method="post" action="processa_andamento.php"  class="form card OSFillParent" id="Form1">
                <div data-container="" style="margin-bottom: 20px;">
                <span data-expression=""  style="font-size: 16px; font-weight: bold;"><?php echo strtoupper($roww['nome']); ?></span>
                <input data-input="" name="colaborador"  class="form-control OSFillParent" type="hidden" aria-required="false" value="<?php echo $roww['nome']; ?>" id="Input_TimeIn3">
                <div data-container="">
                    <label class="ThemeGrid_Width4">
                    <span>Hora Extra</span>
                    <div class="ThemeGrid_Width5 ThemeGrid_MarginGutter" style="text-align: left;">
                        <span><input data-switch="" onclick="mostraHidden()"   id="Switch2" class="switch" type="checkbox" >
                        </span>
                    </div>
                </label>
                </div>
                <input data-input="" name="cell"  class="form-control OSFillParent" type="hidden" aria-required="false" value="<?php echo $roww['cell']; ?>" id="Input_TimeIn3">
                <input data-input="" name="codigo_obra" value="<?php echo @$id_obra; ?>"   class="form-control OSFillParent" type="hidden" aria-required="false"  id="id_obra">

                <input data-input="" name="id_colaborador" value="<?php echo @$id; ?>"   class="form-control OSFillParent" type="hidden" aria-required="false"  id="id_obra">
               
        </div>
        <div class="hidden" id="mostras">
        <div data-container="">
        <label data-label="" class="ThemeGrid_Width5">
            <span style="font-weight: bold;">Hora de Entrada Extra</span>
        </label>
        <span class="input-time">
            <input data-input="" name="entrada" class="form-control OSFillParent" type="time" aria-required="false" value="" id="entrada">
        </span>
        

    </div>
    
        
  
    <div data-container="" >
        <label data-label="" class="ThemeGrid_Width5">
            <span style="font-weight: bold;">Hora de Saida Extra</span>
        </label><span class="input-time">
            <input data-input="" name="saida" class="form-control OSFillParent" type="time" aria-required="false" value="" id="saida">
        </span>
    </div>
</div>
    <div data-container="" >
        <label data-label="" class="ThemeGrid_Width5">
            <span style="font-weight: bold;">Hora de Entrada</span>
        </label>
        <span class="input-time">
            <input data-input="" name="entrada" class="form-control OSFillParent" type="time" aria-required="false" value="" id="entrada">
        </span>

    </div>
      
    <div data-container="">
        <label data-label="" class="ThemeGrid_Width5">
            <span style="font-weight: bold;">Hora de Saida</span>
        </label><span class="input-time">
            <input data-input="" name="saida" class="form-control OSFillParent" type="time" aria-required="false" value="" id="saida">
        </span>
    </div>
    <div data-container="" class="align-items-center display-flex">
        <a data-button="" href="detalhe_obra.php?ids_obra=<?php echo $id_obra ?>" class="btn" >Sair</a>
        <button data-button="" onclick="validarHoras()" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit" style="background-color: rgb(89, 172, 227);">Adicionar</button>
     <div data-container="" class="ThemeGrid_Width5 ThemeGrid_MarginGutter" style="text-align: right;">
            <i data-icon="" class="icon fa fa-exchange fa-2x" style="color: rgb(191, 191, 191); font-size: 32px;"></i>
        </div>
    </div>
</form>
</div>
        </div></div>
<?php  } ?>
 <?php } ?>
 <!-- esse modal e para fazer tranferencia de um colabordor para outra obra-->
<?php 
@$id_obra = $_GET['id_obra'];
@$idt = $_GET['idt'];
$sqlcolas =mysqli_query($conexao,"SELECT * FROM colaborador WHERE id_colaborador = '$idt'");
 while ($roww = mysqli_fetch_assoc($sqlcolas)) {
     


 ?>

<form method="post" action="processa_tranferencia.php?idcola=<?php echo $idt ?>">
<div class="popup-backdrop" data-popup-backdrop="" style="display:block ; padding-left: 360px;"   id="meupotranf">
    <div data-popup="" class="popup-dialog popup-dialog"  role="dialog" aria-modal="true" id="AddedTransfer"><div class="popup-content">
        <div data-container="">
        <label data-label="" class="OSFillParent">Colaborador Selecionado:</label>
<div data-container="" style="text-align: left;">
    <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($roww['nome']); ?></span>
</div>
</div>
 <?php 
@$idt = $_GET['idt'];
$sqlctual =mysqli_query($conexao,"SELECT * FROM obra_andamento WHERE id_colaborador = '$idt'");

        while ($listaactaul = mysqli_fetch_assoc($sqlctual)) {
            $codigoobras = $listaactaul['codigo_obra'];
       


         ?>
        

<div data-container="">
        <label data-label="" class="OSFillParent">Obra Actal: <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($listaactaul['codigo_obra']); ?></span></label>

</div>

<div data-container="" style="margin-top: 20px;">
    <label data-label="" class="OSFillParent">Transferir o colaborador para:</label>
</div>
<div data-container="">
    <div id="Dropdown5-container" class="dropdown-container" data-dropdown="">
        
        <select class="dropdown-display dropdown" required="" name="codigo_obra" aria-disabled="false" id="Dropdown5">
            <?php 
        $listaobra = mysqli_query($conexao,"Select * from obra where codigo <>'$codigoobras'");

        while ($listaz = mysqli_fetch_assoc($listaobra)) {
            // code...
       


         ?>

        <option value="<?php echo $listaz['codigo'] ?>"><?php echo $listaz['codigo'] ?></option>
        
    <?php  } ?>
    </select>
    
</div>
</div>
<?php  } ?>
<div data-container="" style="margin-top: 20px;">
    <label data-label="" class="OSFillParent"></label>
</div><div data-container="" style="margin-top: 20px;">
    <label data-label="" class="OSFillParent">
        <span style="font-weight: bold;">Hora Out da obra corrente</span>
    </label>
    <?php 
@$idt = $_GET['idt'];
$sqlcsolass =mysqli_query($conexao,"SELECT * FROM obra_andamento WHERE id_colaborador = '$idt'");

while ($horasaida = mysqli_fetch_assoc($sqlcsolass)) {
    // code...

     ?>
    <span class="input-time">
        <input data-input="" class="form-control OSFillParent" disabled type="time" aria-required="true" value="<?php echo $horasaida['saida'] ?>" id="Input_DateTimeVar5"></span>
        <?php } ?>
</div>
    <div data-container="" style="margin-top: 20px;">
        <label data-label="" class="OSFillParent">
            <span style="font-weight: bold;">Hora In para a nova obra</span>
        </label>
        <span class="input-time">
    <input data-input="" class="form-control OSFillParent" required="" type="time"  name="entrada" min="7:00" max="8:30" >
</span>
        </div>
        <div data-container="" style="margin-top: 20px;">
            <label data-label="" class="OSFillParent">
                <span style="font-weight: bold;">Hora Out para a nova obra</span>
            </label>
            <span class="input-time">
                <input data-input="" class="form-control OSFillParent" required="" type="time" aria-required="true" name="saida" id="Input_DateTimeVar2"></span>
            </div>
            <div data-container="" style="margin-top: 20px;">
                
            </div>
            <div data-container="" style="margin-top: 40px;">
                <a data-button="" href="detalhe_obra.php?ids_obra=<?php echo $codigoobras ?> "class="btn" >Sair</a>
                <button data-button="" name="butao"  class="btn btn-primary" type="submit" >Transferir</button>
            </div>
        </div>
    </div>
</div>
</form>
    <?php } ?>

<!-- esse modal e para Adicionar hora extra ao colaborador-->
<?php 
@$idobra_exta = $_GET['idobra_exta'];
@$idextra = $_GET['idextra'];
$sqlextra =mysqli_query($conexao,"SELECT * FROM colaborador WHERE id_colaborador = '$idextra'");

while ($listaextra = mysqli_fetch_assoc($sqlextra)) {
    // code...




 ?>
    <div class="popup-backdrop" data-popup-backdrop=""  style="display:block ; padding-left: 360px;" id="meupoextra">
        <div data-popup="" class="popup-dialog popup-dialog" role="dialog" aria-modal="true">
        <div class="popup-content">
        <form data-form="" method="post" action="processextra.php" novalidate="" class="form card OSFillParent" id="Form2">
        <span data-expression="" style="font-weight: bold; padding-left: 180px;">Hora Extra</span>
        <div data-container="" style="text-align: center; margin-bottom: -20px;">

    <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($listaextra['nome']); ?>
        
        </span>
        </div>
        <input type="hidden" value="<?php echo strtoupper($listaextra['nome']); ?>"  name="colaborador_extra">
        <input type="hidden" value="<?php echo @$idextra; ?>" name="id_colaborador_extra">
        <input type="hidden"  value="<?php echo @$idobra_exta; ?>" name="codigo_obra_extra">
         <?php 
                $sqlobra =mysqli_query($conexao,"SELECT * FROM obra WHERE codigo = '$idobra_exta'");
                while ($obrarow = mysqli_fetch_assoc($sqlobra)) {
                   
                 ?>
                <input type="hidden"  name="descricao_extra" value="<?php echo $obrarow['descricao']; ?>">
                <?php   } ?>

        <div data-container="">
            <label data-label="" class="OSFillParent" for="Input_JobDate">
            <span style="font-weight: bold;">Data de entrada e a Hora</span>
    </label>
        <span class="input-date">
            <?php 
$sqlidobras = mysqli_query($conexao,"select * from obra_andamento where id_colaborador = '$idextra' ");

while ($datarow = mysqli_fetch_assoc($sqlidobras)) {
   $datar = $datarow['datatime'];

             ?>
             
            <input data-input="" class="form-control OSFillParent" disabled="" type="text" aria-required="false" value="<?php echo date("d/m/Y H:i ",strtotime($datar)); ?>" id="Input_JobDate">

            <input  type="hidden"  value="<?php echo   $datarow['entrada']; ?>" name="entrada">
           <input  type="hidden" value="<?php echo   $datarow['saida']; ?>" name="saida" >
            <?php } ?>
        </span>
    </div>
<div data-container="">
    <label data-label="" class="OSFillParent" for="Input_JobDate">
            <span style="font-weight: bold;">Trabalhou?</span>
    </label>
    <div id="Dropdown5-container" class="dropdown-container" data-dropdown="">
        
        <select class="dropdown-display dropdown" required="" name="falta" aria-disabled="false" id="Dropdown5">
        

        <option value="sim">sim</option>
        <option value="não">Não</option>
        
    </select>
    
</div>
</div>

        <div data-block="Adaptive.Columns2" class="OSBlockWidget" id="$b11">
            <div data-container="" class="columns columns2 gutter-base tablet-break-none phone-break-none ">
            <div class="columns-item" id="b11-Column1">
            
        <div data-container="">
            <label data-label="" class="OSFillParent" for="Input_TimeIn">
            <span style="font-weight: bold;">Hora de entrada</span>
    </label>
    <span class="input-time">
        <input data-input="" value="00:00" name="entrada_extra" class="form-control OSFillParent" type="time" aria-required="false"  id="Input_TimeIn">
    </span>
</div>
    <div data-container="">
        <label data-label="" class="OSFillParent" for="Input_TimeOut">

            <span style="font-weight: bold;">Hora de saida</span>

        </label>

    <span class="input-time">

            <input data-input="" value="00:00" name="saida_extra" class="form-control OSFillParent" type="time" aria-required="false"  id="Input_TimeOut">

        </span>

</div>

</div>
        </div>
        </div>
        <div data-container=""> 
            <a data-button="" href="detalhe_obra.php?ids_obra=<?php echo $idobra_exta ?>" class="btn" type="button">Sair</a>
        <button data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Guardar</button></div>
    </form>
</div>
</div>
</div>
<?php } ?>

<!-- aqui fecha o modal -->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

        <footer data-advancedhtml="" role="contentinfo" class="content-bottom"><div class="footer ph" id="b1-Bottom"><div data-block="Common.BottomBar" class="OSBlockWidget" id="$b12"><div data-container="" class="bottom-bar-wrapper"><div data-container="" class="bottom-bar ph"></div></div></div></div></footer></div><div data-container="" class="offline-data-sync"><div data-block="Common.OfflineDataSyncEvents" class="OSBlockWidget" id="b1-$b2"><div data-block="Private.OfflineDataSyncCore" class="OSBlockWidget" id="b1-b2-$b1"><div data-block="Private.NetworkStatusChanged" class="OSBlockWidget" id="b1-b2-b1-$b1"><div data-container=""></div></div></div></div></div></div></div></div></div></div>
        

    <script src="js/filtrocliente.js"></script>
     <script src="js/modal.js"></script>
     <script src="js/time.js"></script>

     <script >
         
         function mostraHidden() {

            var switchTo = document.getElementById("Switch2");
            var input1 = document.getElementById("mostras");
            var addss = document.getElementById("meupoadd");
            
            console.log(addss);
            console.log(switchTo.checked);
            switchTo.checked =! switchTo.checked;
            if (switchTo.checked) {
                
                input1.classList.remove("hidden");
                
                addss.style.display = "block";
                switchTo.checked = false;
                
                
            }else{
                input1.classList.add("hidden");
                
                addss.style.display = "none";
                location.reload();
             // body...
            }
         }
     </script>

</body>
</html>