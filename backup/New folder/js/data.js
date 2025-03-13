	document.getElementById("data_final").addEventListener("change", function(){

		var dataInicio = document.getElementById("data_inicio").value;

		var dataFinal = this.value;

		if (dataInicio > dataFinal) {

			alert("A Data Inserida Nao Pode ser Menor");

			this.value = dataInicio;
		}
	} );
