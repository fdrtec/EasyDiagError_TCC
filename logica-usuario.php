<?php
session_start();

function usuarioLogado(){
  return $_SESSION["usuario_logado"];
}

function usuarioEstaLogado(){
  return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario(){
  if(!usuarioEstaLogado()){
    header("Location: index.php?falhaDeSeguranca=true");
    die();
  }
}

function logaUsuario($email){
  //setcookie("usuario_logado",email, time() + 30);
  $_SESSION["usuario_logado"] = $email;
}


function logout(){
  session_destroy();
}

?>
