<!DOCTYPE html>
<html lang="en">
<head>
<?php
$id_d_cola = $_GET['id_d_cola'];
 require "estilo.php"; ?>
<title>Editar Colaborador</title>
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
        <span style="font-weight: bold;">Editar Colaborador</span>
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
            
            <?php 
            
            $mysql= mysqli_query($conexao,"SELECT * FROM colaborador WHERE id_colaborador = '$id_d_cola'");

             ?>

            
            <form  method="post" action="processa_edita_cola.php?id_d_cola=<?php echo $id_d_cola; ?>"  class="form card OSFillParent" >
            	<?php 

            	while ($row=mysqli_fetch_assoc($mysql)) {
            		// code...
            	

            	 ?>
                <div data-container="">
                    <label data-label="" class="OSFillParent" for="Dropdown3">
                        <span style="font-weight: bold;">Categoria do Colaborador</span>
                    </label>
                    <div id="Dropdown3-container" class="dropdown-container" data-dropdown="">
                       
                        <select  name="cargo" class="dropdown-display dropdown" >
                        	<option  value="<?php echo $row['cargo']; ?>"><?php echo $row['cargo']; ?></option>
                            <option disabled >ESCOLHA NOVA CATEGORIA</option>
                             <?php   
                        $sqlola = mysqli_query($conexao,"SELECT * FROM categoria_cola");

                        while ($rows = mysqli_fetch_assoc($sqlola)) {
                            // code...
                     

                         ?>
                <option value="<?php echo $rows['categoria']; ?>"><?php echo $rows['categoria']; ?></option>
                            <?php  } ?>
                        </select>
                          
                    </div>
                </div>
                <div data-container="">
                    <label data-label="" class="OSFillParent" for="Input_Name">
                        <span style="font-weight: bold;">Nome do Colaborador</span>
                    </label>
                    <span class="input-text">
                        <input data-input="" value="<?php echo $row['nome']; ?>" class="form-control OSFillParent" type="text" maxlength="250" name="nome" ></span>
                    </div>
                    <div data-container="">
                        <label data-label="" class="OSFillParent" for="Input_Phone">
                            <span style="font-weight: bold;">Nr. Funcionario</span>
                        </label>
                        <span class="input-tel">
                            <input data-input="" value="<?php echo $row['cell']; ?>" name="cell" class="form-control OSFillParent" type="number"  maxlength="9"  >
                        </span>
                        </div>
                        <div data-container="">
                            <label data-label="" class="OSFillParent" for="TextArea_Bio">
                                <span style="font-weight: bold;">Habilidades</span>
                            </label>
                            <span>
                <textarea data-textarea="" name="habilidades" class="form-control OSFillParent" rows="3" maxlength="500" ><?php echo $row['habilidades']; ?></textarea>
            </span>
        </div>
        <div data-container="">
                    <label data-label="" class="OSFillParent" for="Dropdown3">
                        <span style="font-weight: bold;">Centro de Custo</span>
                    </label>
                    <div id="Dropdown3-container" class="dropdown-container" data-dropdown="">
                       
                        <select  name="custo" class="dropdown-display dropdown" >
                        	<option  value="<?php echo $row['cargo']; ?>"><strong><?php echo $row['custo']; ?></strong></option>
                            <option disabled >ESCOLHA NOVO CENTTRO DE CUSTO</option>
                             <?php   
                        $sqlola = mysqli_query($conexao,"SELECT * FROM centro_custo");

                        while ($rows = mysqli_fetch_assoc($sqlola)) {
                            // code...
                     

                         ?>
                <option value="<?php echo $rows['descicao']; ?>"><?php echo $rows['descicao']; ?></option>
                            <?php  } ?>
                        </select>
                          
                    </div>
                </div>
        <div data-container="">
        <div id="Dropdown4-container" class="dropdown-container" data-dropdown="">
                        <select class="dropdown-display dropdown" name="status"  >
                    <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                    <option disabled></option>

                            
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                       
                        </select>
                    </div>
        <div data-container="" style="margin-top: 20px;">
        	<a data-button="" href="lista_colaboradores.php" class="btn" >Voltar</a>
            <button data-button="" name="butao" class="btn btn-primary" type="submit">Guardar</button>
        </div>
        <?php } ?>
    </form>
</div>
<div data-container="" style="text-align: center; font-size: 16px; font-weight: bold; margin-top: 30px;">Historico de Horas</div>
<div data-container="" class="align-items-center display-flex">
    <div data-container="" class="ThemeGrid_Width4">
        <form id="filtro_extra">  
        <div id="Dropdown1-container" class="dropdown-container" data-dropdown="">
            <select class="dropdown-display dropdown"  id="colaborador">
                    <?php 
                    $mysqlfiltro = mysqli_query($conexao, "SELECT DISTINCT codigo_obra_extra from hora_extra_obra where id_colaborador_extra = '$id_d_cola'");

                    while ($rowfiltro= mysqli_fetch_assoc($mysqlfiltro)) {
                     ?>
                <option value="<?php echo $rowfiltro['codigo_obra_extra'] ?>"><?php echo strtoupper($rowfiltro['codigo_obra_extra']);?></option>


                <?php } ?>
        </select>
        <input type="hidden" value="<?php echo  $id_d_cola; ?>" id="usuario">
        </div>
        </form>
    </div>
    <div data-container="" class="ThemeGrid_Width7 ThemeGrid_MarginGutter" style="text-align: right;">
        <a data-link="" href="novo_historico.php?user=<?php echo  $id_d_cola; ?>">
            <i data-icon="" class="icon fa fa-history fa-2x" style="color: rgb(245, 160, 74); font-size: 38px;">
        
    </i>
</a>

 <a data-link="" href="relatorio.php?id=<?php echo  $id_d_cola; ?>">
            <i data-icon="" class="icon fa fa-file-pdf-o fa-2x" style="color: rgb(245, 160, 74); font-size: 38px;">
        
    </i>
</a>

</div>

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
        </div></th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 20%;">Opções<div class="sortable-icon">
        </div></th></tr></thead>
<tbody  id="colaborrador_body" >

</tbody>
</table>

</div>

</body>
<script src="js/menusub.js"></script> 
<script src="js/filtro_obras_user.js"></script> 
</html>