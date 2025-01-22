<!DOCTYPE html>
<html lang="en">
<head>
<?php require "estilo.php" ?>
<title>Lista de Colaborador</title>
<body>
  
<div id="reactContainer">
   <div  id="transitionContainer">
    <div class="active-screen screen-container slide-from-right-enter-done">
    <div data-block="Common.Layout" class="OSBlockWidget" id="$b1">
    <div   class="layout layout-side layout-native ios-bounce aside" id="b1-LayoutWrapper">
        <!-- drawer-->
    <?php require "drawer.php" ?>
<h1 data-advancedhtml="" class="header-title">
            </h1>
            <h1 data-advancedhtml="" class="header-title">
                <div class="OSInline" id="b1-Title">
                    <span style="font-weight: bold;">Colaboradores</span>
                </div>
            </h1>
            <div class="header-right" id="b1-HeaderRight">
                <a data-link="" href="add_colaborador.php" id="Add_link">
                    <i data-icon="" class="icon fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
    </div>
</div>
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
            <div data-block="Utilities.MarginContainer" class="OSBlockWidget" id="$b3">
                <div data-container="" class="margin-container ">
                    <div id="b3-MarginContainer">
                        <div data-container="" style="text-align: right;">
                            <div data-container="" class="ThemeGrid_Width2" style="text-align: right;">
                                <div data-block="DownloadFlow.Download" class="OSBlockWidget" id="$b4">
                                    <span hidden="">&lt;Downlosssad&gt;</span></div><a data-link="" class="ThemeGrid_MarginGutter" href="excel_colaborador.php"><i data-icon="" class="icon fa fa-file-excel-o fa-2x"></i></a></div>
                                    <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: left;">
                                        <div data-block="Interaction.InputWithIcon" class="OSBlockWidget" id="$b5">
                                            <div data-container="" class="input-with-icon " id="b5-InputWithIconWrapper">
                                                <div class="input-with-icon-content-icon center ph" id="b5-Icon">
                                                    <i data-icon="" class="icon fa fa-search fa-1x"></i>
                                                </div>
 <div class="input-with-icon-input" id="b5-Input">
    <div data-block="Interaction.Search" class="OSBlockWidget" id="$b6">
        <div data-container="" class="search  " role="search">
            <div class="search-input" id="b6-Input">
                <span class="input-search">
            <input data-input="" class="form-control ThemeGrid_Width5" type="text" placeholder="Procurar obra"  id="searchInput"></span>
        </div>
                <div data-container="" class="search-glass" style="cursor: pointer;">
                    <div data-container="" class="search-stick-bottom">
                        
                    </div>
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


<div data-block="Content.Accordion" id="tab2" class="tab-content active"  >
    <div class="osui-accordion margin-top-l" name="0.f37w7ue0yms" id="b8-Content" role="tablist">
        <div data-list="" data-virtualization-disabled="" class="list list-group OSFillParent" disable-virtualization="True">
            <?php 

$mysqlshow = mysqli_query($conexao, "SELECT * FROM colaborador WHERE status = 'ativo' ");

while ($rows = mysqli_fetch_assoc($mysqlshow)) {
    // code...



 ?>

            
<div data-block="Content.AccordionItem" class="OSBlockWidget" id="l1-5_23-$b9">
    <div data-container="" class="osui-accordion-item osui-accordion-item--is-closed" name="0.94g9q4znk6o" id="l1-5_23-b9-AccordionItem" aria-disabled="false" aria-controls="l1-5_23-b9-Content" role="tab" aria-expanded="false"></div>
</div>
<div data-block="Content.AccordionItem" class="OSBlockWidget" id="l1-5_205-$b9">
    <div data-container="" class="osui-accordion-item osui-accordion-item--is-closed" >
        <div data-container="" class="osui-accordion-item__title osui-accordion-item__title--is-right" id="l1-5_205-b9-TitleWrapper" tabindex="0" role="button" aria-expanded="false">
            <div class="osui-accordion-item__title__placeholder" id="l1-5_205-b9-Title">
                <div data-block="Adaptive.Columns4" class="OSBlockWidget" id="l1-5_205-$b10">
                    <div data-container="" class="columns columns4 gutter-base tablet-break-middle phone-break-all ">

    <div data-container="" class="osui-accordion-item__title osui-accordion-item__title--is-right" id="l1-5_0-b9-TitleWrapper" tabindex="0" role="button" aria-expanded="false">
        <div class="osui-accordion-item__title__placeholder" id="l1-5_0-b9-Title">
            <div data-block="Adaptive.Columns4" class="OSBlockWidget" id="l1-5_0-$b10">
                <div data-container="" class="columns columns4 gutter-base tablet-break-middle phone-break-all ">
                    <div class="columns-item" id="l1-5_0-b10-Column1">
                        <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-5_0-$b11">
        <div class="vertical-align flex-direction-row" id="l1-5_0-b11-Content">
            <i data-icon="" class="icon fa fa-user fa-2x" style="color: rgb(146, 152, 156);"></i>
            <span data-expression="" data-nome="<?php echo strtoupper($row['nome']); ?>" class="margin-left-base"><?php echo strtoupper($rows['nome']); ?></span>
        </div>
    </div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column2">
    <div data-container="" class="margin-top-xs">
        <span data-expression="" class="font-size-base"><?php echo $rows['cargo']; ?></span>
    </div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column3">
    <div data-container="" class="margin-top-xs"></div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column4">
    <div data-container="" class="margin-top-xs">
        <div data-block="Content.Tag" class="OSBlockWidget" id="l1-5_0-$b12">
            <div class="tag tag-small border-radius-rounded background-primary background-green-lightest text-green-darker OSInline" id="l1-5_0-b12-Tag">
                <span data-expression="">ativo</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="edita_colaborador.php?id_d_cola=<?php echo $rows['id_colaborador']; ?>" style="color: red;">
        <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
        </i>
        </a>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="javascript:void(0);" onclick="if(confirm('Tem certeza que deseja deletar este colaborador?')) { window.location.href='processa_deleta_colaborador.php?func=deletar&id_d_cola=<?php echo $rows['id_colaborador']; ?>'; }" style="color: red;">
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
</div>
<?php } ?>
</div>
</div>
</div>

<div data-block="Content.Accordion" id="tab1" class="tab-content" >
    <div class="osui-accordion margin-top-l" name="0.f37w7ue0yms" id="b8-Content" role="tablist">
        <div data-list="" data-virtualization-disabled="" class="list list-group OSFillParent" disable-virtualization="True">
            <?php 

$mysqlshow = mysqli_query($conexao, "SELECT * FROM colaborador");

while ($rows = mysqli_fetch_assoc($mysqlshow)) {
    // code...



 ?>

            
<div data-block="Content.AccordionItem" class="OSBlockWidget" id="l1-5_23-$b9">
    <div data-container="" class="osui-accordion-item osui-accordion-item--is-closed" name="0.94g9q4znk6o" id="l1-5_23-b9-AccordionItem" aria-disabled="false" aria-controls="l1-5_23-b9-Content" role="tab" aria-expanded="false"></div>
</div>
<div data-block="Content.AccordionItem" class="OSBlockWidget" id="l1-5_205-$b9">
    <div data-container="" class="osui-accordion-item osui-accordion-item--is-closed" name="0.j6zjqseu3g" id="l1-5_205-b9-AccordionItem" aria-disabled="false" aria-controls="l1-5_205-b9-Content" role="tab" aria-expanded="false">
        <div data-container="" class="osui-accordion-item__title osui-accordion-item__title--is-right" id="l1-5_205-b9-TitleWrapper" tabindex="0" role="button" aria-expanded="false">
            <div class="osui-accordion-item__title__placeholder" id="l1-5_205-b9-Title">
                <div data-block="Adaptive.Columns4" class="OSBlockWidget" id="l1-5_205-$b10">
                    <div data-container="" class="columns columns4 gutter-base tablet-break-middle phone-break-all ">

    <div data-container="" class="osui-accordion-item__title osui-accordion-item__title--is-right" id="l1-5_0-b9-TitleWrapper" tabindex="0" role="button" aria-expanded="false">
        <div class="osui-accordion-item__title__placeholder" id="l1-5_0-b9-Title">
            <div data-block="Adaptive.Columns4" class="OSBlockWidget" id="l1-5_0-$b10">
                <div data-container="" class="columns columns4 gutter-base tablet-break-middle phone-break-all ">
                    <div class="columns-item" id="l1-5_0-b10-Column1">
                        <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-5_0-$b11">
        <div class="vertical-align flex-direction-row" id="l1-5_0-b11-Content">
            <i data-icon="" class="icon fa fa-user fa-2x" style="color: rgb(146, 152, 156);"></i><span data-expression="" class="margin-left-base"><?php echo strtoupper($rows['nome']); ?></span>
        </div>
    </div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column2">
    <div data-container="" class="margin-top-xs">
        <span data-expression="" class="font-size-base"><?php echo $rows['cargo']; ?></span>
    </div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column3">
    <div data-container="" class="margin-top-xs"></div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column4">
    <div data-container="" class="margin-top-xs">
        <div data-block="Content.Tag" class="OSBlockWidget" id="l1-5_0-$b12">
            <?php 
            if ($rows['status'] == 'ativo' ) {


             ?>
             <div class="tag tag-small border-radius-rounded background-primary background-green-lightest text-green-darker OSInline" id="l1-5_0-b12-Tag">
                <span data-expression=""><?php echo $rows['status']; ?></span>
            </div>
        <?php } ?>
        <?php 
            if ($rows['status'] == 'inativo' ) {


             ?>
             <div class="tag tag-small border-radius-rounded background-primary background-red-lightest text-red-darker OSInline" id="l1-5_0-b12-Tag">
                <span data-expression=""><?php echo $rows['status']; ?></span>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="edita_colaborador.php?id_d_cola=<?php echo $rows['id_colaborador']; ?>" style="color: red;">
        <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
        </i>
        </a>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="processa_deleta_colaborador.php?func=deletar&id_d_cola=<?php echo $rows['id_colaborador']; ?>" style="color: red;">
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
</div>
<?php } ?>
</div>
</div>
</div>
<div data-block="Content.Accordion" id="tab3" class="tab-content" >
    <div class="osui-accordion margin-top-l" name="0.f37w7ue0yms" id="b8-Content" role="tablist">
        <div data-list="" data-virtualization-disabled="" class="list list-group OSFillParent" disable-virtualization="True">
            <?php 

$mysqlshow = mysqli_query($conexao, "SELECT * FROM colaborador WHERE status = 'inativo' ");

while ($rows = mysqli_fetch_assoc($mysqlshow)) {
    // code...



 ?>

            
<div data-block="Content.AccordionItem" class="OSBlockWidget" id="l1-5_23-$b9">
    <div data-container="" class="osui-accordion-item osui-accordion-item--is-closed" name="0.94g9q4znk6o" id="l1-5_23-b9-AccordionItem" aria-disabled="false" aria-controls="l1-5_23-b9-Content" role="tab" aria-expanded="false"></div>
</div>
<div data-block="Content.AccordionItem" class="OSBlockWidget" id="l1-5_205-$b9">
    <div data-container="" class="osui-accordion-item osui-accordion-item--is-closed" name="0.j6zjqseu3g" id="l1-5_205-b9-AccordionItem" aria-disabled="false" aria-controls="l1-5_205-b9-Content" role="tab" aria-expanded="false">
        <div data-container="" class="osui-accordion-item__title osui-accordion-item__title--is-right" id="l1-5_205-b9-TitleWrapper" tabindex="0" role="button" aria-expanded="false">
            <div class="osui-accordion-item__title__placeholder" id="l1-5_205-b9-Title">
                <div data-block="Adaptive.Columns4" class="OSBlockWidget" id="l1-5_205-$b10">
                    <div data-container="" class="columns columns4 gutter-base tablet-break-middle phone-break-all ">

    <div data-container="" class="osui-accordion-item__title osui-accordion-item__title--is-right" id="l1-5_0-b9-TitleWrapper" tabindex="0" role="button" aria-expanded="false">
        <div class="osui-accordion-item__title__placeholder" id="l1-5_0-b9-Title">
            <div data-block="Adaptive.Columns4" class="OSBlockWidget" id="l1-5_0-$b10">
                <div data-container="" class="columns columns4 gutter-base tablet-break-middle phone-break-all ">
                    <div class="columns-item" id="l1-5_0-b10-Column1">
                        <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-5_0-$b11">
        <div class="vertical-align flex-direction-row" id="l1-5_0-b11-Content">
            <i data-icon="" class="icon fa fa-user fa-2x" style="color: rgb(146, 152, 156);"></i><span data-expression=""  class="margin-left-base"><?php echo strtoupper($rows['nome']); ?></span>
        </div>
    </div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column2">
    <div data-container="" class="margin-top-xs">
        <span data-expression="" class="font-size-base"><?php echo $rows['cargo']; ?></span>
    </div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column3">
    <div data-container="" class="margin-top-xs"></div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column4">
    <div data-container="" class="margin-top-xs">
        <div data-block="Content.Tag" class="OSBlockWidget" id="l1-5_0-$b12">
            <div class="tag tag-small border-radius-rounded background-primary background-red-lightest text-red-darker OSInline" id="l1-5_0-b12-Tag">
                <span data-expression="">Inativo</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="edita_colaborador.php?id_d_cola=<?php echo $rows['id_colaborador']; ?>" style="color: red;">
        <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
        </i>
        </a>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="processa_deleta_colaborador.php?func=deletar&id_d_cola=<?php echo $rows['id_colaborador']; ?>" style="color: red;">
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
</div>
<?php } ?>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>

 <script src="js/aba.js"></script> 
  <script src="js/modal.js"></script>
  <script src="js/jquery.js"></script>
  <script>
// $(document).ready(function() {
//    var initialResults = $('#initialData').html();
//    $('#searchInput').on('input', function() {
//        const query = $(this).val();
//
//        // Se o campo de pesquisa estiver vazio, mostra os dados iniciais e oculta os resultados da pesquisa
//        if (query === '') {
//            location.reload();
//
//            return; // Retorna para evitar que a solicitação AJAX seja feita
//        }
//        console.log(initialResults);
//
//        // Faz uma solicitação AJAX para buscar os resultados da pesquisa no servidor
//        $.ajax({
//            url: 'pesquisa3.php', // Caminho para o script PHP que busca os resultados da pesquisa
//            method: 'POST',
//            data: { query: query }, // Envia o termo de pesquisa para o servidor
//            success: function(response) {
//                $('#initialData').hide();
//                $('#searchResults').children().not('#initialData').remove();
//                $('#searchResults').append(response); // Atualiza os resultados da pesquisa com a resposta do servidor
//            }
//        });
//    });
//});
//Melhorar a Pesquisa AJAX
$(document).ready(function() {
    var initialResults = $('#initialData').html();
    $('#searchInput').on('input', function() {
        const query = $(this).val();

        // Se o campo de pesquisa estiver vazio, mostra os dados iniciais e oculta os resultados da pesquisa
        if (query === '') {
            $('#initialData').show();
            $('#searchResults').children().not('#initialData').remove();
            return;
        }

        // Faz uma solicitação AJAX para buscar os resultados da pesquisa no servidor
        $.ajax({
            url: 'pesquisa3.php', // Caminho para o script PHP que busca os resultados da pesquisa
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

function confirmDelete(id) {
    var confirmation = confirm("Tem certeza que deseja excluir este colaborador?");
    if (confirmation) {
        window.location.href = 'processa_deleta_colaborador.php?func=deletar&id_d_cola=' + id;
    }
}


   </script>
</body>
</html>