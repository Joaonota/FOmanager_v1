<style>
/* Estilos de exemplo para os submenus */
.submenu {
    display: none;
    padding-left: 20px;
}
.submenu.visible {
    display: block;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
li {
    padding: -100px 0;
}

/* Ajustes para os ícones dos menus */
.icon {
    margin-right: 8px; /* Espaçamento à direita dos ícones */
    font-size: 18px; /* Tamanho dos ícones */
}
</style>

<?php if (@$painel == "staff") {
    require "staff_drawer.php";
}elseif ($painel == "basic") {
    require "drawer_basic.php";
} else {


?>
<aside data-advancedhtml="" role="complementary" class="aside-navigation ">
                            <div id="b1-Navigation">
                                <div data-block="Common.Menu" class="OSBlockWidget" id="$b4">
                                    <nav data-advancedhtml="" class="app-menu-content display-flex" role="navigation" id="b4-ApplicationContainer" tabindex="-1" aria-expanded="false">
                                        <div data-container="" class="header-logo ph">
                                        <div data-block="Common.ApplicationTitle" class="OSBlockWidget" id="b4-$b1">
                                            <div data-container="" class="application-name display-flex align-items-center full-height" role="button" tabindex="-1" id="b4-b1-ApplicationTitleWrapper" style="cursor: pointer;">
                                                <img data-image="" class="app-logo" src="img/FOManager.Logo.png" alt="" id="b4-b1-AppLogo" style="height: 32px;"><span data-expression="">FO Manager</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-container="" class="app-menu-links" role="menubar" id="b4-PageLinks">
                <a data-link href="../clientes/lista_clientes.php"role="menuitem" ><i data-icon="" class="icon fa-solid fa-users" id="b4-b2-Icon3"></i> Clientes</a>
                                   <!--     <ul style="height: 110px;" class="submenu" id="submenu-clies">
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="add_obra.php">Adicionar Cliente</a></li>
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="lista_clientes.php">Listar Clientes</a></li>
                         Adicione mais itens de submenu conforme necessário
                    </ul>   -->

                                <a class="ThemeGrid_MarginGutter"  data-link="" href="../colaboradores/lista_colaboradores.php"  role="menuitem" > <i data-icon="" class="icon fa-solid fa-handshake" id="b4-b2-Icon3"></i> Colaboradores</a>

                                      <!--    <ul style="height: 110px;" class="submenu" id="submenu-cola">
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="add_obra.php">Adicionar Colaborador</a></li>
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="lista_colaboradores.php">Listar Colaborador</a></li>
                       Adicione mais itens de submenu conforme necessário 
                    </ul>  -->
        <a class="ThemeGrid_MarginGutter" data-link="" href="lista_obra.php?id=<?php echo $id_user ?>"> <i data-icon="" class="icon fa-solid fa-building" id="b4-b2-Icon3"></i> Obras</a>
                                   <!--    <ul style="height: 110px;" class="submenu" id="submenu-obras">
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="add_obra.php">Adicionar Obra</a></li>
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="Lista_obra.php?id=<?php echo $id_user ?>">Listar Obra</a></li>
                        Adicione mais itens de submenu conforme necessário 
                    </ul>                  -->      
                        
 <a class="ThemeGrid_MarginGutter" data-link="" href="relatorio_extra.php"  role="menuitem" > <i data-icon="" class="icon fa-solid fa-chart-bar" id="b4-b2-Icon3"></i> Relatorio</a>
 <a class="ThemeGrid_MarginGutter" data-link="" href="relatorio_extra_dia.php"  role="menuitem" > <i data-icon="" class="icon fa-solid fa-chart-bar" id="b4-b2-Icon3"></i> Relatorio Diario</a>

 <a class="ThemeGrid_MarginGutter" data-link="" href="add_categoria.php"  role="menuitem" > <i data-icon="" class="icon fa-solid fa-cog" id="b4-b2-Icon3"></i> Extra</a>
 <a class="ThemeGrid_MarginGutter" data-link="" href="centro_custo.php"  role="menuitem" > <i data-icon="" class="icon fa-solid fa-map-marker-alt" id="b4-b2-Icon3"></i> Centro de Custo</a>
                                   <!--    <ul style="height: 110px;" class="submenu" id="submenu-extra">
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="add_obra.php">Adicionar Localizcao</a></li>
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="Lista_obra.php">Categoria</a></li>
                        Adicione mais itens de submenu conforme necessário 
                    </ul>   -->         

<a class="ThemeGrid_MarginGutter" data-link=""  role="menuitem"  href="lista_user.php"> <i data-icon="" class="icon fa-solid fa-users-cog" id="b4-b2-Icon3"></i> Usuarios</a>
                                   <!--    <ul style="height: 110px;" class="submenu" id="submenu-users">
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="add_users.php">Adicionar Usuario</a></li>
                        <li><a  class="ThemeGrid_MarginGutter" data-link=""  role="menuitem" tabindex="-1" href="Lista_obra.php">Listar Usuario</a></li>
                        Adicione mais itens de submenu conforme necessário 
                    </ul> -->
                                </div>
                                    <div data-container="" class="app-login-info ph" id="b4-LoginInfo">
                                <div data-block="Common.UserInfo" class="OSBlockWidget" id="b4-$b2">
                                    <div data-container="" class="user-info">
                                        <div data-container="" >
                                            <img data-image="" class="img-circle" src="img/FOManager.User.png" alt="" style="width: 24px; height: 24px;">
                                            <div data-container="" class="margin-left-s">
                                                <span data-expression=""><?php echo $nome;?> <?php echo  $apelido;  ?></span>
                                            </div>
                                        </div>
                                        <div data-container=""  style="padding-right: 10px;" class="margin-left-s">
                                            <a data-link="" href="config.php?acao=quebra" class="OSFillParent" href="" tabindex="-1">
                                                <i data-icon="" class="icon fa-solid fa-sign-out-alt" id="b4-b2-Icon3">   
                                                </i>
                                                <span class="margin-left-s wcag-hide-text">Log out</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <div data-container="" class="app-menu-overlay" role="button" style="cursor: pointer;"></div>
</div>
</div>
</aside>
<div data-container="" class="main" style="margin-left: 0px;">
    <header data-advancedhtml="" role="banner" class="header" id="b1-Header">
        <div data-container="" class="header-top">
            <div data-container="" class="header-content display-flex">
                <div data-container="" class="display-flex align-items-center full-width">
                    <div class="header-left" id="b1-HeaderLeft" style="margin-left: var(--space-base); height: 30px;">
                        <div data-block="Common.MenuIcon" class="OSBlockWidget" id="$b2">
<div data-container="" class="app-menu-icon" id="b2-MenuIcon" style="margin-top: 0px;">
    <div data-container="" class="menu-icon" aria-label="Toggle the Menu" role="button" tabindex="0" aria-haspopup="true" style="cursor: pointer;">
        <div data-container="" class="menu-icon-line" aria-hidden="true"></div>
        <div data-container="" class="menu-icon-line" aria-hidden="true"></div>
        <div data-container="" class="menu-icon-line" aria-hidden="true"></div>
    </div>
    <div data-container="" class="menu-back" aria-label="Back to previous screen" role="button" tabindex="0" style="cursor: pointer;">
        <i data-icon="" class="icon fa-solid fa-angle-left" id="b2-ArrowBack"></i>
    </div>
</div>
</div>
</div>
<?php } ?>