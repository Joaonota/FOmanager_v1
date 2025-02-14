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
<?php 
require "../estilo.php";
$id_user = $_GET['id_user'];
$id_obra  = $_GET['id_obra'];

 ?>
 <?php 
$mysss = mysqli_query($conexao,"SELECT * FROM colaborador WHERE id_colaborador = $id_user");
while ($rows = mysqli_fetch_assoc($mysss)) {
  


  ?>
  <style>body {overflow-y: scroll;}</style>
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
        <span data-expression="" style="font-weight: bold;"><?php echo strtoupper($rows["nome"]) ?></span>

        <?php   $sqlverfica = mysqli_query($conexao,"select * from obra_andamento where id_colaborador = '$id_user' ");
 /*' <button data-toggle="modal" type="button" data-target="#exampleModaltra" data-iduser="'.$idss.'" >
 <i data-icon="" class="icon fa fa-exchange fa-2x" style="color: rgb(78, 213, 85);">
  </i>
</a>';*/

         if (mysqli_num_rows($sqlverfica)> 0) {
            echo ' <button data-toggle="modal" type="button" data-target="#exampleModaltra" data-iduser="'.$id_user.'" >
            <i data-icon="" class="icon fa fa-exchange fa-2x" style="color: rgb(78, 213, 85);">
                     </i>
                </a>';
            
        }else{
            echo '<div data-container="" class="ThemeGrid_Width5 ThemeGrid_MarginGutter" style="text-align: right;">
            <i data-icon="" class="icon fa fa-exchange fa-2x" style="color: rgb(191, 191, 191); font-size: 32px;"></i>
        </div>';
            

           

        }

         ?>

         

         <input type="hidden" value="<?php echo @$id_user; ?>" name="id_colaborador_extra">
         <input type="hidden" value="<?php echo @$id_user; ?>" name="id_colaborador">
         <input type="hidden" value="<?php echo strtoupper($rows["nome"]) ?>" name="colaborador">

         <input type="hidden" value="<?php echo strtoupper($rows["cell"]) ?>" name="cell">
                
         <input data-input="" name="codigo_obra" value="<?php echo @$id_obra; ?>"   class="form-control OSFillParent" type="hidden" aria-required="false"  id="id_obra">
         <?php 
                
                $sqlobra =mysqli_query($conexao,"SELECT * FROM obra WHERE codigo = '$id_obra'");
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
            <div  id="Input_TimeIn6" >
                    <label data-label="" class="OSFillParent" for="Checkbox1">Activo</label>
                    <span><input data-checkbox="on" name="status" class="checkbox" type="checkbox"  id="Checkbox1"></span>
                   
            </div>
<br>
            

    <div data-container="" class="align-items-center display-flex">
        
        <button type="button" class="btn btn-secondary" onclick="history.back()">Fechar</button>
      
        <button data-button=""  name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit" style="background-color: rgb(89, 172, 227);">Adicionar</button>

                <!-- aqui deve verificar se ele esta em uma obra-->
    </div>
</form>
</div>
        </div></div>
        </div>
              </div></div>   </div>

<?php } ?>




<div class="modal fade" id="exampleModaltra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body"> 
        <?php 
@$id_obra = $_GET['id_obra'];


 ?>
 <div data-popup=""  class="popup-dialog popup-dialog" role="dialog" aria-modal="">
            <div  class="popup-content">

<form method="post" action="processa_tranferencia.php">
    
     <div id="consultaResultado2">
         
     </div>
<div data-container="" style="margin-top: 20px;">
    <label data-label="" class="OSFillParent">Transferir o colaborador para:</label>
</div>
<div data-container="">
    <div id="Dropdown5-container" class="dropdown-container" data-dropdown="">
        
        <select class="dropdown-display dropdown" required="" name="codigo_obra" aria-disabled="false" id="Dropdown5">
            <?php 
        $listaobra = mysqli_query($conexao,"Select * from obra");

        while ($listaz = mysqli_fetch_assoc($listaobra)) {

         ?>

        <option value="<?php echo $listaz['codigo'] ?>"><?php echo $listaz['codigo'] ?></option>
        
    <?php  } ?>
    </select>
    
</div>
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
                    <input data-input="" value="00:00"   name="entrada_extra" class="form-control OSFillParent" type="time" aria-required="false" value="" >
                </span>
            </div>
            <div  id="Input_TimeIn9" class="hidden" >
                <label data-label="" class="ThemeGrid_Width5">
                    <span style="font-weight: bold;">Hora de Saida da Hora Extra</span>
                </label><span class="input-time">
                    <input data-input="" value="00:00"  name="saida_extra" class="form-control OSFillParent" type="time" aria-required="false" >
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


              <script src="js/jquery.js"></script> 
<script src="js/bootstrap.js"></script>

    <script src="js/filtrocliente.js"></script>
     <script src="js/modal.js"></script>
     <script src="js/time.js"></script>

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
