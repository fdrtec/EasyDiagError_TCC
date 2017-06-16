<?php
  class CaptacaoDao {

    private $conexao;

    function __construct($conexao){
      $this->conexao = $conexao;
    }

    // function listaInformacao(){
    //
    //   $informacoes = array(); // versoes mais novas $informacao = []; Array para depositar as linhas de regisro do BD e, objeto
    //   $resultado = mysqli_query($this->conexao, "select from captacao");
    //
    //   while ($informacao_array = mysqli_fetch_assoc($resultado)) {
    //
    //     $modelo = new Modelo();
    //     $modelo->modelo_nome = $informacao_array['modelo'];
    //
    //     $tipo = new Tipo();
    //     $tipo->tipo_nome = $informacao_array['tipo'];
    //
    //     $equipamento = new Equipamento();
    //     $equipamento->equip_nome = $informacao_array['equipamento'];
    //
    //     $fabricante = new Fabricante();
    //     $fabricante->fab_nome = $informacao_array['fabricante'];
    //
    //
    //     $informacao = new Informacao();
    //     $informacao->info_id =  $informacao_array['info_id'];
    //     $informacao->erro =  $informacao_array['erro'];
    //     $informacao->descricao =  $informacao_array['descricao'];
    //     $informacao->solucao = $informacao_array['solucao'];
    //     $informacao->modelo = $modelo;
    //     $informacao->tipo = $tipo;
    //     $informacao->equipamento = $equipamento;
    //     $informacao->fabricante = $fabricante;
    //
    //     array_push($informacoes, $informacao);
    //   }
    //   return $informacoes;
    // }

    // SELECT i.modelo_fk from informacao i
    // JOIN modelo m on m.modelo_id = i.modelo_fk
    // WHERE m.modelo_nome = 'T640'


   function insereInformacao(Informacao $informacao){
    $query = "insert into informacao(erro, descricao, solucao) values (
      '{$informacao->erro}','{$informacao->descricao}','{$informacao->solucao}')";

    return mysqli_multi_query($this->conexao, $query); // comando para abrir conexao e gravar dados na tabela
  }

  function alteraInformacao(Informacao $informacao){
    $query = "update informacao set erro = '{$informacao->erro}', descricao ='{$informacao->descricao}', solucao = '{$informacao->solucao}',
    modelo_fk = '{$informacao->modelo->modelo_id}'  where info_id = '{$informacao->info_id}'";
     //variavel para adicionar valores a tabela informacao

    return mysqli_query($this->conexao, $query); // comando para abrir conexao e gravar dados na tabela
  }



  function buscaInformacao($id){
    $query = "select * from captacao where id='{$id}'";

    // $query = "update informacao set erro = '{$informacao->erro}', descricao ='{$informacao->descricao}', solucao = '{$informacao->solucao}',
    // modelo_fk = '{$informacao->modelo->modelo_id}'  where info_id = '{$informacao->info_id}'";
     //variavel para adicionar valores a tabela informacao

    $resultado = mysqli_query($this->conexao, $query);
    $informacao_buscada = mysqli_fetch_assoc($resultado);


    $query2= "select i.modelo_fk from informacao i
                          join modelo m on m.modelo_id = i.modelo_fk
                          where m.modelo_nome = 'T640'";

    $resultado_modelo_nome = mysqli_query($this->conexao, $query2);
    $modelo_id_fk = mysqli_fetch_assoc($resultado_modelo_nome);
    var_dump($modelo_id_fk);

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

    return $informacao;

  }

  // function removeInformacao($id){
  //   $query = "delete from informacao where info_id = {$id}";
  //   return mysqli_query($this->conexao, $query);
  // }
}
