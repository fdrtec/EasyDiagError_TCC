<?php require_once('view/cabecalho.php');
      require_once('logica-usuario.php');

  verificaUsuario();

  $informacaoDao = new InformacaoDao($conexao);

  $modelo = new Modelo();
  $modelo->modelo_id = $_POST['modelo_id'];

  $fabricante = new Fabricante();
  $fabricante->fab_id = $_POST['fab_id'];

  $informacao = new Informacao();
  $informacao->erro = $_POST['erro'];
  $informacao->descricao = $_POST['descricao'];
  $informacao->solucao = $_POST['solucao'];
  $informacao->modelo = $modelo;
  $informacao->fabricante = $fabricante;

  if($informacaoDao->insereInformacao($informacao)) { ?>
    <h3><b>A informação foi adicionada com sucesso ao banco de dados!<b></h3><br>
      <p class="text-success">
        Descrição do Erro: <?= $informacao->erro; ?><br>
        Informação: <?= $informacao->descricao; ?><br>
        Modelo: <?= $informacao->modelo->modelo_id; ?><br>
        Fabricante: <?=$informacao->fabricante->fab_id; ?></p>

  <?php } else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger">A informação com erro <?= $informacao->erro; ?> não foi adicionado:<?= $msg?></p>
    <?php
    }
    ?>
<?php include ('view/rodape.php'); //importa rodape ?>
