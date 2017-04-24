<?php
  class InformacaoDao {

    private $conexao;

    function __construct($conexao){
      $this->conexao = $conexao;
    }

    function listaInformacao(){

      $informacoes = array(); // versoes mais novas $informacao = []; Array para depositar as linhas de regisro do BD e, objeto
      $resultado = mysqli_query($this->conexao, "select i.*, m.modelo_nome as modelo_nome, f.fab_nome as fab_nome from informacao i
                                                  join modelo m on m.modelo_id = i.modelo_fk
                                                  inner join fabricante as f on f.fab_id=m.fab_fk" );

      while ($informacao_array = mysqli_fetch_assoc($resultado)) {

        $modelo = new Modelo();
        $modelo->modelo_nome = $informacao_array['modelo_nome'];

        $fabricante = new Fabricante();
        $fabricante->fab_nome = $informacao_array['fab_nome'];

        $informacao = new Informacao();
        $informacao->info_id =  $informacao_array['info_id'];
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
    $query = "insert into informacao(erro, descricao, solucao, modelo_fk) values (
      '{$informacao->erro}','{$informacao->descricao}','{$informacao->solucao}','{$informacao->modelo->modelo_id}')";

    return mysqli_multi_query($this->conexao, $query); // comando para abrir conexao e gravar dados na tabela
  }

  function alteraInformacao(Informacao $informacao){
    $query = "update informacao set erro = '{$informacao->erro}', descricao ='{$informacao->descricao}', solucao = '{$informacao->solucao}',
    modelo_id = '{$informacao->modelo->modelo_id}', fabricante_id = '{$informacao->fabricante->fab_id}'  where info_id = '{$informacao->info_id}'";
     //variavel para adicionar valores a tabela informacao

    return mysqli_query($this->conexao, $query); // comando para abrir conexao e gravar dados na tabela
  }



  function buscaInformacao($id){
    $query = "select * from informacao,modelo,fabricante where info_id = {$id}";
    $resultado = mysqli_query($this->conexao, $query);
    $informacao_buscada = mysqli_fetch_assoc($resultado);

    $modelo = new Modelo();
    $modelo->id = $informacao_buscada['modelo_id'];

    $fabricante = new Fabricante();
    $fabricante->id = $informacao_buscada['fab_id'];

    $informacao = new Informacao();
    $informacao->id = $informacao_buscada['info_id'];
    $informacao->erro = $informacao_buscada['erro'];
    $informacao->descricao = $informacao_buscada['descricao'];
    $informacao->solucao = $informacao_buscada['solucao'];
    $informacao->modelo = $modelo;
    $informacao->fabricante = $fabricante;

    return $informacao;

  }

  function removeInformacao($id){
    $query = "delete from informacao where info_id = {$id}";
    return mysqli_query($this->conexao, $query);
  }
}
