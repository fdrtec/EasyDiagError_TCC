<?php

class FabricanteDao{

   private $conexao;

   function __construct($conexao){
     $this->conexao = $conexao;
   }

   function listaFabricante($conexao){
     $fabricantes = array();
     $query = "select * from fabricante";
     $resultado = mysqli_query($conexao, $query);

     while ($fabricante_array = mysqli_fetch_assoc($resultado)) {

       $fabricante = new Fabricante();
       $fabricante->fab_id = $fabricante_array['fab_id'];
       $fabricante->fab_nome = $fabricante_array['fab_nome'];

       array_push($fabricantes, $fabricante);
     }
     return $fabricantes;

   }
}
?>
