
<?php
require_once('vendor/autoload.php'); // S
require "db/config.php";

$id = $_GET['id'];

// Consulta ao banco de dados para obter os dados do colaborador
$mysqlR = mysqli_query($conexao, "SELECT * FROM colaborador WHERE id_colaborador = '$id'");
$colaborador = mysqli_fetch_assoc($mysqlR);

// Criar novo PDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SBD, Limitada');
$pdf->SetTitle('Relatório de Atividades');
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

// Cabeçalho
$html = '<h1 style="text-align: center;">Relatório de Atividades</h1>';
$html .= '<table border="1" cellpadding="5">
    <tr><th>Colaborador</th><td>' . strtoupper($colaborador['nome']) . '</td></tr>
    <tr><th>Numero De Telefone</th><td>' . strtoupper($colaborador['cell']) . '</td></tr>
    <tr><th>Cargo</th><td>' . strtoupper($colaborador['cargo']) . '</td></tr>
</table>';

// Histórico de Horas
$html .= '<h2 style="text-align: center;">Histórico de Horas</h2>';
$html .= '<table border="1" cellpadding="5">
    <tr>
        <th>Dia</th>
        <th>Obra</th>
        <th>Hora de Entrada</th>
        <th>Hora de Saída</th>
        <th>Entrada Extra</th>
        <th>Saída Extra</th>
    </tr>';

$mysqlR = mysqli_query($conexao, "SELECT * FROM hora_extra_obra WHERE id_colaborador_extra = '$id'");
while ($row = mysqli_fetch_assoc($mysqlR)) {
    $dataOriginal = $row['data_marcada'];
    $dataformatada = date('d M Y', strtotime($dataOriginal));
    
    $html .= '<tr>
        <td>' . $dataformatada . '</td>
        <td>' . $row['codigo_obra_extra'] . '</td>
        <td>' . $row['entrada'] . '</td>
        <td>' . $row['saida'] . '</td>
        <td>' . $row['entrada_extra'] . '</td>
        <td>' . $row['saida_extra'] . '</td>
    </tr>';
}
$html .= '</table>';

// Rodapé
$html .= '<p style="text-align: center; font-size: 12px;">SBD, Limitada - Bairro Azul, Tete, Moçambique | Email: SBD@exemplo.com | Telefone: 84123456</p>';

// Adicionar HTML ao PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Saída do PDF
$pdf->Output('relatorio.pdf', 'D');
exit();
