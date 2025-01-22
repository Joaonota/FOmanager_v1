<input type="text" id="searchInput" placeholder="Pesquisar...">
<div id="dataList">
  <div class="dataItem" data-block="1">Dado 1</div>
  <div class="dataItem" data-block="2">Dado 2</div>
  <div class="dataItem" data-block="3">Dado 3</div>
</div>
<?php require "estilo.php" ?>
<div  id="searchResults">
    <div id="initialData">
<?php 
@$id = $_GET['id'];
                   $mysqlshow = mysqli_query($conexao,"SELECT  * FROM obra where status = 'ativo' ");
                   while ($rows= mysqli_fetch_assoc($mysqlshow)) {
                       // code...
                   


                    ?>

<div data-list-item=""  data-block="Content.Accordion"  class="list-item" id="l1-30_0-ListItem1" style="background-color: white;">
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
    


<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-green-lightest text-green-darker OSInline" id="l1-30_0-b9-Tag"><?php echo strtoupper($rows['status_apro']); ?></div>
    </div>
</div>
<?php }  ?>

<?php if ($rows['status_apro'] == "espera"){

?>
    

<a onclick="mostrapovalida()" href="lista_obra.php?obra=<?php echo $rows['codigo']; ?>">
<div data-container="" class="ThemeGrid_Width2 ThemeGrid_MarginGutter" style="text-align: left;">
    <div data-block="Content.Tag" class="OSBlockWidget" id="l1-30_0-$b9">
        <div class="tag border-radius-rounded background-primary background-yellow-lightest text-yellow-darker OSInline" id="l1-30_0-b9-Tag">Validar</div>
    </div>
</div>
</a>
<?php }  ?>
<?php if ($rows['status_apro'] == "reprovado"){

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
                <a data-link="" href="">
                    <i data-icon="" class="icon fa fa-plus-square fa-2x" style="color: rgb(89, 172, 227); font-size: 34px;">
                </i>
            </a>
            </div>
                <div data-container="" class="ThemeGrid_Width4 ThemeGrid_MarginGutter" style="text-align: center; height: 34px;">
                    <a data-link="" href="testepoupo.php?ids_obra=<?php echo $rows['codigo']; ?>">
                        <i data-icon="" class="icon fa fa-list " style="color: rgb(89, 227, 179); font-size: 34px; height: 34px; margin-top: 3px;">
                            
                        </i>
                    </a>
                </div>
    <div data-container="" class="ThemeGrid_Width3 ThemeGrid_MarginGutter" style="text-align: right; color: rgb(224, 82, 67);"><i data-icon="" class="fa fa-trash-o" style="font-size: 34px;">
        
    </i>
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

<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){
    $('#searchInput').keyup(function(){
        var query = $(this).val();
        $.ajax({
            url: 'pesquisa1.php',
            method: 'POST',
            data: {query: query},
            success: function(response){
                $('#searchResults').html(response);
            }
        });
    });
});
</script>

  