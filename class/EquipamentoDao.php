<?php

class EquipamentoDao{

   private $conexao;

   function __construct($conexao){
     $this->conexao = $conexao;
   }

  function listaEquipamento(){
    $equipamentos = array();
    $query = "select * from equipamento";
    $resultado = mysqli_query($this->conexao, $query);

    while ($equipamento_array = mysqli_fetch_assoc($resultado)) {

      $equipamento = new Equipamento();
      $equipamento->equip_id = $equipamento_array['equip_id'];
      $equipamento->equip_nome = $equipamento_array['equip_nome'];

      array_push($equipamentos, $equipamento);
    }
    return $equipamentos;
  }
}
