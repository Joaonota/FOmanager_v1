<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Filtro no Dropdown</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        input, select {
            padding: 8px;
            margin: 5px;
            font-size: 16px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h2>Filtro de Dropdown</h2>

    <!-- Campo de Pesquisa -->
    <input type="text" id="pesquisa" placeholder="Digite para filtrar..." oninput="filtrar()">

    <!-- Dropdown -->
    <select id="opcoes" size="5">
        <option value="opcao1">Opção 1</option>
        <option value="opcao2">Opção 2</option>
        <option value="opcao3">Opção 3</option>
        <option value="opcao4">Opção 4</option>
        <option value="opcao5">Opção 5</option>
        <option value="banana">Banana</option>
        <option value="abacate">Abacate</option>
        <option value="morango">Morango</option>
        <option value="laranja">Laranja</option>
        <option value="manga">Manga</option>
    </select>

    <script>
        function filtrar() {
            const termo = document.getElementById("pesquisa").value.toLowerCase();
            const dropdown = document.getElementById("opcoes");
            const opcoes = dropdown.getElementsByTagName("option");

            for (let i = 0; i < opcoes.length; i++) {
                const texto = opcoes[i].textContent.toLowerCase();
                if (texto.includes(termo)) {
                    opcoes[i].style.display = "";
                } else {
                    opcoes[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
