 document.getElementById("colaborador").addEventListener("change", function() {
            var clienteSelecionado = this.value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("colaborrador_body").innerHTML = this.responseText;
                }
            };
            xhr.open("POST", "filtro_extra.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("cliente=" + clienteSelecionado);
        });

        // Inicializar a tabela de obras com base no cliente selecionado ao carregar a página
        window.onload = function() {
            document.getElementById("colaborador").dispatchEvent(new Event('change'));
        };