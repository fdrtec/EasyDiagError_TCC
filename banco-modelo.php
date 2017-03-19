<?php

function listaModelo($conexao){
  $modelos = array();
  $query = "select * from modelo";
  $resultado = mysqli_query($conexao, $query);
  while ($modelo = mysqli_fetch_assoc($resultado)) {
    array_push($modelos, $modelo);
  }
  return $modelos;
}


// function buscaModelo($conexao, $id){
//   $query = "select * from modelo where id = {$id}";
//   $resultado = mysqli_query($conexao, $query);
//   return mysqli_fetch_assoc($resultado);
// }
