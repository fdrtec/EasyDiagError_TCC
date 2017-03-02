<?php

function insereInformacao($conexao, $erro, $descricao, $modelo_id){
  $query = "insert into informacoes(erro, descricao, modelo_id) values ('{$erro}', '{$descricao}','{$modelo_id}')"; //variavel para adicionar valores a tabela informacoes
  return mysqli_query($conexao, $query); // comando para abrir conexao e gravar dados na tabela
}
function alteraInformacao($conexao, $id, $erro, $descricao){
  $query = "update informacoes set erro = '{$erro}', descricao ='{$descricao}' where id = '{$id}'"; //variavel para adicionar valores a tabela informacoes
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
