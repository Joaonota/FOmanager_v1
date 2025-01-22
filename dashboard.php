<?php
// Incluindo a conexão com o banco de dados
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Incluindo o Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluindo o Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de Obras</h5>
                        <p class="card-text" id="total_obras">Carregando...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Obras Ativas</h5>
                        <p class="card-text" id="obras_ativas">Carregando...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Obras Finalizadas</h5>
                        <p class="card-text" id="obras_finalizadas">Carregando...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico de Obras -->
        <div class="row mt-5">
            <div class="col-md-12">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
 $(document).ready(function(){
    $('#total_obras').text('Carregando...');
    $('#obras_ativas').text('Carregando...');
    $('#obras_finalizadas').text('Carregando...');

    // Fazendo uma requisição AJAX para pegar os dados do banco
    $.ajax({
        url: 'dashboard_data.php',
        method: 'GET',
        success: function(data) {
            try {
                const jsonData = JSON.parse(data);

                // Verificando se existe um campo de erro
                if (jsonData.error) {
                    console.error("Erro: " + jsonData.error);
                    $('#total_obras').text('Erro ao carregar os dados');
                    $('#obras_ativas').text('Erro ao carregar os dados');
                    $('#obras_finalizadas').text('Erro ao carregar os dados');
                    return;
                }

                // Convertendo os valores para números
                const totalObras = parseInt(jsonData.total_obras, 10);
                const obrasAtivas = parseInt(jsonData.obras_ativas, 10);
                const obrasFinalizadas = parseInt(jsonData.obras_finalizadas, 10);

                // Preenchendo as informações no Dashboard
                $('#total_obras').text(totalObras);
                $('#obras_ativas').text(obrasAtivas);
                $('#obras_finalizadas').text(obrasFinalizadas);

                // Criando o gráfico
                const ctx = document.getElementById('myChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Total Obras', 'Obras Ativas', 'Obras Finalizadas'],
                        datasets: [{
                            label: 'Obras',
                            data: [totalObras, obrasAtivas, obrasFinalizadas],
                            backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } catch (e) {
                console.error("Erro ao analisar a resposta JSON: ", e);
                $('#total_obras').text('Erro ao carregar os dados');
                $('#obras_ativas').text('Erro ao carregar os dados');
                $('#obras_finalizadas').text('Erro ao carregar os dados');
            }
        },
        error: function(xhr, status, error) {
            console.error("Erro na requisição AJAX: ", error);
        }
    });
});

    </script>
</body>
</html>
