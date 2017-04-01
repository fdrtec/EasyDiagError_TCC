<?php
  class InformacaoDao {

    private $conexao;

    function __construct($conexao){
      $this->conexao = $conexao;
    }

    function listaInformacao(){

      $informacoes = array(); // versoes mais novas $informacao = [];
      $resultado = mysqli_query($this->conexao, "select i.*, m.nome as modelo_nome, f.nome as fabricante_nome from informacao i
                                            inner join modelo as m on m.id=i.modelo_id
                                            inner join fabricante as f on f.id=i.fabricante_id"
                                        );

      while ($informacao_array = mysqli_fetch_assoc($resultado)) {

        $modelo = new Modelo();
        $modelo->nome = $informacao_array['modelo_nome'];

        $fabricante = new Fabricante();
        $fabricante->nome = $informacao_array['fabricante_nome'];

        $informacao = new Informacao();
        $informacao->id =  $informacao_array['id'];
        $informacao->erro =  $informacao_array['erro'];
        $informacao->descricao =  $informacao_array['descricao'];
        $informacao->solucao = $informacao_array['solucao'];
        $informacao->modelo = $modelo;
        $informacao->fabricante = $fabricante;

        array_push($informacoes, $informacao);
      }
      return $informacoes;
    }


  function insereInformacao(Informacao $informacao){
    $query = "insert into informacao(erro, descricao, solucao, modelo_id, fabricante_id) values (
      '{$informacao->erro}','{$informacao->descricao}','{$informacao->solucao}','{$informacao->modelo->id}','{$informacao->fabricante->id}')"; //variavel para adicionar valores a tabela informacao

    return mysqli_query($this->conexao, $query); // comando para abrir conexao e gravar dados na tabela
  }

  function alteraInformacao(Informacao $informacao){
    $query = "update informacao set erro = '{$informacao->erro}', descricao ='{$informacao->descricao}', solucao = '{$informacao->solucao}',
    modelo_id = '{$informacao->modelo->id}', fabricante_id = '{$informacao->fabricante->id}'  where id = '{$informacao->id}'"; //variavel para adicionar valores a tabela informacao

    return mysqli_query($this->conexao, $query); // comando para abrir conexao e gravar dados na tabela
  }



  function buscaInformacao($id){
    $query = "select * from informacao where id = {$id}";
    $resultado = mysqli_query($this->conexao, $query);
    $informacao_buscada = mysqli_fetch_assoc($resultado);

    $modelo = new Modelo();
    $modelo->id = $informacao_buscada['modelo_id'];

    $fabricante = new Fabricante();
    $fabricante->id = $informacao_buscada['fabricante_id'];

    $informacao = new Informacao();
    $informacao->id = $informacao_buscada['id'];
    $informacao->erro = $informacao_buscada['erro'];
    $informacao->descricao = $informacao_buscada['descricao'];
    $informacao->solucao = $informacao_buscada['solucao'];
    $informacao->modelo = $modelo;
    $informacao->fabricante = $fabricante;

    return $informacao;

  }

  function removeInformacao($id){
    $query = "delete from informacao where id = {$id}";
    return mysqli_query($this->conexao, $query);
  }
}