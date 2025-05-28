<head>
  
  <!-- summernote  success, erro,info  -->
  <link rel="stylesheet" href="css/Basic.css">
  <link rel="stylesheet" href="css/FOManager.FOManager.css">
  <link rel="stylesheet" href="css/OutSystemsReactWidgets.css">
  <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.css">
  <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.extra.css">
</head>

<?php 

require '../db/conexao.php';
if (isset($_POST['butao'])) {
    $id_colaborador = $_POST['id_colaborador'];
    $codigo_obra = $_POST['codigo_obra'];

    $sqlaa = mysqli_query($conexao, "select * from obra where codigo = '$codigo_obra'");

    while ($bb = mysqli_fetch_assoc($sqlaa)) {
        $aprova = $bb['status_apro'];

        if ($aprova != "aprovado") {
            echo "<script>alert('Esta Obra Ainda nao foi Aprovada Aguarde ou entre em contacto com o Gestor');</script>";
            echo "<script type='text/javascript'>window.location.href ='detalhe_obra.php?ids_obra=$codigo_obra';</script>";
        } else {
            $entrada = $_POST['entrada'];
            $saida = $_POST['saida'];

            if ($entrada == "00:00" && $saida == "00:00") {

                $data_marcada = $_POST['data_marcada'];
                $codigo_obra = $_POST['codigo_obra'];
                $descricao_extra = $_POST['descricao_extra'];
                $colaborador = $_POST['colaborador'];
                $id_colaborador_extra = $_POST['id_colaborador_extra'];
                $entrada_extra = $_POST['entrada_extra'];
                $saida_extra = $_POST['saida_extra'];

                $mysqdd = mysqli_query($conexao, "INSERT INTO hora_extra_obra (codigo_obra_extra, descricao_extra, id_colaborador_extra, colaborador_extra,entrada, saida, entrada_extra, saida_extra,data_marcada) 
                SELECT '$codigo_obra', '$descricao_extra', '$id_colaborador', '$colaborador', '$entrada', '$saida','$entrada_extra', '$saida_extra','$data_marcada'
                FROM dual
                WHERE NOT EXISTS (
                    SELECT codigo_obra_extra FROM hora_extra_obra WHERE codigo_obra_extra = '$codigo_obra'
                ) LIMIT 1");

                $mysqddextra = mysqli_query($conexao, "INSERT INTO obra_andamento (codigo_obra,id_colaborador,colaborador,entrada,saida) values ('$codigo_obra','$id_colaborador','$colaborador','$entrada_extra','$saida_extra') ");
                

                if ($mysqdd) {
                    echo "<script>location='detalhe_obra.php?ids_obra=$codigo_obra';</script>";
                }
               
            } else {
                $descricao_extra = $_POST['descricao_extra'];
                $colaborador = $_POST['colaborador'];
                $id_colaborador_extra = $_POST['id_colaborador_extra'];
                $entrada_extra = $_POST['entrada_extra'];
                $saida_extra = $_POST['saida_extra'];
                $codigo_obra = $_POST['codigo_obra'];
                $colaborador = $_POST['colaborador'];
                $entrada = $_POST['entrada'];
                $saida = $_POST['saida'];
                $id_colaborador = $_POST['id_colaborador'];
                $cell = $_POST['cell'];
                $data_marcada = $_POST['data_marcada'];  // Recebe a data do formulário
                $date = new DateTime($data_marcada);      // Cria um objeto DateTime com a data recebida
                $data_formatada = $date->format('d/m/Y'); // Formata a data como 'dia/mês/ano'
                echo $data_formatada;     

                #$status = $_POST['status'];
                $horaz = mysqli_query($conexao, "INSERT INTO hora_extra_obra (codigo_obra_extra,descricao_extra,id_colaborador_extra,colaborador_extra,entrada,saida,entrada_extra,saida_extra,data_marcada) values ('$codigo_obra','$descricao_extra','$id_colaborador','$colaborador','$entrada','$saida','$entrada_extra','$saida_extra','$data_formatada') ");
                
                $mysqdd = mysqli_query($conexao, "INSERT INTO obra_andamento (codigo_obra,id_colaborador,colaborador,entrada,saida) values ('$codigo_obra','$id_colaborador','$colaborador','$entrada','$saida') ");
                if ($mysqdd != '') {
                    echo "<script>location='detalhe_obra.php?ids_obra=$codigo_obra';</script>";

                    $xml = <<<XML
            <smsreq>
                <datetime>2024/01/26,10:58:00</datetime>
                <user>SBD001</user>
                <pass>\$y\$t3m5612</pass>
                <msisdn>$cell</msisdn>
                <message>Ola! $colaborador, voce foi adicionado(a) a obra ($codigo_obra) para trabalhar das ($entrada) ate ($saida) </message>
                <sendref></sendref>
            </smsreq>
            XML;

                    // URL da API
                    $url = 'http://196.40.117.220:8080/smppmoz/sms_request';

                    // Iniciar a requisição cURL
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                    // Executar a requisição cURL
                    $response = curl_exec($ch);

                    // Verificar se houve algum erro na requisição cURL
                    if ($response === false) {
                        die('Erro na requisição cURL: ' . curl_error($ch));
                    }

                    // Analisar a resposta XML
                    $xml_response = simplexml_load_string($response);
                    // Executar a requisição cURL
                    $response = curl_exec($ch);
                    echo "Resposta da API: Sucesso!";
                    echo "<script>location='detalhe_obra.php?ids_obra=$codigo_obra';</script>";
                } else {
                    echo '   <div id="feedbackMessageContainer" class="feedback-message-wrapper">
            <div class="feedback-message feedback-message-erro" tabindex="0" role="alert">
                <i></i>
                <div class="feedback-message-text">erro ao inserir os Dado</div>
            </div>
            </div>';
                }
            }
        }
    }
}
?>