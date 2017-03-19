<?php
  require_once("conecta.php");
  include_once('class/Informacao.php');
  include_once('class/Modelo.php');


function insereInformacao($conexao, Informacao $informacao){
  $query = "insert into informacao(erro, descricao, modelo_id) values (
    '{$informacao->erro}','{$informacao->descricao}','{$informacao->modelo->id}')"; //variavel para adicionar valores a tabela informacao

  return mysqli_query($conexao, $query); // comando para abrir conexao e gravar dados na tabela
}

function alteraInformacao($conexao, Informacao $informacao){
  $query = "update informacao set erro = '{$informacao->erro}', descricao ='{$informacao->descricao}',
  modelo_id = '{$informacao->modelo->id}'  where id = '{$informacao->id}'"; //variavel para adicionar valores a tabela informacao

  return mysqli_query($conexao, $query); // comando para abrir conexao e gravar dados na tabela
}

function listaInformacao($conexao){

  $informacoes = array(); // versoes mais novas $informacao = [];
  $resultado = mysqli_query($conexao, "select i.*, m.nome as modelo_nome from informacao as i
                                      join modelo as m on m.id = i.modelo_id");

  while ($informacao_array = mysqli_fetch_assoc($resultado)) {

    $modelo = new Modelo();
    $modelo->nome = $informacao_array['modelo_nome'];

    $informacao = new Informacao();
    $informacao->id =  $informacao_array['id'];
    $informacao->erro =  $informacao_array['erro'];
    $informacao->descricao =  $informacao_array['descricao'];
    $informacao->modelo = $modelo;

    array_push($informacoes, $informacao);
  }
  return $informacoes;
}

function buscaInformacao($conexao, $id){
  $query = "select * from informacao where id = {$id}";
  $resultado = mysqli_query($conexao, $query);
  $informacao_buscada = mysqli_fetch_assoc($resultado);

  $modelo = new Modelo();
  $modelo->id = $informacao_buscada['modelo_id'];

  $informacao = new Informacao();
  $informacao->id = $informacao_buscada['id'];
  $informacao->erro = $informacao_buscada['erro'];
  $informacao->descricao = $informacao_buscada['descricao'];
  $informacao->modelo = $modelo;

  return $informacao;

}

function removeInformacao($conexao, $id){
  $query = "delete from informacao where id = {$id}";
  return mysqli_query($conexao, $query);
}
