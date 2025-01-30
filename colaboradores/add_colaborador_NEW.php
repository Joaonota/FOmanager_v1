<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "estilo.php"; ?>
    <title>Adicionar Colaborador</title>
</head>
<body>
<div id="reactContainer">
   <div id="transitionContainer">
    <div class="active-screen screen-container slide-from-right-enter-done">
    <div data-block="Common.Layout" class="OSBlockWidget" id="$b1">
    <div class="layout layout-side layout-native ios-bounce aside" id="b1-LayoutWrapper">
        <!-- drawer-->
    <?php require "drawer.php"; ?>
        <h1 data-advancedhtml="" class="header-title">
            <div class="OSInline" id="b1-Title">
                <span style="font-weight: bold;">Novo Colaborador</span>
            </div>
        </h1>
        <div class="header-right" id="b1-HeaderRight"></div>
    </div>
    </div>
    </div>

    <div class="header-top-content ph" id="b1-HeaderContent"></div>

    <div data-container="" class="content" id="b1-ContentWrapper">
        <div data-container="" class="main-content ThemeGrid_Container" role="main" id="b1-MainContentWrapper">
            <div class="content-middle" id="b1-Content">
                <form method="post" action="processaColaboradore.php" class="form card OSFillParent">
                    <div data-container="">
                        <label for="Dropdown3" class="OSFillParent" style="font-weight: bold;">Categoria do Colaborador</label>
                        <div class="dropdown-container" data-dropdown="">
                            <select name="cargo" class="dropdown-display dropdown" required>
                                <?php   
                                $sqlola = mysqli_query($conexao,"SELECT * FROM categoria_cola");
                                while ($rows = mysqli_fetch_assoc($sqlola)) {
                                ?>
                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['categoria']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div data-container="">
                        <label for="Dropdown3" class="OSFillParent" style="font-weight: bold;">Centro de Custo</label>
                        <div class="dropdown-container" data-dropdown="">
                            <select name="custo" class="dropdown-display dropdown" required>
                                <?php   
                                $sqlola = mysqli_query($conexao,"SELECT * FROM centro_custo");
                                while ($rows = mysqli_fetch_assoc($sqlola)) {
                                ?>
                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['descicao']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div data-container="">
                        <label for="Input_Name" class="OSFillParent" style="font-weight: bold;">Nome do Colaborador</label>
                        <input type="text" class="form-control OSFillParent" name="nome" maxlength="250" required>
                    </div>

                    <div data-container="">
                        <label for="Input_Phone" class="OSFillParent" style="font-weight: bold;">Nr. Funcionario</label>
                        <input type="number" class="form-control OSFillParent" name="cell" maxlength="9" required>
                    </div>

                    <div data-container="">
                        <label for="TextArea_Bio" class="OSFillParent" style="font-weight: bold;">Habilidades</label>
                        <textarea name="habilidades" class="form-control OSFillParent" rows="3" maxlength="500" required></textarea>
                    </div>

                    <div data-container="">
                        <label for="Checkbox1" class="OSFillParent">Activo</label>
                        <input class="checkbox" type="checkbox" name="status" id="Checkbox1" checked>
                        <span><input data-checkbox="" class="checkbox" type="checkbox" id="Checkbox1"></span>
                    </div>

                    <div data-container="" style="margin-top: 20px;">
                        <a href="listar_colaboradores.php" class="btn btn-secondary">Voltar</a>
                        <button name="butao" class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="js/menusub.js"></script>
</body>
</html>
