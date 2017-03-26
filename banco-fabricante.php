<?php
include("conecta.php");
require_once('class/Fabricante.php'); //afeta a busca de informações

function listaFabricante($conexao){
  $fabricantes = array();
  $query = "select * from fabricante";
  $resultado = mysqli_query($conexao, $query);

  while ($fabricante_array = mysqli_fetch_assoc($resultado)) {

    $fabricante = new Fabricante();
    $fabricante->id = $fabricante_array['id'];
    $fabricante->nome = $fabricante_array['nome'];

    array_push($fabricantes, $fabricante);
  }
  return $fabricantes;

}
