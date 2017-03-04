<?php include ('cabecalho.php');?> <!--importa cabeçalho-->
<?php include ('conecta.php');?> <!--importa conexao BD-->
<?php include ('banco-informacao.php');?> <!--importa arquivo de funcoes-->
<?php include ('logica-usuario.php');?>
<?php include ('class/Informacao.php') ?>

<?php
  verificaUsuario();

  $informacao = new Informacao();

  $informacao->erro = $_POST['erro']; //adiciona valor do campo erro ao atributo erro do objeto informação
  $informacao->descricao = $_POST['descricao'];
  $informacao->modelo_id = $_POST['modelo_id'];

 //usa metodo do banco-informacao.php
  if(insereInformacao($conexao, $informacao)) { ?>
    <h3><b>A informação foi adicionada com sucesso ao banco de dados!<b></h3><br>
      <p class="text-success">
        Descrição do Erro: <?= $informacao->erro; ?><br>
        Informação: <?= $informacao->descricao; ?><br>
        Modelo: <?= $informacao->modelo_id; ?></p>

  <?php } else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger">A informação com erro <?= $informacao->erro; ?> não foi adicionado:<?= $msg?></p>
    <?php
    }
    ?>
<?php include ('rodape.php'); //importa rodape ?>
