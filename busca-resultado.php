<?php
  include('cabecalho.php');
  include('conecta.php');
  include ('logica-usuario.php');
  include("banco-informacoes.php");

  verificaUsuario();

  $filtros = array();

  if (!empty($_POST['modelo_id'])) {
  	$modelo_id = trim($_POST['modelo_id']);
  	$filtros['modelo_id'] = "modelo_id LIKE '%$modelo_id%'";

  }
  if (!empty($_POST['busca'])) {
  	$descricao = trim($_POST['busca']);
  	$filtros['descricao'] = "descricao LIKE '%$descricao%''";
    var_dump($filtros);
  }

  // $sql = "SELECT * FROM informacoes";
  $sql = "select i.*, m.nome as modelo_nome from informacoes as i join modelos as m on m.id = i.modelo_id";
  if (count($filtros) > 0) {
  	// opa, tem filtros, entao temos que adicionar no sql
  	$sql .= " WHERE " . implode(' AND ', $filtros);
  }
  //var_dump($sql);




  // $resultado = mysqli_query($conexao,
  // "select * from informacoes where modelo_id = $modelo_id");
  $resultado = mysqli_query($conexao, $sql);
  ?>
  <table class="table table-striped table-bordered">
    <tr style="background: black; color:white">
      <td><b>Modelo</b></td>
      <td><b>Erro</b></td>
      <td><b>Descrição</b></td>
    </tr>
  <?php
    while($linha = mysqli_fetch_assoc($resultado)){
    // $modelo = $linha['erro'];
    // echo $modelo;
    ?>
      <tr>
        <td><?= $linha["modelo_nome"] ?></td>
        <td><?= $linha["erro"] ?></td>
        <td><?= $linha["descricao"] ?></td>
      </tr>
    <?php } ?>

  </table>

<?php include("rodape.php");?>
