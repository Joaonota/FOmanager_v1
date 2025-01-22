<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="format-detection" content="telephone=no" />
        <?php
@$user = $_GET['user'];
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
        <span style="font-weight: bold;">Novo Historico do Colaborador</span>
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
                                            <form data-form=""  method="post" action="processa_extra_novo.php"  class="form card OSFillParent" >
                                                <div data-container="">
                                                    <label data-label="" class="OSFillParent">
                                                        <span style="font-weight: bold;">Nome do Colaborador</span>
                                                    </label>
                                                    <?php 
                                                    $sqlcolas =mysqli_query($conexao,"SELECT * FROM colaborador WHERE id_colaborador = '$user'");
                                                     while ($roww = mysqli_fetch_assoc($sqlcolas)) {
                                                     ?>
                                                    


                                                    <span data-expression="" style="font-size: 16px; font-weight: bold;"><?php echo strtoupper($roww['nome']); ?></span>
                                                    <input type="hidden" value="<?php echo strtoupper($roww['nome']); ?>"  name="colaborador_extra">
                                                    <input type="hidden" value="<?php echo @$user; ?>" name="id_colaborador_extra">
                                                <?php } ?>
                                                </div>
                                                <div data-container="" style="margin-top: 20px;">
                                                    <label data-label="" class="OSFillParent">
                                                        <span style="font-weight: bold;">Obra</span>
                                                    </label>
                                                    <div id="Dropdown1-container" class="dropdown-container" data-dropdown="">
                                                        <select name="codigo_obra_extra" class="dropdown-display dropdown" aria-disabled="false" id="Dropdown1">
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
                                                        <input data-input="" class="form-control OSFillParent" type="date" required name="datas" id="Input_CurrDate" />
                                                    </span>
                                                </div>
                                                <div data-container="">
                                                    <div data-container="" class="ThemeGrid_Width6" style="margin-top: 20px;">
                                                        <label data-label="" class="OSFillParent" for="Input_TimeIn">Time In</label>
                                                        <span class="input-time"> <input data-input="" class="form-control OSFillParent" type="time" aria-required="false" value="00:00" name="entrada" id="Input_TimeIn" /></span>
                                                    </div><div data-container="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter" style="margin-top: 20px;">
                                                        <label data-label="" class="OSFillParent" for="Input_TimeOut">Time Out</label>
                                                        <span class="input-time"><input data-input="" class="form-control OSFillParent" type="time" aria-required="false" value="00:00" name="saida" id="Input_TimeOut" /></span>
                                                    </div>
                                                </div>
                                                <div data-container="">
                                                    <div data-container="" class="ThemeGrid_Width6">
                                                        <label data-label="" class="OSFillParent" for="Input_TimeInExtra">Time In Extra</label>
                                                        <span class="input-time"><input data-input="" class="form-control OSFillParent" type="time" aria-required="false" name="entrada_extra" value="00:00" id="Input_TimeInExtra"/></span>
                                                    </div><div data-container="" class="ThemeGrid_Width6 ThemeGrid_MarginGutter">
                                                        <label data-label="" class="OSFillParent" for="Input_TimeOutExtra">Time Out Extra</label>
                                                        <span class="input-time"><input data-input="" class="form-control OSFillParent" type="time" aria-required="false" name="saida_extra" value="00:00" id="Input_TimeOutExtra" /></span>
                                                    </div>
                                                </div>
                                                <!--div data-container="">
                                                    <label data-label="" class="OSFillParent" for="Checkbox1">Ativo</label><span><input data-checkbox="" class="checkbox" type="checkbox" id="Checkbox1" /></span>
                                                </div-->
                                                <div data-container="" style="margin-top: 30px;">
                                                    <button data-button="" class="btn" type="button">voltar</button><button data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Guardar</button>
                                                </div>
                                            </form>
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
