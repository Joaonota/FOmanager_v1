<!DOCTYPE html>
<html>
<head>
    <title>Filtrar Tabela de Obras por Cliente</title>
</head>
<body>

    <form id="filtro_obras">
        <select name="cliente" id="cliente">
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
            $sqlClientes = "SELECT DISTINCT nome FROM clientes";
            $resultClientes = $conn->query($sqlClientes);
            if ($resultClientes->num_rows > 0) {
                while($row = $resultClientes->fetch_assoc()) {
                    echo "<option value='" . $row["nome"] . "'>" . $row["nome"] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum cliente encontrado</option>";
            }
            ?>
        </select>
    </form>

    <table id="tabela_obras">
        <thead>
            <tr>
                <th>Nome da Obra</th>
            </tr>
        </thead>
        <tbody id="obras_body"></tbody>
    </table>

    <script>
        document.getElementById("cliente").addEventListener("change", function() {
            var clienteSelecionado = this.value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("obras_body").innerHTML = this.responseText;
                }
            };
            xhr.open("POST", "obras1.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("cliente=" + clienteSelecionado);
        });

        // Inicializar a tabela de obras com base no cliente selecionado ao carregar a página
        window.onload = function() {
            document.getElementById("cliente").dispatchEvent(new Event('change'));
        };
    </script>

</body>
</html>
