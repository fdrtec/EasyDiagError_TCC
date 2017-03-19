<?php
include("conecta.php");
require_once('class/Modelo.php'); //afeta a busca de informações

function listaModelo($conexao){
  $modelos = array();
  $query = "select * from modelo";
  $resultado = mysqli_query($conexao, $query);

  while ($modelo_array = mysqli_fetch_assoc($resultado)) {

    $modelo = new Modelo();
    $modelo->id = $modelo_array['id'];
    $modelo->nome = $modelo_array['nome'];

    array_push($modelos, $modelo);
  }
  return $modelos;

}
