<?php 
/**
 * Author: Joao Nota
 */

require '../db/conexao.php';
if (isset($_POST['butao'])) {
	$cliente = $_POST['cliente'];
	$codigo = $_POST['codigo'];  
	$id_user = $_POST['id_user'];
	$descricao = $_POST['descricao'];
	$localizacao = $_POST['localizacao'];
	$datai = $_POST['datai'];
	$dataf = $_POST['dataf'];

	$check_query = "SELECT * FROM obra WHERE codigo='$codigo'";
	$result = mysqli_query($conexao, $check_query);

	if (mysqli_num_rows($result) > 0) {
		$error_message = "Erro: Já existe um registro com o mesmo código.";
	} else {
		$mysqdd = mysqli_query($conexao, "INSERT INTO obra (id_user, cliente, codigo, localizacao, descricao, datai, dataf, status, status_apro) 
										  VALUES ('$id_user', '$cliente', '$codigo', '$localizacao', '$descricao', '$datai', '$dataf', 'ativo', 'espera')");

		$success_message = "Parabéns! Os dados foram inseridos com sucesso.";
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.modal-content {
			border-radius: 10px;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
		}
		.modal-header {
			background-color: #dc3545;
			color: white;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}
		.modal-footer {
			border-bottom-left-radius: 10px;
			border-bottom-right-radius: 10px;
		}
		.btn-close {
			color: white;
		}
	</style>
</head>
<body>

	<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="errorModalLabel">Erro</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p><?php echo isset($error_message) ? $error_message : ''; ?></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<?php if (isset($success_message)): ?>
		<script>
			alert("<?php echo $success_message; ?>");
			window.location.href = 'add_obra.php';
		</script>
	<?php endif; ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

	<script>
		<?php if (isset($error_message)): ?>
			var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
			myModal.show();
			
			setTimeout(function() {
				myModal.hide();
				window.history.back();
			}, 2000);
		<?php endif; ?>
	</script>

</body>
</html>
