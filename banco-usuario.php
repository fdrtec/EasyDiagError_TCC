<?php

function buscaUsuario($conexao, $email, $senha){
  $query = "select * from usuarios where email='{$email}' and senha='{$senha}'";
  $resultado = mysqli_query($conexao, $query);
  $usuario = mysqli_fetch_assoc($resultado);
  return $usuario;
}

function criaUsuario($conexao, $email, $senha){
  $query = "insert into usuarios(email , senha) values ('{$email}','{$senha}')";
  return mysqli_query($conexao, $query);
}

 ?>
