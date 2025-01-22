<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="format-detection" content="telephone=no" />
        <?php
@$hora = $_GET['hora'];
@$id_d_cola = $_GET['id_d_cola'];
 require "estilo.php"; ?>
        <title>
Novo Historico do Colaborador</title>
    </head>
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
        <span style="font-weight: bold;">Editar Historico do Colaborador</span>
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
                                        	$sqlhora =mysqli_query($conexao,"SELECT * FROM hora_extra_obra where id_extra = '$hora'");
                while ($obraros = mysqli_fetch_assoc($sqlhora)) {

                                        	 ?>
                                            <form data-form=""  method="post" action="processa_actuliza_hora.php?hora=<?php echo $hora;?>" novalidate="" class="form card OSFillParent" id="Form1">
                                                <div data-container="">
                                                    <label data-label="" class="OSFillParent">
                                                        <span style="font-weight: bold;">Nome do Colaborador</span>
                                                    </label>


                                                    <span data-expression="" style="font-size: 16px; font-weight: bold;"><?php echo strtoupper($obraros['colaborador_extra']); ?></span>
                                                    
                                                </div>
                                                <div data-container="" style="margin-top: 20px;">
                                                    <label data-label="" class="OSFillParent">
                                                        <span style="font-weight: bold;">Obra</span>
                                                    </label>
                                                    <div id="Dropdown1-container" class="dropdown-container" data-dropdown="">
                                                        <select name="codigo_obra_extra" class="dropdown-display dropdown" aria-disabled="false" id="Dropdown1">
                                                        	<option disabled  value="<?php echo $obraros['codigo_obra_extra']; ?>" ><?php echo $obraros['codigo_obra_extra']; ?></option>
                                                        	<option disabled></option>
                                                             <?php 
                $sqlobra =mysqli_query($conexao,"SELECT * FROM obra");
                while ($obrarow = mysqli_fetch_assoc($sqlobra)) {
                   
                 ?> 
                
                             <option value="<?php echo strtoupper($obrarow['codigo']); ?>"><?php echo strtoupper($obrarow['codigo']); ?></option>


                                                            <?php   } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div data-container="" style="margin-top: 20px;">
                                                    <label data-label="" class="OSFillParent" for="Input_CurrDate">
                                                        <span style="font-weight: bold;">Dia trabalhado na Obra</span>
                                                    </label>
                                                    <span class="input-date">
                                                        <input data-input="" class="form-control OSFillParent" type="date"  name="datas" value="<?php echo $obraros['data_marcada']; ?>" id="Input_CurrDate" />
                                                    </span>
                                                </div>
                                                <div data-container="">
                                                    <div data-container="" class="ThemeGrid_Width6" style="margin-top: 20px;">
                                                        <label data-label="" class="OSFillParent" for="Input_TimeIn">Time In</label>
                                                        <span class="input-time"> <input data-input="" class="form-control OSFillParent" type="time" aria-required="false" value="<?php echo $obraros['entrada']; ?>" name="entrada" id="Input_TimeIn" /></span>
                                                    </div><div data-container="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter" style="margin-top: 20px;">
                                                        <label data-label="" class="OSFillParent" for="Input_TimeOut">Time Out</label>
                                                        <span class="input-time"><input data-input="" class="form-control OSFillParent" type="time" aria-required="false" value="<?php echo $obraros['saida']; ?>" name="saida" id="Input_TimeOut" /></span>
                                                    </div>
                                                </div>
                                                <div data-container="">
                                                    <div data-container="" class="ThemeGrid_Width6">
                                                        <label data-label="" class="OSFillParent" for="Input_TimeInExtra">Time In Extra</label>
                                                        <span class="input-time"><input data-input="" class="form-control OSFillParent" type="time" aria-required="false"  name="entrada_extra" value="<?php echo $obraros['entrada_extra']; ?>" id="Input_TimeInExtra"/></span>
                                                    </div><div data-container="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter">
                                                        <label data-label="" class="OSFillParent" for="Input_TimeOutExtra">Time Out Extra</label>
                                                        <span class="input-time"><input data-input="" class="form-control OSFillParent" type="time" aria-required="false" name="saida_extra" value="<?php echo $obraros['saida_extra']; ?>" id="Input_TimeOutExtra" /></span>
                                                    </div>
                                                </div>
                                                <!--div data-container="">
                                                    <label data-label="" class="OSFillParent" for="Checkbox1">Ativo</label><span><input data-checkbox="" class="checkbox" type="checkbox" id="Checkbox1" /></span>
                                                </div-->
                                                <div data-container="" style="margin-top: 30px;">
                                                    <a href="edita_colaborador.php?id_d_cola=<?php echo $id_d_cola; ?>" class="btn">voltar</a>
                                                    <button data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Guardar</button>
                                                </div>
                                            </form>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <footer data-advancedhtml="" role="contentinfo" class="content-bottom">
                                    <div class="footer ph" id="b1-Bottom">
                                        <div data-block="Common.BottomBar" class="OSBlockWidget" id="$b3">
                                            <div data-container="" class="bottom-bar-wrapper"><div data-container="" class="bottom-bar ph"></div></div>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                            <div data-container="" class="offline-data-sync">
                                <div data-block="Common.OfflineDataSyncEvents" class="OSBlockWidget" id="b1-$b2">
                                    <div data-block="Private.OfflineDataSyncCore" class="OSBlockWidget" id="b1-b2-$b1">
                                        <div data-block="Private.NetworkStatusChanged" class="OSBlockWidget" id="b1-b2-b1-$b1"><div data-container=""></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
