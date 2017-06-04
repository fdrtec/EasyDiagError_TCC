<?php
  class InformacaoDao {

    private $conexao;

    function __construct($conexao){
      $this->conexao = $conexao;
    }

    function listaInformacao(){

      $informacoes = array(); // versoes mais novas $informacao = []; Array para depositar as linhas de regisro do BD e, objeto
      $resultado = mysqli_query($this->conexao, "select i.*,
                                                  m.modelo_nome as modelo_nome,
                                                  f.fab_nome as fab_nome,
                                                  t.tipo_nome as tipo_nome,
                                                  e.equip_nome as equip_nome
                                                  from informacao i
                                                  join modelo m on m.modelo_id = i.modelo_fk
                                                  inner join tipo_fab as tf on tf.id_tipo_fab  = m.tipo_fab_fk
                                                  inner join fabricante as f on f.fab_id  = tf.fab_fk
                                                  inner join tipo as t on t.tipo_id=tf.tipo_fk
                                                  inner join equipamento as e on e.equip_id=t.equip_fk" );


      while ($informacao_array = mysqli_fetch_assoc($resultado)) {

        $modelo = new Modelo();
        $modelo->modelo_nome = $informacao_array['modelo_nome'];

        $tipo = new Tipo();
        $tipo->tipo_nome = $informacao_array['tipo_nome'];

        $equipamento = new Equipamento();
        $equipamento->equip_nome = $informacao_array['equip_nome'];

        $fabricante = new Fabricante();
        $fabricante->fab_nome = $informacao_array['fab_nome'];


        $informacao = new Informacao();
        $informacao->info_id =  $informacao_array['info_id'];
        $informacao->erro =  $informacao_array['erro'];
        $informacao->descricao =  $informacao_array['descricao'];
        $informacao->solucao = $informacao_array['solucao'];
        $informacao->modelo = $modelo;
        $informacao->tipo = $tipo;
        $informacao->equipamento = $equipamento;
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
    modelo_fk = '{$informacao->modelo->modelo_id}'  where info_id = '{$informacao->info_id}'";
     //variavel para adicionar valores a tabela informacao

    return mysqli_query($this->conexao, $query); // comando para abrir conexao e gravar dados na tabela
  }



  function buscaInformacao($id){
    $query = "select i.*, m.*, t.*,f.* , e.* from informacao i
              join modelo m on m.modelo_id = i.modelo_fk
              inner join tipo_fab as tf on tf.id_tipo_fab=m.tipo_fab_fk
              inner join fabricante as f on f.fab_id = tf.fab_fk
              inner join tipo as t on t.tipo_id = tf.tipo_fk
              inner join equipamento as e on e.equip_id = t.equip_fk
              where info_id = {$id}";

    $resultado = mysqli_query($this->conexao, $query);
    $informacao_buscada = mysqli_fetch_assoc($resultado);

    $modelo = new Modelo();
    $tipo = new Tipo();
    $fabricante = new Fabricante();
    $equipamento = new Equipamento();

    $informacao = new Informacao();
    $informacao->info_id = $informacao_buscada['info_id'];
    $informacao->erro = $informacao_buscada['erro'];
    $informacao->descricao = $informacao_buscada['descricao'];
    $informacao->solucao = $informacao_buscada['solucao'];

    $informacao->modelo = $modelo;
    $informacao->modelo->modelo_id = $informacao_buscada['modelo_id'];
    $informacao->modelo->modelo_nome = $informacao_buscada['modelo_nome'];

    $informacao->tipo = $tipo;
    $informacao->tipo->tipo_id = $informacao_buscada['tipo_id'];
    $informacao->tipo->tipo_nome = $informacao_buscada['tipo_nome'];

    $informacao->fabricante = $fabricante;
    $informacao->fabricante->fab_id = $informacao_buscada['fab_id'];
    $informacao->fabricante->fab_nome = $informacao_buscada['fab_nome'];

    $informacao->equipamento =$equipamento;
    $informacao->equipamento->equip_id = $informacao_buscada['equip_id'];
    $informacao->equipamento->equip_nome = $informacao_buscada['equip_nome'];


    return $informacao;

  }

  function removeInformacao($id){
    $query = "delete from informacao where info_id = {$id}";
    return mysqli_query($this->conexao, $query);
  }
}
