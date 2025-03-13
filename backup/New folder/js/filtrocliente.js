 document.getElementById("cliente").addEventListener("change", function() {
            var clienteSelecionado = this.value;
            var obras = document.getElementById("obraidz").value;
            console.log(clienteSelecionado);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("obras_body").innerHTML = this.responseText;
                }
            };
            xhr.open("POST", "obras1.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("cliente=" + clienteSelecionado + "&obrasid=" + obras);
        });

        // Inicializar a tabela de obras com base no cliente selecionado ao carregar a página
        window.onload = function() {
            document.getElementById("cliente").dispatchEvent(new Event('change'));
            obras = document.getElementById("obraidz").value;
        };