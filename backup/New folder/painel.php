<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .card-title {
            font-weight: bold;
        }
        .navbar-brand {
            font-size: 1.5rem;
        }
        .list-group-item a {
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .list-group-item a i {
            margin-right: 10px;
        }
        .list-group-item:hover {
            background-color: #495057;
        }
        .offcanvas {
            width: 260px;
        }
        .offcanvas-header {
            background-color: #343a40;
            color: white;
        }
        .offcanvas-body {
            background-color: #343a40;
            color: white;
        }
        .offcanvas-body .list-group-item {
            background-color: #343a40;
            border: none;
        }
        .offcanvas-body .list-group-item:hover {
            background-color: #495057;
        }
        .offcanvas-body .list-group-item a {
            color: white;
        }
        .offcanvas-body .list-group-item a:hover {
            color: #adb5bd;
        }
        .offcanvas-body .list-group-item i {
            color: #adb5bd;
        }
        .offcanvas-body .list-group-item:hover i {
            color: white;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                ☰ Menu
            </button>
            <span class="navbar-brand">FOmanager</span>
            <div class="d-flex align-items-center">
                <button class="btn btn-light me-3"><i class="fas fa-bell"></i></button>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="path/to/profile.jpg" alt="Profile" class="rounded-circle me-2" width="30" height="30">
                        <span>Admin</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> Perfil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Configurações</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="#" class="text-white"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="list-group-item"><a href="#" class="text-white"><i class="fas fa-tools"></i> Obras</a></li>
                <li class="list-group-item"><a href="#" class="text-white"><i class="fas fa-cog"></i> Configurações</a></li>
                <li class="list-group-item"><a href="#" class="text-white"><i class="fas fa-users"></i> Usuários</a></li>
                <li class="list-group-item"><a href="#" class="text-white"><i class="fas fa-chart-line"></i> Relatórios</a></li>
            </ul>
            <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="d-flex align-items-center">
                    <img src="img/FOManager.User.png" alt="User" class="rounded-circle" style="width: 24px; height: 24px;">
                    <div class="ms-2">
                        <span>Joao Nota</span>
                    </div>
                </div>
                <div>
                    <a href="config.php?acao=quebra" class="btn btn-danger btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Log out
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clipboard-list"></i> Total de Obras</h5>
                        <p class="card-text display-4" id="total_obras">Carregando...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-hammer"></i> Obras Ativas</h5>
                        <p class="card-text display-4" id="obras_ativas">Carregando...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-check-circle"></i> Obras Finalizadas</h5>
                        <p class="card-text display-4" id="obras_finalizadas">Carregando...</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-list"></i> Últimas 5 Obras Criadas</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Buscar obras..." id="searchInput">
                            <button class="btn btn-primary" type="button" onclick="searchTable()">Buscar</button>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome da Obra</th>
                                    <th>Criado Por</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody id="tabela_obras">
                                <tr><td colspan="4">Carregando...</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user"></i> Obras Criadas por Usuário</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Buscar usuário..." id="searchUserInput">
                            <button class="btn btn-primary" type="button" onclick="searchUser()">Buscar</button>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Usuário</th>
                                    <th>Total de Obras</th>
                                </tr>
                            </thead>
                            <tbody id="tabela_usuarios">
                                <tr><td colspan="2">Carregando...</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-user"></i> Top 10 Funcionários em Obras nos Últimos 30 Dias</h5>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Funcionário</th>
                        <th>Total de Obras</th>
                    </tr>
                    </thead>
                    <tbody id="tabela_top_funcionarios">
                    <tr><td colspan="2">Carregando...</td></tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-exclamation-circle"></i> Total de Obras Não Validadas</h5>
                <p class="card-text display-4" id="obras_nao_validadas">Carregando...</p>
                </div>
            </div>
            </div>
        </div>
        </div>
        
        <footer>
        &copy; 2025 FOmanager. Todos os direitos reservados.
        </footer>
        
        <script>
        document.getElementById("total_obras").innerText = "120";
        document.getElementById("obras_ativas").innerText = "45";
        document.getElementById("obras_finalizadas").innerText = "75";
        document.getElementById("obras_nao_validadas").innerText = "10"; // Exemplo de valor

        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabela_obras");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            } else {
            tr[i].style.display = "none";
            }
            }       
            }
        }

        function searchUser() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchUserInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabela_usuarios");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            } else {
            tr[i].style.display = "none";
            }
            }       
            }
        }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </body>
        </html>
        <?php
        // Conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "fomanager";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta para obter os usuários com mais obras
        $sql = "SELECT usuario, COUNT(*) as total_obras FROM obras GROUP BY usuario ORDER BY total_obras DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["usuario"]. "</td><td>" . $row["total_obras"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Nenhum resultado encontrado</td></tr>";
        }

        $conn->close();
        ?>
