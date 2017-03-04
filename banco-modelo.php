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

?>
