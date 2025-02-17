<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<script type="text/javascript">print()</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php 
$id = $_GET['id'];

require "config.php"; ?>
    <title>Relatório de Atividades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 72px;
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .info {
            text-align: center;
            margin-top: 20px;
        }
        .footer {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="img/FOManager.Logo.png" sizes="10x10" alt="Logotipo da Empresa" class="logo">
            <h1>Relatório de Atividades</h1>
        </div>
        
        <table>
        	<?php 
        $mysqlR = mysqli_query($conexao, "SELECT * FROM colaborador where id_colaborador = '$id' ");

        while ($row = mysqli_fetch_assoc($mysqlR)) {
        	// code...
       

        	 ?>
            <tr>
                <th>Colaborador</th>
                <td><?php echo strtoupper($row['nome']); ?></td>
            </tr>
            <tr>
                <th>Numero De Telefone</th>
                <td><?php echo strtoupper($row['cell']); ?></td>
            </tr>
            <tr>
                <th>Cargo</th>
                <td><?php echo strtoupper($row['cargo']); ?></td>
            </tr>
           <?php  } ?>
        </table>
        <div data-container="" style="text-align: center; font-size: 16px; font-weight: bold; margin-top: 30px;">Historico de Horas</div>
        <div class="content">
           <div data-container="" style="margin-top: 20px;">
            <table class="table" role="grid" id="tabela_obras">
            <thead>
                
            <tr class="table-header">
        
        <th class="sortable" tabindex="0" style="text-align: right; width: 20%;">Dia<div class="sortable-icon">
        </div>
    </th>
    <th class="sortable" tabindex="0" style="text-align: right; width: 20%;">Obra<div class="sortable-icon">
        </div>
    </th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 15%;">Hora de entrada<div class="sortable-icon">
        </div>
    </th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 15%;">Hora de saida<div class="sortable-icon"></div>
        </th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 20%;">Hora de entrada Extra<div class="sortable-icon">
            </div
        ></th>
        <th class="sortable" tabindex="0" style="text-align: right; width: 20%;">Hora de saida Extra<div class="sortable-icon">
        </div>
    </th>
</tr>
</thead>
<tbody>
	<?php 
$mysqlR = mysqli_query($conexao, "SELECT * FROM hora_extra_obra where id_colaborador_extra = '$id'");

while ($row = mysqli_fetch_assoc($mysqlR)) {
 // Pegue a data original do banco
        $dataOriginal = $row["data_marcada"];

        // Tente formatar a data com diferentes formatos
        $dataformatada = 'Data inv��lida'; // Valor padr�0�0o

        // Formatos que voc�� deseja tentar
        $formatos = ['d/m/Y', 'd-m-Y', 'Y-m-d', 'Y/m/d'];

        foreach ($formatos as $formato) {
            $data = DateTime::createFromFormat($formato, $dataOriginal);
            if ($data !== false) {
                $dataformatada = $data->format('d M Y');
                break; // Se conseguiu formatar, pare de tentar outros formatos
            }
        }

	 ?>
<tr class="table-row">
<td data-header="Dia">
    <div data-container="" style="text-align: right;">
    <span data-expression=""><?php echo $dataformatada ?></span>
</div>
</td>
<td data-header="Hora de entrada">
    <div data-container="" style="text-align: right;">
    <span data-expression=""><?php echo $row['codigo_obra_extra']; ?></span>
</div>
</td>
<td data-header="Hora de entrada">
    <div data-container="" style="text-align: right;">
    <span data-expression=""><?php echo $row['entrada']; ?></span>
</div>
</td>
<td data-header="Hora de saida">
    <div data-container="" style="text-align: right;">
    <span data-expression=""><?php echo $row['saida']; ?></span>
</div>
</td>
<td data-header="Hora de entrada Extra">
    <div data-container="" style="text-align: right;">
    <span data-expression=""><?php echo $row['entrada_extra']; ?></span>
</div>
</td>
<td data-header="Hora de saida Extra">
    <div data-container="" style="text-align: right;">
    <span data-expression=""><?php echo $row['saida_extra']; ?></span>
</div>
</td>
</tr>
<?php 	// code...
} ?>
</tbody>
</table>

</div>
        </table>
        </div>
        
        <div class="info">
            <p>SBD, Limitada</p>
            <p>Bairro Azul, Tete, Moçambique</p>
            <p>Email: SBD@exemplo.com</p>
            <p>Telefone: 84123456</p>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 SBD, Limitada. Todos os direitos reservados.</p>
    </div>
</body>
</html>
