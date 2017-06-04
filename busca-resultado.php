<?php
  require_once('view/cabecalho.php');
  require_once('logica-usuario.php');


  verificaUsuario();

  $informacaoDao = new InformacaoDao($conexao); //problema aqui

  $filtros = array();

  if (!empty($_POST['fab_id'])) {
  	$fab_id = trim($_POST['fab_id']);
  	$filtros['fab_id'] = "fab_id LIKE '$fab_id'";
  }

  if (!empty($_POST['modelo_id'])) {
  	$modelo_id = trim($_POST['modelo_id']);
  	$filtros['modelo_id'] = "modelo_id LIKE '$modelo_id'";
  }

  if (!empty($_POST['descricao'])) {
  	$descricao = trim($_POST['descricao']);
    $filtros['descricao'] = "descricao LIKE '%$descricao%'";

  }
  if (!empty($_POST['erro'])) {
  	$erro = trim($_POST['erro']);
    $filtros['erro'] = "erro LIKE '%$erro%'";
  }

  $sql = "select i.*,
          m.modelo_nome as modelo_nome,
          f.fab_nome as fab_nome,
          t.tipo_nome as tipo_nome
            from informacao i
              join modelo m on m.modelo_id = i.modelo_fk
              inner join tipo_fab tf on tf.id_tipo_fab = m.tipo_fab_fk
              inner join fabricante f on f.fab_id = tf.fab_fk
              inner join tipo t on t.tipo_id = tf.tipo_fk";
  if (count($filtros) > 0) {
  // opa, tem filtros, entao temos que adicionar no sql
  $sql .= " WHERE " . implode(' AND ', $filtros);
  }


  // $resultado = mysqli_query($conexao,
  // "select * from informacao where modelo_id = $modelo_id");
  $resultado = mysqli_query($conexao, $sql);
  ?>
  <table class="table table-striped table-bordered">
    <tr style="background: black; color:white">
      <td><b>Fabricante</b></td>
      <td><b>Modelo</b></td>
      <td><b>Erro</b></td>
      <td><b>Descrição</b></td>
      <td><b>Solução</b></td>
    </tr>
  <?php
    while($linha = mysqli_fetch_assoc($resultado)){

    ?>
      <tr>
        <td><?= $linha["fab_nome"] ?></td>
        <td><?= $linha["modelo_nome"] ?></td>
        <td><?= $linha["erro"] ?></td>
        <td><?= $linha["descricao"] ?></td>
        <td><?= $linha["solucao"] ?></td>
      </tr>
    <?php } ?>

  </table>

<?php include("view/rodape.php");?>
