<?php 


require "conexao.php";
@session_start();

@$username = $_SESSION['username'];
@$password = $_SESSION['password'];
@$nome=$_SESSION['nome'];
@$apelido = $_SESSION['apelido'];
@$painel=$_SESSION['painel'];
@$id_user =$_SESSION['id_user'];


if ($username == '') {
	echo "<script type='text/javascript'>window.location.href ='index.php';</script>";

}elseif ($nome == '') {
	echo "<script type='text/javascript'>window.location.href ='index.php';</script>";
}elseif ($apelido == '') {
	echo "<script type='text/javascript'>window.location.href ='index.php';</script>";
}elseif ($password == '') {
	echo "<script type='text/javascript'>window.location.href ='index.php;</script>";
}else{
	$sqlconfi= mysqli_query($conexao,"SELECT * from acesso where username = '$username' and password = '$password'");

	$conta_sql =mysqli_num_rows($sqlconfi);
	if ($conta_sql== '') {
		echo "<script type='text/javascript'>window.location.href ='index.php';</script>";
	}else{

	}
}

 ?>

 <?php if(@$_GET['pg'] == 'sair'){
	
session_destroy();

echo "<script language='javascript'>window.location='index.php'; </script>";

}?>

 <?php if(@$_GET['acao'] == 'quebra'){
	
session_destroy();

echo "<script language='javascript'>window.location='index.php'; </script>";

}?>
