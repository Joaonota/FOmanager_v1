<!DOCTYPE html>
<html lang="en">
<head>
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
  <script src="../js/script.js"></script>
    <?php require "../estilo.php" ?>
    <title>Relatorio De Hora Extra</title>
    <style>
        .pagination {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
            border-radius: 5px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        .pagination .ellipsis {
            padding: 8px 16px;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
<div id="reactContainer">
    <div id="transitionContainer">
        <div class="active-screen screen-container slide-from-right-enter-done">
            <div data-block="Common.Layout" class="OSBlockWidget" id="$b1">
                <div class="layout layout-side layout-native ios-bounce aside" id="b1-LayoutWrapper">
                    <!-- drawer-->
                    <?php require "../drawer.php" ?>
                    <h1 data-advancedhtml="" class="header-title">
                        <div class="OSInline" id="b1-Title">
                            <span style="font-weight: bold;">Relatorio De Hora Extra</span>
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
                    <!-- aqui tem tabela -->
                    <div data-container="" style="text-align: center; font-size: 16px; font-weight: bold; margin-top: 30px;">Historico de Horas</div>
                    <div data-container="" class="align-items-center display-flex">
                        <div data-container="" class="ThemeGrid_Width4">
                            <form method="post" action="">
                                <div id="Dropdown1-container">
                                    <div class="form-inline">
                                        <input data-input="" type="date" id="data_inicio" name="data_inicio" required class="form-control OSFillParent">
                                        <input data-input="" type="date" id="data_fim" name="data_fim" required class="form-control OSFillParent">
                                        <button data-button="" name="butao" class="btn btn-primary ThemeGrid_MarginGutter" type="submit">Filtrar</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            $results_per_page = 12;
                            $whereClause = "";

                            // Verificando se as datas foram enviadas pelo formulário
                            if (isset($_POST['data_inicio']) && isset($_POST['data_fim']) && !empty($_POST['data_inicio']) && !empty($_POST['data_fim'])) {
                                $data_inicio = $_POST['data_inicio'];
                                $data_fim = $_POST['data_fim'];

                                // Criando a cláusula WHERE para o filtro de datas
                                $whereClause = "WHERE STR_TO_DATE(data_marcada, '%d/%m/%Y') BETWEEN '$data_inicio' AND '$data_fim'";
                            }

                            // Consulta para contar o número total de resultados
                            $sql_count = "SELECT COUNT(*) AS total FROM hora_extra_obra $whereClause";
                            $result_count = $conexao->query($sql_count);
                            $row_count = $result_count->fetch_assoc();
                            $total_results = $row_count['total'];

                            // Calculando o número total de páginas
                            $total_pages = ceil($total_results / $results_per_page);

                            // Determinando a página atual
                            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                $current_page = (int) $_GET['page'];
                            } else {
                                $current_page = 1;
                            }

                            if ($current_page > $total_pages) {
                                $current_page = $total_pages;
                            }

                            if ($current_page < 1) {
                                $current_page = 1;
                            }

                            // Calculando o deslocamento
                            $offset = ($current_page - 1) * $results_per_page;

                            // Consulta SQL para buscar os dados com limite e deslocamento
                            $sql = "SELECT codigo_obra_extra, descricao_extra, id_colaborador_extra, colaborador_extra, entrada, saida, entrada_extra, saida_extra, data_marcada FROM hora_extra_obra $whereClause LIMIT $offset, $results_per_page";
                            $result = $conexao->query($sql);
                            ?>
                        </div>
                    </div>
                    <div data-container="" style="margin-top: 20px;">
                        <div style="overflow-x: auto; white-space: nowrap; overflow-y: hidden; display: block; width: 100%;">
                            <table class="table" role="grid" id="tabela_obras">
                                <thead>
                                    <tr class="table-header">
                                        <th style="width: 10%;"></th>
                                        <th style="text-align: right; width: 20%;">Código da Obra</th>
                                        <th style="text-align: right; width: 15%;">Descrição</th>
                                        <th style="text-align: right; width: 15%;">Colaborador</th>
                                        <th style="text-align: right; width: 20%;">Hora de Entrada</th>
                                        <th style="text-align: right; width: 20%;">Hora de Saida</th>
                                        <th style="text-align: right; width: 20%;">Hora de Entrada Extra</th>
                                        <th style="text-align: right; width: 20%;">Hora de Saida Extra</th>
                                        <th style="text-align: right; width: 20%;">Data de Lançamento</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr class="table-row">
                                        <td></td>
                                        <td style="text-align: right;"><?php echo $row["codigo_obra_extra"]; ?></td>
                                        <td style="text-align: right;"><?php echo $row["descricao_extra"]; ?></td>
                                        <td style="text-align: right;"><?php echo $row["colaborador_extra"]; ?></td>
                                        <td style="text-align: right;"><?php echo $row["entrada"]; ?></td>
                                        <td style="text-align: right;"><?php echo $row["saida"]; ?></td>
                                        <td style="text-align: right;"><?php echo $row["entrada_extra"]; ?></td>
                                        <td style="text-align: right;"><?php echo $row["saida_extra"]; ?></td>
                                        <td style="text-align: right;"><?php echo $row["data_marcada"]; ?></td>
                                        
                                    </tr>
                                    <?php     
                                        }
                                    } else {
                                        echo "<tr><td colspan='10'>Nenhum resultado encontrado</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
// Obtendo as datas do formulário ou da URL
$data_inicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : (isset($_GET['data_inicio']) ? $_GET['data_inicio'] : '');
$data_fim = isset($_POST['data_fim']) ? $_POST['data_fim'] : (isset($_GET['data_fim']) ? $_GET['data_fim'] : '');

// Exibição dos botões de paginação
echo '<div class="pagination">';

// Parâmetros de filtro para manter na URL
$filtroParams = "";
if (!empty($data_inicio) && !empty($data_fim)) {
    $filtroParams = "&data_inicio=$data_inicio&data_fim=$data_fim";
}

// Botão "Anterior"
if ($current_page > 1) {
    echo '<a href="relatorio_extra_dia.php?page=' . ($current_page - 1) . $filtroParams . '">&laquo; Anterior</a>';
}

// Exibir páginas com base na página atual e o número máximo de botões
$start_page = max(1, $current_page - 13);
$end_page = min($total_pages, $current_page + 13);

if ($start_page > 1) {
    echo '<a href="relatorio_extra_dia.php?page=1' . $filtroParams . '">1</a>';
    if ($start_page > 2) {
        echo '<span class="ellipsis">...</span>';
    }
}

for ($page = $start_page; $page <= $end_page; $page++) {
    if ($page == $current_page) {
        echo '<a class="active" href="relatorio_extra_dia.php?page=' . $page . $filtroParams . '">' . $page . '</a>';
    } else {
        echo '<a href="relatorio_extra_dia.php?page=' . $page . $filtroParams . '">' . $page . '</a>';
    }
}

if ($end_page < $total_pages) {
    if ($end_page < $total_pages - 1) {
        echo '<span class="ellipsis">...</span>';
    }
    echo '<a href="relatorio_extra_dia.php?page=' . $total_pages . $filtroParams . '">' . $total_pages . '</a>';
}

// Botão "Próximo"
if ($current_page < $total_pages) {
    echo '<a href="relatorio_extra_dia.php?page=' . ($current_page + 1) . $filtroParams . '">Próximo &raquo;</a>';
}

echo '</div>';
?>


                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/menusub.js"></script> 
<script src="../js/filtro_colaborador_extra.js"></script> 
</body>
</html>
