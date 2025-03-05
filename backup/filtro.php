<?php
// Conectar ao banco de dados (substitua as informações de conexão com as suas)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fomaneger";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Executar a consulta para obter os clientes
$sqlClientes = "SELECT id_cliente, nome FROM clientes";
$resultClientes = $conn->query($sqlClientes);

// Definir o cliente pré-selecionado (por exemplo, "Cliente A")
$clienteSelecionado = "vulcan";

// Executar a consulta para obter as obras do cliente selecionado
$sqlObras = "SELECT cliente FROM obra WHERE cliente = '$clienteSelecionado'";
$resultObras = $conn->query($sqlObras);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Filtrar Tabela de Obras por Cliente</title>
</head>
<body>

    <form method="post">
        <select name="cliente" id="cliente">
            <?php
            // Iterar sobre os resultados da consulta e gerar as opções do select
            if ($resultClientes->num_rows > 0) {
                while($row = $resultClientes->fetch_assoc()) {
                    $selected = ($row["nome"] == $clienteSelecionado) ? "selected" : "";
                    echo "<option value='" . $row["nome"] . "' $selected>" . $row["nome"] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum cliente encontrado</option>";
            }
            ?>
        </select>
    </form>

    <table id="tabela_obras">
        <tr>
            <th>Nome da Obra</th>
        </tr>
        <?php
        // Exibir apenas as obras do cliente selecionado
        if ($resultObras->num_rows > 0) {
            while($row = $resultObras->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["cliente"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='1'>Nenhuma obra encontrada para este cliente.</td></tr>";
        }
        ?>
    </table>

    <script>
        // Adiciona um ouvinte de evento de mudança ao select de cliente
        document.getElementById("cliente").addEventListener("change", function() {
            var clienteSelecionado = this.value;
            var tabelaObras = document.getElementById("tabela_obras");

            // Limpa as linhas da tabela
            tabelaObras.innerHTML = "<tr><th>Nome da Obra</th></tr>";

            // Requisitar as obras do cliente selecionado via AJAX
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    tabelaObras.innerHTML += this.responseText;
                }
            };
            xhttp.open("GET", "obter_obras.php?cliente=" + clienteSelecionado, true);
            xhttp.send();
        });
    </script>

</body>
</html>

<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>
