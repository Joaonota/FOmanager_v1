<?php
require "../estilo.php";
$ids_obra = $_GET['ids_obra'];

if(isset($_POST['query'])) {
    $search = $_POST['query'];
    $sql = "SELECT * FROM colaborador WHERE nome LIKE '%$search%' or cargo  LIKE '%$search%' or cell  LIKE '%$search%'";
    $result = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($rows = mysqli_fetch_assoc($result)) {
            // <button data-toggle="modal" data-target="#exampleModal" data-iduser="'.$rows['id_colaborador'].'" type="button" style="color: rgb(99, 188, 129); font-size: 32px;">
 // Exibir os resultados da pesquisa

 echo '<div data-block="Content.Card" class="OSBlockWidget" id="b9">
 <div class="ph card card-content card-overflow" id="b9-Content">
     <div data-list="" class="list list-group OSFillParent" style="position: relative;">
         <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-56_120-ListItem2">
             <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-56_120-b10">
                 <div class="vertical-align flex-direction-row" id="l4-56_120-b10-Content">
                     <span data-expression="" class="bold ThemeGrid_Width10">' . strtoupper($rows['nome']) . '</span>
                     <a href="modaln.php?id_user=' . $rows['id_colaborador'] . '&id_obra=' . $ids_obra . '">
                        <i data-icon="" class="icon fa fa-plus fa-lg" style="color: green; font-size: 32px;"></i>
                     </a>
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

<script>
$(document).ready(function(){
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var idUser = button.data('iduser');
        var modal = $(this);
        modal.find('.modal-body input').val(idUser);
    });
});
</script>
