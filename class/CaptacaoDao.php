<?php
  class CaptacaoDao {

    private $conexao;

    function __construct($conexao){
      $this->conexao = $conexao;
    }

  function buscaInformacao($id){
    $query = "select * from captacao where id='{$id}'";

    $resultado = mysqli_query($this->conexao, $query);
    $informacao_buscada = mysqli_fetch_assoc($resultado);

    $modelo = new Modelo();
    $tipo = new Tipo();
    $fabricante = new Fabricante();
    $equipamento = new Equipamento();

    $informacao = new Informacao();
    $informacao->erro = $informacao_buscada['erro'];
    $informacao->descricao = $informacao_buscada['descricao'];
    $informacao->solucao = $informacao_buscada['solucao'];

    $informacao->modelo = $modelo;
    $informacao->modelo->modelo_nome = $informacao_buscada['modelo'];

    $informacao->tipo = $tipo;
    $informacao->tipo->tipo_nome = $informacao_buscada['tipo'];

    $informacao->fabricante = $fabricante;
    $informacao->fabricante->fab_nome = $informacao_buscada['fabricante'];

    $informacao->equipamento =$equipamento;
    $informacao->equipamento->equip_nome = $informacao_buscada['equipamento'];

    $query2= "select m.modelo_id from modelo m
              where m.modelo_nome = '{$informacao->modelo->modelo_nome}'";
    $resultado_modelo_nome = mysqli_query($this->conexao, $query2);
    $modelo_id_captura = mysqli_fetch_assoc($resultado_modelo_nome);
    //conversão para inteiro
    $modelo_id_int = (int)$modelo_id_captura['modelo_id'];
    //var_dump($modelo_id_int);
    //var_dump($informacao->modelo->modelo_nome);

    $informacao->modelo->modelo_id = $modelo_id_int;

    return $informacao;
  }

  function insereInformacao(Informacao $informacao){
    //var_dump($informacao->modelo);
    $query = "insert into informacao(erro, descricao, solucao, modelo_fk) values (
      '{$informacao->erro}','{$informacao->descricao}','{$informacao->solucao}','{$informacao->modelo->modelo_id}')";

    return mysqli_multi_query($this->conexao, $query); // comando para abrir conexao e gravar dados na tabela
  }





}
