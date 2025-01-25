<?php 
                      
require "../db/conexao.php";

                          if (isset($_POST['butao'])) {

                            $username =$_POST['username'];
                            $password = $_POST['password'];
                            if ($username == "") {
                              echo "<script type='text/javascript'>alert('O Campo Username Esta Vazio, Digite a sua Username ');</script>";
                             echo "<script type='text/javascript'>window.location.href ='index.php';</script>";
                            }elseif ($password <=0) {

                             echo "<script type='text/javascript'>alert('O Campo Password Esta Vazio, Digite a sua Password')</script>";
                             echo "<script type='text/javascript'>window.location.href ='index.php';</script>";
                            }else{
                          $sqlL =mysqli_query($conexao,"SELECT * FROM acesso WHERE username ='$username' and password ='$password'");
                          $conta_sqla= mysqli_num_rows($sqlL);
                          if ($conta_sqla  <=0) {
                            echo "<script type='text/javascript'>alert('A Username ou  senha estao incorreccto ');</script>";
                            echo "<script type='text/javascript'>window.location.href ='index.php';</script>";
                          }else{
                            while ($re1 =mysqli_fetch_assoc($sqlL)) {
                              
                              $status =$re1['status'];
                              $username =$re1['username'];
                              $password =$re1['password'];
                              $nome =$re1['nome'];
                              $apelido =$re1['apelido'];
                              $painel =$re1['painel'];
                              $id_user =$re1['id_user'];
                              
                              if ($status == 'inativo') {
                                echo "<script>alert('Voce Esta inativo ');</script>";
                            echo "<script>location='login.php';</script>";
                              }else{

                                session_start();
                                $_SESSION['username']= $username;
                                $_SESSION['nome']= $nome;
                                $_SESSION['apelido']= $apelido;
                                $_SESSION['painel']= $painel;
                                $_SESSION['password']= $password;
                                $_SESSION['id_user']= $id_user;
                                      

                                        if ($painel == 'admin') {
                                       echo "<script type='text/javascript'>window.location.href ='../redireciona.php';</script>";
                                        }elseif ($painel == 'staff') {
                                            echo "<script type='text/javascript'>window.location.href ='../redireciona.php';</script>";
                                        }elseif ($painel == 'basic') {
                                            echo "<script type='text/javascript'>window.location.href ='../redireciona.php';</script>";
                                        }
                              }

                            }
                          }

                            }
                            
                          }

                           ?>

