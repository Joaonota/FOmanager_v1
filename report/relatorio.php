<?php
require_once('../vendor/autoload.php'); 
require "../db/config.php";

ob_start(); // Inicia buffer para evitar erro de saída

$id = $_GET['id'];

// Consulta ao banco de dados
$mysqlR = mysqli_query($conexao, "SELECT * FROM colaborador WHERE id_colaborador = '$id'");
$colaborador = mysqli_fetch_assoc($mysqlR);

if (!$colaborador) {
    die('Erro: Colaborador não encontrado.');
}

// Criar novo PDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SBD, Limitada');
$pdf->SetTitle('Relatório de Atividades');
$pdf->SetMargins(15, 15, 15);
$pdf->AddPage();

// Adicionando logotipo (ajustado para um tamanho menor e sem esticar)
$logo = '../img/FOManager.Logo.png';
$pdf->Image($logo, 80, 20, 50, 15, '', '', '', false, 300, '', false, false, 0, false, false, false);
$pdf->Ln(25); // Ajuste de espaço após a logo

// Criando cabeçalho do relatório
$pdf->SetFont('helvetica', 'B', 16);
$pdf->SetTextColor(0, 51, 102); // Azul escuro para título
$pdf->Cell(0, 10, 'Relatório de Atividades', 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0); // Reset para texto normal

$pdf->Ln(5); // Espaçamento antes da tabela

// Criando tabela com os dados do colaborador
$html = '
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    th {
        background-color: #0056b3;
        color: white;
        font-weight: bold;
        text-align: left;
        padding: 8px;
        border-radius: 3px;
    }
    td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }
    .title {
        font-size: 14px;
        color: #0056b3;
        font-weight: bold;
        margin-top: 10px;
    }
</style>
';

$html .= '<div class="title">Dados do Colaborador</div>';
$html .= '<table>
    <tr><th>Nome</th><td>' . strtoupper($colaborador['nome']) . '</td></tr>
    <tr><th>Telefone</th><td>' . strtoupper($colaborador['cell']) . '</td></tr>
    <tr><th>Cargo</th><td>' . strtoupper($colaborador['cargo']) . '</td></tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');

// Adicionando a tabela de histórico de horas
$pdf->Ln(8); // Pequeno espaçamento antes da próxima seção

$html = '<div class="title">Histórico de Horas</div>';
$html .= '<table>
    <tr>
        <th>Dia</th>
        <th>Obra</th>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Entrada Extra</th>
        <th>Saída Extra</th>
    </tr>';

$mysqlR = mysqli_query($conexao, "SELECT * FROM hora_extra_obra WHERE id_colaborador_extra = '$id'");
while ($row = mysqli_fetch_assoc($mysqlR)) {
    $dataformatada = date('d M Y', strtotime($row['data_marcada']));
    
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

// Adiciona tabela ao PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Adicionando o rodapé
$pdf->Ln(10);
$pdf->SetFont('helvetica', '', 10);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(0, 10, 'SBD, Limitada - Bairro Azul, Tete, Moçambique | Email: SBD@exemplo.com | Telefone: 84123456', 0, 1, 'C');

// Saída do PDF
ob_end_clean(); // Evita erro de saída antes do PDF
$pdf->Output('relatorio.pdf', 'D');
exit();
