<?php include ('view/cabecalho.php');
      include ('conecta.php');
      include ('banco-informacao.php');
      include ('logica-usuario.php');
      include ('class/Informacao.php'); ?>

<?php
  verificaUsuario();

  $informacao = new Informacao();
  $informacao->id = $_POST['id'];
  $informacao->erro = $_POST['erro'];
  $informacao->descricao = $_POST['descricao'];

  if(alteraInformacao($conexao, $informacao)) { ?>
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
