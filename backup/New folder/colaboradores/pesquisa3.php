<?php
require "../estilo.php"; // Certifique-se de incluir a conexão com o banco de dados

if(isset($_POST['query'])) {
    $search = $_POST['query'];
    $sql = "SELECT * FROM colaborador WHERE nome LIKE '%$search%' or cargo LIKE '%$search%' or cell LIKE '%$search%'";
    $result = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($rows = mysqli_fetch_assoc($result)) {
            echo '<div data-block="Content.AccordionItem" class="OSBlockWidget" id="l1-5_23-$b9">
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
            <i data-icon="" class="icon fa fa-user fa-2x" style="color: rgb(146, 152, 156);"></i><span data-expression="" class="margin-left-base">'.strtoupper($rows['nome']).'</span>
        </div>
    </div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column2">
    <div data-container="" class="margin-top-xs">
        <span data-expression="" class="font-size-base">'.strtoupper($rows['cargo']).'</span>
    </div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column3">
    <div data-container="" class="margin-top-xs"></div>
</div>
<div class="columns-item" id="l1-5_0-b10-Column4">
    <div data-container="" class="margin-top-xs">
        <div data-block="Content.Tag" class="OSBlockWidget" id="l1-5_0-$b12">';
           
            if (trim($rows['status']) == "ativo") {
             echo '<div class="tag tag-small border-radius-rounded background-primary background-green-lightest text-green-darker OSInline" id="l1-5_0-b12-Tag">
                <span data-expression="">'.strtoupper($rows['status']).'</span>
            </div>';
        } elseif (trim($rows['status']) == 'inativo') {
            echo '<div class="tag tag-small border-radius-rounded background-primary background-red-lightest text-red-darker OSInline" id="l1-5_0-b12-Tag">
                <span data-expression="">'.strtoupper($rows['status']).'</span>
            </div>';
       }
       echo '</div>
    </div>
</div>
</div>
</div>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
       <a data-link="" href="edita_colaborador.php?id_d_cola='.strtoupper($rows['id_colaborador']).'" style="color: red;">
        <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
        </i>
        </a>
</div>
<div data-container="" class="ThemeGrid_Width ThemeGrid_MarginGutter" style=" color: rgb(224, 82, 67);">
<a data-link="" href="javascript:void(0);" onclick="if(confirm(\'Tem certeza que deseja deletar este colaborador?\')) { window.location.href=\'processa_deleta_colaborador.php?func=deletar&id_d_cola='.strtoupper($rows['id_colaborador']).'\'; }" style="color: red;">
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
</div>';
        }
    } else {
        echo 'Nenhum resultado encontrado';
    }
}
?>
