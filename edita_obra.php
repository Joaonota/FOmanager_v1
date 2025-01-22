<!DOCTYPE html>
<html lang="en">
<head>
<?php
@$edita = $_GET['edita'];

 require "estilo.php";

 ?>
<title>Editar Obra</title>
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
                        <span style="font-weight: bold;">Edição da Obra</span>
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
            

            $selecUp = mysqli_query($conexao, "SELECT * from obra where codigo = '$edita'");

            while ($rows2 = mysqli_fetch_assoc($selecUp)) {
                // code...
          


             ?>
            <form  method="post"  action="processa_edita_Obra.php?edita=<?php echo $edita;?>" class="form card OSFillParent" >
                <div data-container="">
                    <label data-label="" class="OSFillParent" for="Dropdown4">
                        <span style="font-weight: bold;">Cliente</span>
                    </label>
                    <div id="Dropdown4-container" class="dropdown-container" data-dropdown="">
                        <select class="dropdown-display dropdown" name="cliente"  >
                    <option value="<?php echo $rows2['cliente']; ?>"><?php echo $rows2['cliente']; ?></option>
                    <option disabled>========</option>

                            <?php 
                            $mysqlQu = mysqli_query($conexao, "SELECT * FROM clientes");

                            while ($row = mysqli_fetch_assoc($mysqlQu)) {
                            


                             ?>
                            <option value="<?php echo $row['nome']; ?>"><?php echo $row['nome']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div data-container="">
                    <label data-label="" class="OSFillParent" for="Input_Name2">
                        <span style="font-weight: bold;">Nr. Job Card</span>
                    </label>
                    <span class="input-text">
        <input data-input="" class="form-control OSFillParent" value="<?php echo $rows2['codigo']; ?>" type="text"  maxlength="250" name="codigo"  wfd-id="id3"></span>
                    </div>
                    <div data-container="">
                    <label data-label="" class="OSFillParent" for="Input_Name2">
                        <span style="font-weight: bold;">Localização</span>
                    </label>
                    <div id="Dropdown3-container" class="dropdown-container" data-dropdown="">
                       
                        <select name="localizacao" class="dropdown-display dropdown" >
                            <option  value="<?php echo $rows2['localizacao']; ?>"><?php echo $rows2['localizacao']; ?></option>
                            <option disabled>======</option>

                             <?php   
                        $sqlola = mysqli_query($conexao,"SELECT * FROM localizacao_obra");

                        while ($rows = mysqli_fetch_assoc($sqlola)) {
                            // code...
                     

                         ?>
                <option value="<?php echo $rows['localizacao_obra']; ?>"><?php echo $rows['localizacao_obra']; ?></option>
                            <?php  } ?>
                        </select>
                          
                    </div>
                    </div>

                    <div data-container="">
                    <label data-label="" class="OSFillParent" for="Input_Name2">
                        <span style="font-weight: bold;">Data de Incio</span>
                    </label>
                    <span class="input-text">
                        <input type="hidden" value="<?php echo $id_user; ?>" name="id_user">

                        <input data-input="" value="<?php echo $rows2['datai']; ?>" id="data_inicio" class="form-control OSFillParent" type="text" min="<?php echo date('Y-m-d') ?>"  maxlength="250" name="datai"  wfd-id="id3"></span>
                    </div>
                    <div data-container="">
                    <label data-label="" class="OSFillParent" for="Input_Name2">
                        <span style="font-weight: bold;">Data Final</span>
                    </label>
                    <span class="input-text">
                    <input data-input="" value="<?php echo $rows2['dataf']; ?>" id="data_final" class="form-control OSFillParent" type="text"  maxlength="250" name="dataf" min="<?php echo date('Y-m-d'); ?>"  wfd-id="id3"></span>
                    </div>

                    <div data-container="">
                        <label data-label="" class="OSFillParent" for="TextArea_Description">
                            <span style="font-weight: bold;">Descrição</span>
                        </label>
                        <span>
                            <textarea name="descricao" data-textarea="" class="form-control OSFillParent" rows="3" maxlength="500" id="TextArea_Description"><?php echo $rows2['descricao']; ?></textarea>
                        </span>
                    </div>
                    <div data-container="">
                        
                        
                        </div>
                            
                        <button data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Guardar</button>
                        </div>
                    </form>
                <?php   } ?>
                </div>
            </div>
        </div>
        <footer data-advancedhtml="" role="contentinfo" class="content-bottom">
            <div class="footer ph" id="b1-Bottom">
                <div data-block="Common.BottomBar" class="OSBlockWidget" id="$b3">
                    <div data-container="" class="bottom-bar-wrapper">
                        <div data-container="" class="bottom-bar ph"></div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div data-container="" class="offline-data-sync">
        <div data-block="Common.OfflineDataSyncEvents" class="OSBlockWidget" id="b1-$b2">
            <div data-block="Private.OfflineDataSyncCore" class="OSBlockWidget" id="b1-b2-$b1">
                <div data-block="Private.NetworkStatusChanged" class="OSBlockWidget" id="b1-b2-b1-$b1">
                    <div data-container=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<script src="js/data.js"></script>  
<script src="js/menusub.js"></script>      
</body>
</html>