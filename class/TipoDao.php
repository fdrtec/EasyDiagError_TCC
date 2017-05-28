<?php

class TipoDao{

   private $conexao;

   function __construct($conexao){
     $this->conexao = $conexao;
   }

  function listaTipo(){
    $tipos = array();
    $query = "select * from tipo";
    $resultado = mysqli_query($this->conexao, $query);

    while ($tipo_array = mysqli_fetch_assoc($resultado)) {

      $tipo = new Tipo();
      $tipo->tipo_id = $tipo_array['tipo_id'];
      $tipo->tipo_nome = $tipo_array['tipo_nome'];
      $tipo->equip_fk = $tipo_array['equip_fk'];

      array_push($tipos, $tipo);
    }
    return $tipos;
  }
}
