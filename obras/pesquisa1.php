<?php
require "../int.php"; 
require "../estilo.php";


if(isset($_POST['query'])) {
    $search = $_POST['query'];
    $sql = "SELECT * FROM obra WHERE codigo LIKE '%$search%' or cliente  LIKE '%$search%' or datai  LIKE '%$search%' or dataf  LIKE '%$search%' ORDER BY codigo ASC";
    $result = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($rows = mysqli_fetch_assoc($result)) {
            // Exibir os resultados da pesquisa

            echo '<div data-block="Content.Accordion"  id="tab2" class="tab-content active">


<div data-list-item="" class="list-item" id="l1-30_0-ListItem1" style="background-color: white;">
    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-30_0-$b7">
        <div class="vertical-align flex-direction-row" id="l1-30_0-b7-Content">
            <span data-expression="" class="bold ThemeGrid_Width3">'.$rows['codigo'].'</span>
            <span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter">'.$rows['descricao'].'</span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter">'.$rows['datai'].'</span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter">'.$rows['dataf'].'</span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter">'.$rows['cliente'].'</span>
<span data-expression="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter">'.$rows['localizacao'].'</span>';
if ($rows['status_apro'] == "aprovado"){

echo '<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-green-lightest text-green-darker OSInline" id="l1-30_0-b9-Tag">'.strtoupper($rows['status_apro']).'</div>
    </div>
</div>';
}elseif ($rows['status_apro'] == "espera") {
    echo '<a onclick="mostrapovalida()" href="lista_obra.php?obra='.$rows['codigo'].'">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-yellow-lightest text-yellow-darker OSInline" id="l1-30_0-b9-Tag">Validar</div>
    </div>
</div>
</a>';
}elseif ($rows['status_apro'] == "reprovado") {
   echo '<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-red-lightest text-red-darker OSInline" id="l1-30_0-b9-Tag">'.strtoupper($rows['status_apro']).'</div>
    </div>
</div>';
}
echo '<div data-container="" class="ThemeGrid_Width3" style="text-align: center; height: 34px;">
    <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l1-30_0-$b11">
        <div class="vertical-align flex-direction-row" id="l1-30_0-b11-Content">
            <div data-container="" class="ThemeGrid_Width3" style="text-align: left;">
                <a data-link="" href="">
                    <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 172, 227); font-size: 34px;">
                </i>
            </a>
            </div>
                <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: center; height: 34px;">
                    <a data-link="" href="detalhe_obra.php?ids_obra='.$rows['codigo'].'">
                        <i data-icon="" class="icon fa fa-list " style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
     <div data-container="" class="ThemeGrid_Width3 ThemeGrid_MarginGutter" style="text-align: right; color: rgb(224, 82, 67);">
    <a data-link="" href="#" onclick="if(confirm(\'Deseja realmente deletar esta obra?\')) { window.location.href = \'processa_deletar_obra.php?func=deletar&ido='.$rows['id_obra'].'\'; }" style="color: red;">
        <i data-icon="" class="fa fa-trash-o" style="font-size: 34px;"></i>
    </a>
</div>
    </i>
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