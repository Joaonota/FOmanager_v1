<?php
// Inclua a biblioteca PHPExcel
require 'Spout/Autoloader/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

// Crie uma nova instância do escritor XLS
$writer = WriterEntityFactory::createXLSXWriter();

// Inicie o buffer de saída
ob_start();

// Abra uma nova planilha
$writer->openToBrowser('Obras.xlsx');

// Adicione os cabeçalhos HTTP adequados
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Obras.xlsx"');
header('Cache-Control: max-age=0');

// Adicione as colunas com seus respectivos nomes
$writer->addRow(WriterEntityFactory::createRowFromArray(['ID', 'Codigo Da Obra', 'Descricao', 'Colaborador', 'Hora de Entrada','Hora de Saida','Total de Hora Normal','Entrada Extra','Saida Extra','Presenca', 'Data Marcada']));

// Conecte-se ao seu banco de dados e obtenha os dados
// Substitua 'localhost', 'usuário', 'senha' e 'banco_de_dados' pelos seus próprios dados
$conn = new mysqli('localhost', 'root', '', 'fomaneger');
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

$sql = "SELECT * FROM hora_extra_obra";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Calcula a diferença entre as horas de entrada e saída
        $entrada = strtotime($row['entrada']);
        $saida = strtotime($row['saida']);
        $diferenca_segundos = $saida - $entrada;
        $diferenca_horas = $diferenca_segundos / 3600;// 3600 segundos em uma hora
        $formula = "=F" .($writer->getCurrentSheet()->getlastWrittenRowIndex() + 1).($writer->getCurrentSheet()->getlastWrittenRowIndex() + 1);
        $cell =WriterEntityFactory::createcell($formula);

        // Adiciona a linha à planilha, incluindo a fórmula para calcular a diferença de horas
        $writer->addRow(WriterEntityFactory::createRowFromArray([$row['id_extra'], $row['codigo_obra_extra'], $row['descricao_extra'], $row['colaborador_extra'], $row['entrada'], $row['saida'], $formula, $row['entrada_extra'], $row['saida_extra'], $row['falta'], $row['data_marcada']]));
    }
} else {
    echo "0 resultados encontrados";
}

// Ajuste automaticamente a largura das colunas

// Feche a planilha
$writer->close();

// Limpe o buffer de saída e envie o arquivo para download
ob_end_flush();
?>
<div data-block="Content.Card" class="OSBlockWidget" id="$b9">
    <div class="ph card card-content card-overflow" id="b9-Content">
        <div data-list="" class="list list-group OSFillParent" style="position: relative;">
            <script style="display: flex; height: 0px; width: 100%;"></script>
            <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-56_120-ListItem2">
                <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-56_120-$b10">
                    <div class="vertical-align flex-direction-row" id="l4-56_120-b10-Content">
<span data-expression="" class="bold ThemeGrid_Width10"><?php echo strtoupper($row['nome']); ?></span>
<a data-icon="" onclick="mostrapopadd()" href="detalhe_obra.php?id=<?php echo $row['id_colaborador']; ?>&id_obra=<?php echo @$ids_obra; ?>" style="color: rgb(99, 188, 129); font-size: 32px;">
    <i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></a>
</div>
</div>
</div>

    </div>
    </div>
    </div>




    <div class="ph card card-content card-overflow" id="b9-Content">
   <div data-list="" class="list list-group OSFillParent" style="position: relative;">
      <script style="display: flex; height: 0px; width: 100%;"></script>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_0-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_0-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_0-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ABEL JAIME ABEL</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_1-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_1-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_1-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Abu</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_2-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_2-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_2-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ACACIO FEGURI CASTIGO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_3-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_3-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_3-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">AGOSTINHO SIMBINE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_4-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_4-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_4-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ALBERTO CARVALHO FURUMA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_5-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_5-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_5-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ALBERTO DA COSTA TOMO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_6-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_6-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_6-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ALBERTO ERNESTO MUNGUAMBE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_7-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_7-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_7-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ALBERTO PENICENE CHIPANGA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_8-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_8-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_8-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Alda</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_9-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_9-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_9-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ALEX MARIO NHAKUO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_10-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_10-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_10-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ALMERINDO JOSE JONASSE ALFACE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_11-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_11-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_11-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">AMERICO SARAIVA </span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_12-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_12-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_12-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">AMIEL CAETANO JUNIOR</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_13-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_13-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_13-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Amilton</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_14-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_14-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_14-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">AMON SAUTI</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_15-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_15-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_15-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ANARCISIO RUFINO JOAO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_16-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_16-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_16-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ANGELO VICTOR </span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_17-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_17-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_17-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ANIBAL DE SOUSA FRANCISCO BERNARDO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_18-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_18-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_18-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ANOLDO MATIAS</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_19-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_19-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_19-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ANTONIO FERNANDO LUIS</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_20-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_20-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_20-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ANTONIO RAUL PUNDUMA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_21-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_21-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_21-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ARISTIDES JOSE LOQUIR FRANCISCO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_22-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_22-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_22-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ARNALDO FERNANDO SANDRAMO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_23-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_23-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_23-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">AUGUSTO MABOTE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_24-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_24-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_24-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">BELARMINO TITO ADELINO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_25-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_25-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_25-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">BENTO CAMOGA MOISES</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_26-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_26-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_26-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">BERNADITO SANTANA MACAJU</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_27-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_27-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_27-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">BOANERGE FERNANDO </span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_28-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_28-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_28-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">BOANERGE FERNANDO MARIO BUCHA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_29-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_29-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_29-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">BORGES CARLOS FRANCISCO </span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_30-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_30-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_30-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Bule</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_31-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_31-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_31-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">BULHA RENDICAO NIXDO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_32-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_32-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_32-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CARLITOS DACARAI NGRICHE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_33-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_33-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_33-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CARLITOS JECKSON DIQUE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_34-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_34-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_34-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CARLOS JOAQUIM CALIGE CUMBANE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_35-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_35-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_35-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CARLOS JOAQUIM CUMBANE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_36-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_36-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_36-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CARLOS JOSE CAMBVUMBUR</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_37-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_37-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_37-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CARLOS LUIS JOANISSE FERRO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_38-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_38-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_38-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CASIMIRO CRIZATO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_39-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_39-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_39-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CELSO DOMINGOS LESTO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_40-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_40-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_40-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CESIO LOPES MATEUS</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_41-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_41-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_41-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CHANDO ASSAMO ASSANE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_42-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_42-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_42-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CHICO ALBERTO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_43-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_43-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_43-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CLAUDIO HERMINIO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_44-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_44-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_44-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CLEMENCIO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_45-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_45-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_45-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CREY BENJAMIM MAFALA COMIGO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_46-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_46-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_46-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">CRUZ</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_47-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_47-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_47-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DAMIAO TOMAS ZANDAMELA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_48-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_48-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_48-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DANIEL NOTA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_49-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_49-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_49-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DANIEL WATISSONE JOAO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_50-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_50-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_50-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DAVID ANTONIO SAENE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_51-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_51-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_51-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DAVID ERNESTO CANIVETE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_52-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_52-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_52-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DAVIDE ERNESTO CANAVETE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_53-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_53-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_53-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DAY MURANDA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_54-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_54-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_54-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DECLECIO DOS SANTOS</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_55-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_55-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_55-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DENZIL DWAINE MCKOP</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_56-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_56-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_56-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DEVI EDUARDO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_57-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_57-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_57-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DIONISIO JORGE TAMELE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_58-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_58-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_58-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DOMINGOS JOAO MACHAVA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_59-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_59-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_59-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DOMINGOS MASSADA MATIQUE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_60-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_60-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_60-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DONALDO LUIS SITOE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_61-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_61-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_61-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">DONALDO LUIS SITOI</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_62-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_62-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_62-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">EDMO CARVALHO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_63-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_63-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_63-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">EDMO DE CARVALHO CHIMOIO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_64-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_64-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_64-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">EDMUNDO ANDRE JOSE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_65-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_65-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_65-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">EDSON WILSON MAZARA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_66-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_66-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_66-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">EDUARDO JOAO C. VIDA CHAIMA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_67-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_67-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_67-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">EDUMUNDO ANDRE JOSE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_68-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_68-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_68-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">EGON</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_69-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_69-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_69-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ELIAS CARLITO ELIAS  AIRONE SASSOTO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_70-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_70-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_70-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ELIAS FINIOSSE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_71-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_71-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_71-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ELISEU CHAPASSUCA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_72-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_72-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_72-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Emerson</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_73-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_73-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_73-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ERASMO BIGIN MINDU</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_74-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_74-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_74-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ERMENEGILDO MARIO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_75-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_75-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_75-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ERMENEGILDO MARIO J. ANTONIO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_76-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_76-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_76-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ERNESTO CORNELIO JOAQUIM</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_77-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_77-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_77-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ERNESTO PASCOAL TANQUE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_78-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_78-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_78-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ESTEFANEO JORGE WILSON KOLOKO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_79-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_79-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_79-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">EVARISTO DAVID EFETE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_80-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_80-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_80-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">EZEQUIEL GILBERTO MUCHATO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_81-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_81-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_81-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">FALESSE ALBERTO CASTIGO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_82-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_82-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_82-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">FANUEL  TITO  REIS CHIRONGO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_83-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_83-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_83-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">FERRÃO ALEXANDRE FERRÃO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_84-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_84-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_84-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">FIDALGO ARLINDO VALOI</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_85-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_85-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_85-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Filipe João </span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_86-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_86-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_86-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">FILIPE JOSÉ </span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_87-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_87-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_87-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">FRANCISCO ANTONIO GUIDIRI</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_88-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_88-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_88-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">FRANCISCO ARMANDO MONTEIRO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_89-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_89-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_89-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">FRANCISCO PICARDO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_90-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_90-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_90-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">FULGENCIO BATALHÃO TSAMBA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_91-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_91-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_91-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">GABRIEL PATRICIO  GANIZANE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_92-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_92-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_92-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">GERALDO BERNARDINO ANTONIO BRAS</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_93-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_93-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_93-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">GODFREY MAIZENI</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_94-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_94-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_94-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">GODFREY MASHOKO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_95-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_95-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_95-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">GONÇALVES ERNESTO SAENE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_96-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_96-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_96-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Holsson anibal </span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_97-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_97-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_97-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">HUGO JOSE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_98-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_98-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_98-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Ilda</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_99-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_99-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_99-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ISAC ANTONIO LUIS BARATO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_100-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_100-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_100-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ISAQUIEL CHIDA SANDE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_101-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_101-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_101-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ISRAEL MTSEKUSE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_102-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_102-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_102-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ISSUFO GANI MUSSAGI JABORA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_103-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_103-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_103-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">ISSUFO LOPES </span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_104-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_104-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_104-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Ivo</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_105-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_105-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_105-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">IZAC EDUARDO FERNANDO PICADO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_106-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_106-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_106-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">IZAQUEL CARLITO E. AIRONE SASSOTO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_107-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_107-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_107-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JACINTO JOSE MAIRROSSE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_108-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_108-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_108-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JAIME WANDAME BAWA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_109-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_109-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_109-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JANTAMAIS DOMINGOS NOTA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_110-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_110-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_110-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">Jason Cristiano de Gouveia Mandlate</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_111-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_111-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_111-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JASTEN HALDON BLACK</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_112-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_112-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_112-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JEQUE CHICO JEQUESSENE  LUPANDE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_113-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_113-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_113-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JEREMIAS ORLANDO MACAMO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_114-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_114-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_114-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JESUS MANUEL EUSEBIO SINGANO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_115-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_115-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_115-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JO TIAGO LAMICANE CHICO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_116-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_116-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_116-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOAO  EFREMO THAIO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_117-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_117-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_117-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOAO ERNESTO JO NOTA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_118-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_118-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_118-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOAO INACIO MACONA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_119-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_119-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_119-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOAO MUADZANGASSE BETHE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_120-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_120-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_120-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOAQUIM ALBERTO J. MARIO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_121-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_121-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_121-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOAQUIM ALBERTO JOAQUIM MARIO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_122-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_122-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_122-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOELSON ROBERTO MARIGULA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_123-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_123-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_123-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOELSON ROBERTO MARRENGULA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_124-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_124-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_124-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOHANE PAULINO TOMO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_125-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_125-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_125-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JONATA MATATEU SARAIVA</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_126-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_126-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_126-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JORDINO ROMEU MAIA GIMO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_127-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_127-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_127-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JORGE SEBASTIAO MABODE</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_128-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_128-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_128-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JORGE WILSON KOLOKO</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <div data-list-item="" data-not-scrollable="" class="list-item" id="l4-76_129-ListItem2">
         <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="l4-76_129-$b10">
            <div class="vertical-align flex-direction-row" id="l4-76_129-b10-Content"><span data-expression="" class="bold ThemeGrid_Width10">JOSE AMERICO DANIEL M. JUNIOR</span><i data-icon="" class="icon  fa fa-plus fa-2x ThemeGrid_MarginGutter" style="color: rgb(99, 188, 129); font-size: 32px;"></i></div>
         </div>
      </div>
      <script style="display: flex; height: 7534.8px; width: 100%;"></script>
   </div>
</div>