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
<?php
@$ids_obra = $_GET['ids_obra'];

?>
 <link rel="stylesheet" href="../css/bootstrap.css">
<title>Lista Dos Clientes</title>
<style type="text/css">
    
    .hidden{
        display: none;
    }
    @media (max-width: 768px) {
        .ThemeGrid_Width8, .ThemeGrid_Width3, .ThemeGrid_Width5, .ThemeGrid_Width6 {
            width: 100% !important;
            margin: 0 !important;
        }
        .header-right, .header-top-content, .content-middle, .ThemeGrid_MarginGutter {
            text-align: center !important;
        }
        .table-header th, .table-row td {
            display: block;
            width: 100%;
            text-align: left !important;
        }
        .table-header th {
            border-bottom: 1px solid #ddd;
        }
        .table-row {
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .table-row td {
            padding: 10px 0;
        }
        .input-search, .input-time {
            width: 100%;
        }
        .btn {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>
</head>
<body>
    <?php 
    if (@$painel == "staff") {
        require "../staff_obra.php";
    }else{

  
    ?>
<div id="reactContainer">
   <div  id="transitionContainer">
    <div class="active-screen screen-container slide-from-right-enter-done">
    <div data-block="Common.Layout" class="OSBlockWidget" id="$b1">
    <div   class="layout layout-side layout-native ios-bounce aside" id="b1-LayoutWrapper">
        <!-- drawer-->
    <?php require "../drawer.php" ?>
    <h1 data-advancedhtml="" class="header-title">
        <div class="OSInline" id="b1-Title">
            <span style="font-weight: bold;">Editar Obra</span>
        </div>
    </h1>
    <div class="header-right" id="b1-HeaderRight">
        <div data-block="DownloadFlow.Download" class="OSBlockWidget" id="$b4">
        <span hidden="">&lt;Download&gt;</span>
        </div>
        <a data-link="" class="ThemeGrid_MarginGutter" href="download_excel.php" download="obras.xls">
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
        <?php $myaa = mysqli_query($conexao, "SELECT * from obra_andamento WHERE codigo_obra = '$ids_obra'");
        $nnn = mysqli_num_rows($myaa);
        if ($nnn <=0) {
            // code...
        }else if ($nnn> 0) {
            // code...
        {
          $rosz = mysqli_fetch_assoc($myaa);
        $sts = $rosz['status'];  
        
        
       
      if ($sts == 1) {
       
        
         ?>

        <div data-container="" style="text-align: center; margin-top: 10px;"><label data-label="" class="OSFillParent"><span style="font-weight: bold;">Obra Validada</span></label><span><input checked  data-switch="" class="switch" type="checkbox" id="statusCheckbox"></span>
            <?php }else if ($sts == 0) {
                echo '<div data-container="" style="text-align: center; margin-top: 10px;"><label data-label="" class="OSFillParent"><span style="font-weight: bold;">Obra Validada</span></label><span><input  data-switch="" class="switch" type="checkbox" id="statusCheckbox"></span>';
            }
        }  }

            ?>

<div style="display: none;" data-container="" style="text-align: center; margin-top: 10px;"><label data-label="" class="OSFillParent"><span style="font-weight: bold;">Obra Validada</span></label><span><input  data-switch="" class="switch" type="checkbox" id="statusCheckbox"></span>

   
<input id="obrass"  hidden value="<?php echo $ids_obra; ?>">
</div><div data-container="" style="text-align: center; margin-top: 10px;">
    <div data-container="" class="ThemeGrid_Width3" style="text-align: center;">
    <span style="font-size: 16px; font-weight: bold;">Detalhes da Obra</span>
<div data-block="Interaction.Search" class="OSBlockWidget" id="$b5">
    <div data-container="" class="search  " role="search">
    <div class="search-input" id="b5-Input">
    <label data-label="" class="wcag-hide-text OSFillParent">Search input</label>
<span class="input-search">
    <input data-input="" class="form-control OSFillParent" type="search" placeholder="Procurar Obra" aria-required="false" maxlength="100" value="" >
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
    <input  type="hidden" value="<?php echo $ids_obra; ?>" id="obraidz">
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
</div></div><div data-container="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter" >
    <span style="font-size: 16px; font-weight: bold;">Colaboradores na Obra</span>
    <div data-container="">
        <?php 
        $mysqlve =mysqli_query($conexao,"SELECT * FROM obra_andamento WHERE codigo_obra = '$ids_obra' ORDER BY CAST(codigo_obra AS INTEGER) ASC");
        $numr= mysqli_num_rows($mysqlve);

        if ($numr <= 0) {

            echo '<a data-link="" style="
            margin-right: -500px;" class="ThemeGrid_MarginGutter" href="download_excel_filtro.php?obra='.$ids_obra.'" download="Obra_filtrada.xlsx">
            <i data-icon="" class="icon fa fa-file-excel-o fa-2x"></i>
    </a><div style="height: 500px;" class="ph card card-content card-overflow" id="b7-Content">
                <div data-container="" style="text-align: center; margin-top: 50px;">
                    <span style="font-weight: bold;">Não existem Colaboradores</span>
                </div>
                <div data-container="" style="text-align: center;">
                    <img data-image="" class="ThemeGrid_Width5" src="../img/FOManager.empty_list2.svg">
                </div>
                </div>';
        }else{
         
         ?>


         <div data-block="Content.Cards" class="OSBlockWidget" id="$b7">
           
     
            <div data-container="">
                <div data-block="Content.Carad" class="OSBlockWidget" id="$b7">
          
<div style="height: 500px;" class="ph card card-content card-overflow" id="b7-Content">
    <div class="header-right" id="b1-HeaderRight">
        <div data-block="DownloadFlow.Download" class="OSBlockWidget" id="$b4">
        <span hidden="">&lt;Download&gt;</span>
        </div>

    <a data-link="" class="ThemeGrid_MarginGutter" href="download_excel_filtro.php?obra=<?php echo $ids_obra?>" download="Obra_filtrada.xlsx">
        <i data-icon="" class="icon fa fa-file-excel-o fa-2x"></i>
    </a>
    </div>
    <div class="ph card card-content card-overflow" id="b7-Content">

   <table class="table table-responsive">
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
    <?php while ($listas = mysqli_fetch_assoc($mysqlve)) { ?>
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
                        <button data-toggle="modal" type="button" data-target="#exampleModaltra" data-iduser="<?php echo $listas['id_colaborador']; ?>">
                            <i data-icon="" class="icon fa fa-exchange fa-2x" style="color: rgb(78, 213, 85);"></i>
                        </button>
                    </div>
        <a data-link="" href="processa_deletar_colaboador_obra.php?func=deletar&id_d_cola=<?php echo $listas['id_colaborador']; ?>&idobra_exta=<?php echo @$ids_obra; ?>" class="ThemeGrid_MarginGutter" href="#" style="margin-right: 10px;">
                        <i data-icon="" class="icon fa fa-trash fa-2x" style="color: rgb(227, 91, 89);"></i>
                    </a>
                </div>
            </td>
        </tr>
        <?php  } ?>
    
    </tbody>
</table>


</div>
                </div>
     
            
            </div>
        </div>


            </div>
<?php  
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
<input data-input="" class="form-control OSFillParent" type="search" placeholder="Procurar Colaborador" aria-required="false" maxlength="100" value="" id="searchInput"></span>
</div>
<div data-container="" class="search-glass" style="cursor: pointer;">
    <div data-container="" class="search-stick-bottom"></div>
    <div data-container="" class="search-round"></div>
</div>
</div>
</div>
 <div  id="searchResults">
    <div id="initialData">
<?php   

$sqlcola =mysqli_query($conexao,"SELECT * FROM colaborador ORDER BY nome ASC");

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
                        <span data-expression="" class="bold ThemeGrid_Width10" style="font-size: 18px; color: #333;"><?php echo strtoupper($row['nome']); ?></span>
                        <button data-toggle="modal" data-target="#exampleModal" data-iduser="<?php echo $row['id_colaborador']; ?>" type="button" class="btn btn-primary" style="font-size: 20px; border-radius: 10px; padding: 5px 10px; margin-left: 10px;">
                            <i data-icon="" class="icon fa fa-plus fa-lg ThemeGrid_MarginGutter" style="color: white; font-size: 20px;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  } ?>

<!-- Modal Para Adiconar O cola a uma obra-->
<?php 
$ids_obra = $_GET['ids_obra'];

 ?>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body"> 
        
        <div data-popup=""  class="popup-dialog popup-dialog" role="dialog" aria-modal="">
            <div  class="popup-content">
                
                <form  method="post" action="processa_andamento.php"  class="form card OSFillParent" id="Form1">
                    
                <div data-container="" style="margin-bottom: 20px;">
                    <div data-container="">
            <label data-label="" class="ThemeGrid_Width4" for="Dropdown4">
            <span style="font-weight: bold;">Horas extra</span>
        </label><div data-container="" class="ThemeGrid_Width5 ThemeGrid_MarginGutter" style="text-align: left;">
            <span onclick="toggleInpu()">
                <input data-switch="" class="switch" type="checkbox" id="Switch2" onclick="toggleInpu()"></span>
            </div>
        </div>
                 <div id="consultaResultado"></div>

              <input type="hidden" value="<?php echo @$id; ?>" name="id_colaborador_extra">
                <input data-input="" name="codigo_obra" value="<?php echo @$ids_obra; ?>"   class="form-control OSFillParent" type="hidden" aria-required="false"  id="id_obra">

                <?php 
                
                $sqlobra =mysqli_query($conexao,"SELECT * FROM obra WHERE codigo = '$ids_obra'");
                while ($obrarow = mysqli_fetch_assoc($sqlobra)) {
                   
                 ?> 
                <input type="hidden"  name="descricao_extra"  value="<?php echo strtoupper($obrarow['descricao']); ?>">
                <?php   } ?>

               
               
        </div>
        
    <div data-container="">
        <label data-label="" class="ThemeGrid_Width5">
            <span style="font-weight: bold;">Hora de Entrada</span>
        </label>
        <span class="input-time">
            <input data-input="" name="entrada" value="00:00" class="form-control OSFillParent" type="time" aria-required="false" value="" id="entrada">
        </span>
    </div>
    <div data-container="">
        <label data-label="" class="ThemeGrid_Width5">
            <span style="font-weight: bold;">Hora de Saida</span>
        </label><span class="input-time">
            <input data-input="" name="saida" value="00:00" class="form-control OSFillParent" type="time" aria-required="false" value="" id="saida">
        </span>
    </div>
    <div data-container="">
        <label data-label="" class="ThemeGrid_Width5">
            <span style="font-weight: bold;">Data</span>
        </label><span class="input-time">
            <input data-input="" name="data_marcada"  class="form-control OSFillParent" type="Date"  >
        </span>
    </div>
<div data-container="">
            <label data-label="" class="ThemeGrid_Width4" for="Dropdown4">
            <span style="font-weight: bold;">Horas extra</span>
        </label>
         
        
    <div  id="Input_TimeIn7" class="hidden" >
                <label data-label="" class="ThemeGrid_Width5">
                    <span style="font-weight: bold;">Hora de Entrada</span>
                </label>
                <span class="input-time">
                    <input data-input="" value="00:00" name="entrada_extra" class="form-control OSFillParent" type="time" aria-required="false" value="" >
                </span>
            </div>
            <div  id="Input_TimeIn6" class="hidden" >
                <label data-label="" class="ThemeGrid_Width5">
                    <span style="font-weight: bold;">Hora de Saida</span>
                </label><span class="input-time">
                    <input data-input="" value="00:00" name="saida_extra" class="form-control OSFillParent" type="time" aria-required="false" >
                </span>
            </div>
            
<br>
            

    <div data-container="" class="align-items-center display-flex">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      
        <button data-button=""  name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit" style="background-color: rgb(89, 172, 227);">Adicionar</button>

                <!-- aqui deve verificar se ele esta em uma obra-->
    </div>
</form>
</div>
        </div></div>
        </div>
              </div></div></div>

<div class="modal fade" id="exampleModaltra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body"> 
        <?php 
@$ids_obra = $_GET['ids_obra'];


 ?>
 <div data-popup=""  class="popup-dialog popup-dialog" role="dialog" aria-modal="">
            <div  class="popup-content">

<form method="post" action="processa_tranferencia.php">
    
     <div id="consultaResultado2">
         
     </div>
     <div data-container="" style="margin-top: 20px;">
        <label data-label="" class="OSFillParent">
            <span style="font-weight: bold;">Pesquisa</span>
        </label>
        <span class="input-time">
    <input data-input="" class="form-control OSFillParent" type="text" id="pesquisa" placeholder="Digite para filtrar..." oninput="filtrar()"  >
</span>
        </div>
<div data-container="" style="margin-top: 20px;">
    <label data-label="" class="OSFillParent">Transferir o colaborador para:</label>
</div>
<div data-container="">
    <div id="Dropdown5-container" class="dropdown-container" data-dropdown="">
        
        <select class="dropdown-display dropdown" required="" name="codigo_obra" aria-disabled="false" id="Dropdown5">
            <?php 
        $listaobra = mysqli_query($conexao,"Select * from obra where codigo <>'$codigoobras' AND id_user =$id_user");

        while ($listaz = mysqli_fetch_assoc($listaobra)) {
            // code...
       


         ?>

        <option value="<?php echo $listaz['codigo'] ?>"><?php echo $listaz['codigo'] ?></option>
        
    <?php  } ?>
    </select>
    
</div>
</div>
<div data-container="" style="margin-top: 20px;">
        <label data-label="" class="OSFillParent">
            <span style="font-weight: bold;">Data</span>
        </label>
        <span class="input-time">
    <input data-input="" class="form-control OSFillParent" required="" type="date"  name="data_marcada" >
</span>
        </div>
    <div data-container="" style="margin-top: 20px;">
        <label data-label="" class="OSFillParent">
            <span style="font-weight: bold;">Hora In para a nova obra</span>
        </label>
        <span class="input-time">
    <input data-input="" class="form-control OSFillParent" required="" type="time" value="00:00"  name="entrada" min="7:00" max="8:30" >
</span>
        </div>
        <div data-container="" style="margin-top: 20px;">
            <label data-label="" class="OSFillParent">
                <span style="font-weight: bold;">Hora Out para a nova obra</span>
            </label>
            <span class="input-time">
                <input data-input="" class="form-control OSFillParent" required="" value="00:00" type="time" aria-required="true" name="saida" id="Input_DateTimeVar2"></span>
            </div>
            <div data-container="" style="margin-top: 20px;">
                
            </div>
            <div data-container="">
            <label data-label="" class="ThemeGrid_Width4" for="Dropdown4">
            <span style="font-weight: bold;">Horas extra</span>
        </label><div data-container="" class="ThemeGrid_Width5 ThemeGrid_MarginGutter" style="text-align: left;">
            <span onclick="toggleInpus()">
                <input data-switch="" class="switch" type="checkbox" id="Switch3" onclick="toggleInpus()"></span>
            </div>
        </div>
    <div  id="Input_TimeIn0" class="hidden" >
                <label data-label="" class="ThemeGrid_Width5">
                    <span style="font-weight: bold;">Hora de Entrada da Hora Extra</span>
                </label>
                <span class="input-time">
                    <input data-input="" value="00:00" name="entrada_extra" class="form-control OSFillParent" type="time" aria-required="false" value="" >
                </span>
            </div>
            <div  id="Input_TimeIn9" class="hidden" >
                <label data-label="" class="ThemeGrid_Width5">
                    <span style="font-weight: bold;">Hora de Saida da Hora Extra</span>
                </label><span class="input-time">
                    <input data-input="" value="00:00" name="saida_extra" class="form-control OSFillParent" type="time" aria-required="false" >
                </span>
            </div>
            
            <div data-container="" style="margin-top: 40px;">
                <a data-button="" data-dismiss="modal" class="btn" >Sair</a>
                <button data-button="" name="butao"  class="btn btn-primary" type="submit" >Transferir</button>
            </div>
        </div>
</form>
                
               
</div></div></div>
        </div></div>
        </div>
              </div></div>

 <!-- esse modal e para fazer tranferencia de um colabordor para outra obra-->


<!-- esse modal e para Adicionar hora extra ao colaborador-->
<?php 
@$idobra_exta = $_GET['idobra_exta'];
@$idextra = $_GET['idextra'];
$sqlextra =mysqli_query($conexao,"SELECT * FROM colaborador WHERE id_colaborador = '$idextra'");

while ($listaextra = mysqli_fetch_assoc($sqlextra)) {
    // code...




 ?>
    <div class="popup-backdrop" data-popup-backdrop=""  style="display:block; padding-left: 360px;" id="meupoextra">
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

            
           
        </span>
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
                    <input data-input="" value="<?php echo   $datarow['entrada']; ?>" name="entrada" class="form-control OSFillParent" type="time" aria-required="false"  id="Input_TimeIn">
                </span>
            </div>
            <div data-container="">
                <label data-label="" class="OSFillParent" for="Input_TimeOut">
                    <span style="font-weight: bold;">Hora de Entrada Extra</span>
                </label>
                <span class="input-time">
                    <input data-input="" class="form-control OSFillParent" type="time" aria-required="false" value="00:00" name="entrada_extra" id="Input_TimeOut">
                </span>
            </div>
        </div>
        <div class="columns-item" id="b11-Column2">
            <div data-container="" style="margin-top: 0px;">
                <label data-label="" class="OSFillParent" for="Input_TimeIn2" style="margin-top: 2px;">
                    <span style="font-weight: bold;">Hora de Saida</span>
                </label>
                <span class="input-time">
                    <input data-input="" class="form-control OSFillParent" type="time" aria-required="false"  value="<?php echo   $datarow['saida']; ?>" name="saida" id="Input_TimeIn2" step ="60">
                </span>
            </div>
            <div data-container="">
                <label data-label="" class="OSFillParent" for="Input_TimeOut2">
                    <span style="font-weight: bold;">Hora de saida Extra</span>
                </label>
                <span class="input-time">
                    <input data-input="" class="form-control OSFillParent" type="time" aria-required="false" value="00:00" name="saida_extra" id="Input_TimeOut2">
                </span>
            </div>
        </div>
    </div>
</div>
<?php } ?>
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
<footer data-advancedhtml="" role="contentinfo" class="content-bottom"><div class="footer ph" id="b1-Bottom"><div data-block="Common.BottomBar" class="OSBlockWidget" id="$b12"><div data-container="" class="bottom-bar-wrapper"><div data-container="" class="bottom-bar ph"></div></div></div></div></footer></div><div data-container="" class="offline-data-sync"><div data-block="Common.OfflineDataSyncEvents" class="OSBlockWidget" id="b1-$b2"><div data-block="Private.OfflineDataSyncCore" class="OSBlockWidget" id="b1-b2-$b1"><div data-block="Private.NetworkStatusChanged" class="OSBlockWidget" id="b1-b2-b1-$b1"><div data-container=""></div></div></div></div></div></div></div></div></div></div></div>
        
<script src="../js/jquery.js"></script> 
<script src="../js/bootstrap.js"></script>

    <script src="../js/filtrocliente.js"></script>
     <script src="../js/modal.js"></script>
     <script src="../js/time.js"></script>

    

<script>
  // Ao esxibir o modal, atualize o valor do ID do usuário
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var idUser = button.data('iduser');
    var modal = $(this);
    modal.find('#userId').text(idUser);
  });
</script>
<script>
  // Ao exibir o modal, atualize o valor do ID do usuário
  $('#exampleModaltra').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var idUser = button.data('iduser');
    var modal = $(this);
    modal.find('#userId').text(idUser);
  });
</script>

<script>
$(document).ready(function() {
  // Ao exibir o modal, fazer a requisição AJAX
  $('#exampleModaltra').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var idUser = button.data('iduser');
    console.log(idUser);
    $.ajax({
      url: 'consulta_usuario2.php', // O arquivo PHP que manipula a consulta ao banco de dados
      type: 'POST',
      data: { id: idUser },
      success: function(response) {
        $('#consultaResultado2').html(response);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });
});
</script>

<script>
$(document).ready(function() {
  // Ao exibir o modal, fazer a requisição AJAX
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var idUser = button.data('iduser');
    console.log(idUser);
    $.ajax({
      url: 'consulta_usuario.php', // O arquivo PHP que manipula a consulta ao banco de dados
      type: 'POST',
      data: { id: idUser },
      success: function(response) {
        $('#consultaResultado').html(response);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });
});
</script>


<script>
        // Função para enviar solicitação de atualização quando a checkbox é alterado
        document.getElementById("statusCheckbox").addEventListener("change", function() {
            var status = this.checked ? 1 : 0; // 1 para true, 0 para false
            var idobra = document.getElementById("obrass").value;
            console.log(status);

            // Aqui você pode enviar uma solicitação AJAX para atualizar o status no banco de dados
            // Exemplo com XMLHttpRequest:
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "actualiza_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Lógica para lidar com a resposta da solicitação, se necessário
                }
            };
            xhr.send("status=" + status + "&idobra=" + idobra);
        });
    </script>



     <script type="text/javascript">

    function toggleInpu(){
        var switchT = document.getElementById("Switch2");
        var inputF = document.getElementById("Input_TimeIn6");
        var inputF2 = document.getElementById("Input_TimeIn7");
        

       
        switchT.checked =! switchT.checked;
        console.log(switchT);
        if (switchT.checked) {
            inputF2.classList.remove("hidden");
            inputF.classList.remove("hidden");
            ppp.style.display = "none";

            

            
        }else{
            inputF2.classList.add("hidden");
            inputF.classList.add("hidden");
        }
    }
    
</script>

<script type="text/javascript">

    function toggleInpus(){
        var switchT = document.getElementById("Switch3");
        var inputF = document.getElementById("Input_TimeIn9");
        var inputF2 = document.getElementById("Input_TimeIn0");
        

       
        switchT.checked =! switchT.checked;
        console.log(switchT);
        if (switchT.checked) {
            inputF2.classList.remove("hidden");
            inputF.classList.remove("hidden");
            ppp.style.display = "none";

            

            
        }else{
            inputF2.classList.add("hidden");
            inputF.classList.add("hidden");
        }
    }
    
</script>
<script>
 $(document).ready(function() {
    var initialResults = $('#initialData').html();
    $('#searchInput').on('input', function() {
        const query = $(this).val();

        // Se o campo de pesquisa estiver vazio, mostra os dados iniciais e oculta os resultados da pesquisa
        if (query === '') {
            location.reload();

            return; // Retorna para evitar que a solicitação AJAX seja feita
        }
        console.log(initialResults);

        // Faz uma solicitação AJAX para buscar os resultados da pesquisa no servidor
        $.ajax({
            url: 'pesquisa2.php?ids_obra=<?php echo $_GET['ids_obra']; ?>', // Caminho para o script PHP que busca os resultados da pesquisa com o id da obra
            method: 'POST',
            data: { query: query }, // Envia o termo de pesquisa para o servidor
            success: function(response) {
                $('#initialData').hide();
                $('#searchResults').children().not('#initialData').remove();
                $('#searchResults').append(response); // Atualiza os resultados da pesquisa com a resposta do servidor
            }
        });
    });
});
   </script>
   
   <?php } ?>


   <script>
        function filtrar() {
            const termo = document.getElementById("pesquisa").value.toLowerCase();
            const dropdown = document.getElementById("Dropdown5");
            const opcoes = dropdown.getElementsByTagName("option");

            for (let i = 0; i < opcoes.length; i++) {
                const texto = opcoes[i].textContent.toLowerCase();
                if (texto.includes(termo)) {
                    opcoes[i].style.display = "";
                } else {
                    opcoes[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>