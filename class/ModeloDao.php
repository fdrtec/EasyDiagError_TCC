<?php

class ModeloDao{

   private $conexao;

   function __construct($conexao){
     $this->conexao = $conexao;
   }

  function listaModelo(){
    $modelos = array();
    $query = "select * from modelo";
    $resultado = mysqli_query($this->conexao, $query);

    while ($modelo_array = mysqli_fetch_assoc($resultado)) {

      $modelo = new Modelo();
      $modelo->modelo_id = $modelo_array['modelo_id'];
      $modelo->modelo_nome = $modelo_array['modelo_nome'];

      array_push($modelos, $modelo);
    }
    return $modelos;
  }
}
