<?php

function insereInformacao($conexao, Informacao $informacao){
  $query = "insert into informacoes(erro, descricao, modelo_id) values (
    '{$informacao->erro}','{$informacao->descricao}','{$informacao->modelo_id}')"; //variavel para adicionar valores a tabela informacoes
  return mysqli_query($conexao, $query); // comando para abrir conexao e gravar dados na tabela
}
function alteraInformacao($conexao, Informacao $informacao){
  $query = "update informacoes set erro = '{$informacao->erro}', descricao ='{$informacao->descricao}' where id = '{$informacao->id}'"; //variavel para adicionar valores a tabela informacoes
  return mysqli_query($conexao, $query); // comando para abrir conexao e gravar dados na tabela
}

function listaInformacoes($conexao){
  $informacoes = array(); // versoes mais novas $informacoes = [];
  $resultado = mysqli_query($conexao, "select i.*, m.nome as modelo_nome from informacoes as i join modelos as m on i.modelo_id = m.id");
  while ($informacao = mysqli_fetch_assoc($resultado)) {
    array_push($informacoes, $informacao);
  }
  return $informacoes;
}

function buscaInformacao($conexao, $id){
  $query = "select * from informacoes where id = {$id}";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);

}

function removeInformacao($conexao, $id){
  $query = "delete from informacoes where id = {$id}";
  return mysqli_query($conexao, $query);
}
