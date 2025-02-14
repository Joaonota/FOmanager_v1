 document.getElementById("colaborador").addEventListener("change", function() {
            var clienteSelecionado = this.value;
            var usuario = document.getElementById("usuario").value;
            console.log(clienteSelecionado);
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("colaborrador_body").innerHTML = this.responseText;
                }
            };
            xhr.open("POST", "filtro_extra_obra.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("cliente=" + clienteSelecionado + "&usuario=" + usuario);


        });
window.onload = function() {
            document.getElementById("colaborador").dispatchEvent(new Event('change'));
            document.getElementById("usuario").value;
        };