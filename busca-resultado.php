<?php
  require_once('view/cabecalho.php');
  require_once('conecta.php');
  require_once('logica-usuario.php');
  require_once("banco-informacao.php");

  verificaUsuario();

  $filtros = array();

  if (!empty($_POST['modelo_id'])) {
  	$modelo_id = trim($_POST['modelo_id']);
  	$filtros['modelo_id'] = "modelo_id LIKE '%$modelo_id%'";
  }

  if (!empty($_POST['descricao'])) {
  	$descricao = trim($_POST['descricao']);
    $filtros['descricao'] = "descricao LIKE '%$descricao%'";

  }
  if (!empty($_POST['erro'])) {
  	$erro = trim($_POST['erro']);
    $filtros['erro'] = "erro LIKE '%$erro%'";
  }

  $sql = "select i.*, m.nome as modelo_nome from informacao as i
  join modelo as m on m.id = i.modelo_id";
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
      <td><b>Modelo</b></td>
      <td><b>Erro</b></td>
      <td><b>Descrição</b></td>
      <td><b>Solução</b></td>
    </tr>
  <?php
    while($linha = mysqli_fetch_assoc($resultado)){
    
    ?>
      <tr>
        <td><?= $linha["modelo_nome"] ?></td>
        <td><?= $linha["erro"] ?></td>
        <td><?= $linha["descricao"] ?></td>
        <td><?= $linha["solucao"] ?></td>
      </tr>
    <?php } ?>

  </table>

<?php include("view/rodape.php");?>
