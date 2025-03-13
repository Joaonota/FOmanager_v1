<?php
require "../estilo.php";
?>

<head>
    <!-- Biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Caixa de Seleção */
        .dropdown-container {
            margin: 20px auto;
            text-align: center;
        }

        select {
            padding: 10px 20px;
            margin: 10px 0;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f4f4f4;
        }

        /* Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            font-size: 18px;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Botões de Ação */
        .btn-action {
            display: inline-block;
            padding: 8px 12px;
            margin: 4px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 4px;
        }

        .btn-action:hover {
            background-color: #0056b3;
        }

        .btn-action.delete {
            background-color: #dc3545;
        }

        .btn-action.delete:hover {
            background-color: #c82333;
        }

        /* Botões de Paginação */
        .btn-page {
            padding: 8px 12px;
            margin: 2px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-page:hover {
            background-color: #0056b3;
        }

        .btn-page.active {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>

<div id="Dropdown1-container" class="dropdown-container" data-dropdown="">
    <select class="dropdown-display dropdown" id="colaborador" onchange="carregarDados()">
        <option value="">Selecione uma obra</option>
        <?php 
        $mysqlfiltro = mysqli_query($conexao, "SELECT DISTINCT codigo_obra_extra FROM hora_extra_obra WHERE id_colaborador_extra = '103'");
        while ($rowfiltro = mysqli_fetch_assoc($mysqlfiltro)) {
        ?>
            <option value="<?php echo $rowfiltro['codigo_obra_extra']; ?>"><?php echo strtoupper($rowfiltro['codigo_obra_extra']); ?></option>
        <?php } ?>
    </select>
    <input type="hidden" value="103" id="usuario">
</div>

<!-- Tabela de resultados -->
<table id="tabela" class="display">
    <thead>
        <tr>
            <th>Código</th>
            <th>Data</th>
            <th>Entrada</th>
            <th>Saída</th>
            <th>Entrada Extra</th>
            <th>Saída Extra</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody id="tabela-corpo">
        <!-- Dados carregados dinamicamente -->
    </tbody>
</table>

<script>
function carregarDados(pagina) {
    const colaborador = document.getElementById("colaborador").value;
    const usuario = document.getElementById("usuario").value;

    if (colaborador !== "") {
        $.ajax({
            url: "buscar_dados.php",
            method: "POST",
            data: { colaborador: colaborador, usuario: usuario, pagina: pagina },
            success: function(response) {
                $("#tabela-corpo").html(response);
            }
        });
    }
}
</script>