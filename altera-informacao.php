<?php require_once('view/cabecalho.php');
      include ('logica-usuario.php');

  verificaUsuario();

  $informacaoDao = new InformacaoDao($conexao);

  $modelo = new Modelo();
  $tipo = new Tipo();
  $fabricante = new Fabricante();


  $informacao = new Informacao();
  $informacao->info_id = $_POST['info_id'];
  $informacao->erro = $_POST['erro'];
  $informacao->descricao = $_POST['descricao'];
  $informacao->solucao = $_POST['solucao'];
  $informacao->modelo = $modelo;
  $informacao->modelo->modelo_id = $_POST['modelo_id'];
  $informacao->tipo = $tipo;
  $informacao->tipo->tipo_id = $_POST['tipo_id'];
  $informacao->fabricante = $fabricante;
  $informacao->fabricante->fab_id = $_POST['fab_id'];


  if($informacaoDao->alteraInformacao($informacao)) { ?>
    <h3><b>A informação foi alterada com sucesso no banco de dados!<b></h3><br>
      <p class="text-success">
        Descrição do Erro: <?= $informacao->erro; ?><br>
        Informação: <?= $informacao->descricao; ?><br></p>
    <?php }
    else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger">A informação com erro <?= $informacao->erro; ?> não foi alterado:<?= $msg?></p>
    <?php
    }
    ?>
<?php include ('view/rodape.php'); //importa rodape ?>
