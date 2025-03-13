function getQueryParam(param) {
    var urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

document.getElementById("colaborador").addEventListener("change", function() {
    var clienteSelecionado = this.value;
    var usuario = document.getElementById("usuario").value;

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
    var clienteSelecionado = getQueryParam("cliente");
    var usuario = getQueryParam("id_d_cola");

    if (clienteSelecionado) {
        document.getElementById("colaborador").value = clienteSelecionado;
    }
    if (usuario) {
        document.getElementById("usuario").value = usuario;
    }

    // Dispara o evento de mudança para carregar os dados da página
    document.getElementById("colaborador").dispatchEvent(new Event('change'));
};
