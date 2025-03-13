<?php
require_once('../vendor/autoload.php'); 
require "../db/config.php";

$id = $_GET['id'];

// Consulta ao banco de dados
$mysqlR = mysqli_query($conexao, "SELECT * FROM colaborador WHERE id_colaborador = '$id'");
$colaborador = mysqli_fetch_assoc($mysqlR);

// Criar novo PDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SBD, Limitada');
$pdf->SetTitle('Relatório de Atividades');
$pdf->SetMargins(15, 20, 15);
$pdf->AddPage();

// Adicionar logotipo (10x10 mm, centralizado)
$pdf->Image('../img/FOManager.Logo.png', 100, 15, 21, 21, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
$pdf->Ln(20);

// Cabeçalho
$html = '<h1 style="text-align: center; font-size: 18px; color: #333;">Relatório de Atividades</h1><br>';

// Informações do Colaborador
$html .= '<h2 style="font-size: 14px; color: #444;">Dados do Colaborador</h2>';
$html .= '<table border="1" cellpadding="6" cellspacing="0" style="width: 100%;">
    <tr style="background-color: #f2f2f2;">
        <th style="width: 30%;"><b>Nome</b></th>
        <td style="width: 70%;">' . strtoupper($colaborador['nome']) . '</td>
    </tr>
    <tr>
        <th style="background-color: #f2f2f2;"><b>Telefone</b></th>
        <td>' . strtoupper($colaborador['cell']) . '</td>
    </tr>
    <tr>
        <th style="background-color: #f2f2f2;"><b>Cargo</b></th>
        <td>' . strtoupper($colaborador['cargo']) . '</td>
    </tr>
</table><br>';

// Histórico de Horas
$html .= '<h2 style="font-size: 14px; color: #444;">Histórico de Horas</h2>';
$html .= '<table border="1" cellpadding="6" cellspacing="0" style="width: 100%;">
    <tr style="background-color: #0073e6; color: #fff; text-align: center;">
        <th>Dia</th>
        <th>Obra</th>
        <th>Hora de Entrada</th>
        <th>Hora de Saída</th>
        <th>Entrada Extra</th>
        <th>Saída Extra</th>
    </tr>';

$mysqlR = mysqli_query($conexao, "SELECT * FROM hora_extra_obra WHERE id_colaborador_extra = '$id'");
while ($row = mysqli_fetch_assoc($mysqlR)) {
    $dataformatada = date('d M Y', strtotime($row['data_marcada']));
    
    $html .= '<tr style="text-align: center;">
        <td>' . $dataformatada . '</td>
        <td>' . $row['codigo_obra_extra'] . '</td>
        <td>' . $row['entrada'] . '</td>
        <td>' . $row['saida'] . '</td>
        <td>' . $row['entrada_extra'] . '</td>
        <td>' . $row['saida_extra'] . '</td>
    </tr>';
}
$html .= '</table><br>';

// Rodapé
$html .= '<p style="text-align: center; font-size: 12px; color: #555;">SBD, Limitada - Bairro Azul, Tete, Moçambique | Email: SBD@exemplo.com | Telefone: 84123456</p>';

// Adicionar HTML ao PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Saída do PDF
$pdf->Output('relatorio.pdf', 'D');
exit();
