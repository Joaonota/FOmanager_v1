<?php 
require "../db/conexao.php";

if (isset($_POST['butao'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username == "") {
    echo "<script type='text/javascript'>alert('O Campo Username Esta Vazio, Digite a sua Username ');</script>";
    echo "<script type='text/javascript'>window.location.href ='index.php';</script>";
  } elseif ($password == "") {
    echo "<script type='text/javascript'>alert('O Campo Password Esta Vazio, Digite a sua Password')</script>";
    echo "<script type='text/javascript'>window.location.href ='index.php';</script>";
  } else {
    $sqlL = mysqli_query($conexao, "SELECT * FROM acesso WHERE username ='$username' and password ='$password'");
    $conta_sqla = mysqli_num_rows($sqlL);

    if ($conta_sqla <= 0) {
      echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
          <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
          <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js'></script>
          <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
          <div class='modal fade' id='errorModal' tabindex='-1' role='dialog' aria-labelledby='errorModalLabel' aria-hidden='true'>
            <div class='modal-dialog' role='document'>
              <div class='modal-content'>
                <div class='modal-header bg-danger text-white'>
                  <h5 class='modal-title' id='errorModalLabel'>Erro</h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>
                <div class='modal-body'>
                  A Username ou senha estão incorretos
                </div>
              </div>
            </div>
          </div>
          <script>
            $(document).ready(function() {
              $('#errorModal').modal('show');
              setTimeout(function() {
                $('#errorModal').modal('hide');
                window.location.href = '../index.php';
              }, 2000);
            });
          </script>";
    } else {
      while ($re1 = mysqli_fetch_assoc($sqlL)) {
        $status = $re1['status'];
        $username = $re1['username'];
        $password = $re1['password'];
        $nome = $re1['nome'];
        $apelido = $re1['apelido'];
        $painel = $re1['painel'];
        $id_user = $re1['id_user'];

        if ($status == 'inativo') {
          echo "<script>alert('Voce Esta inativo ');</script>";
          echo "<script>location='login.php';</script>";
        } else {
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['nome'] = $nome;
          $_SESSION['apelido'] = $apelido;
          $_SESSION['painel'] = $painel;
          $_SESSION['password'] = $password;
          $_SESSION['id_user'] = $id_user;

          echo "<script type='text/javascript'>window.location.href ='../redireciona.php';</script>";
        }
      }
    }
  }
}
?>
