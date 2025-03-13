function validarHoras() {
    var entrada = document.getElementById("entrada").value;
    var saida = document.getElementById("saida").value;

    var entradaSplit = entrada.split(":");
    var saidaSplit = saida.split(":");

    var entradaInt = parseInt(entradaSplit[0]);
    var saidaInt = parseInt(saidaSplit[0]);

    if (entradaInt >= 7 && entradaInt <= 8 && entradaSplit[1] <= 30) {
        if (saidaInt === 18 && saidaSplit[1] === "30") {
            alert("Horário de saída válido.");
        } else {
            alert("Adicionar hora extra.");
        }
    } else {
        alert("Hora de entrada inválida. Deve ser entre 7:00 ou 8:30.");
    }
}