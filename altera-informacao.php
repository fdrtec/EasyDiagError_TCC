<?php include ('cabecalho.php');?> <!--importa cabeçalho-->
<?php include ('conecta.php');?> <!--importa conexao BD-->
<?php include ('banco-informacoes.php');?> <!--importa arquivo de funcoes-->
<?php include ('logica-usuario.php');?>
<?php include ('class/Informacao.php'); ?>

<?php
  verificaUsuario();

  $informacao = new Informacao();
  $informacao->id = $_POST['id'];
  $informacao->erro = $_POST['erro']; //variavel para pegar campo erro do formulário
  $informacao->descricao = $_POST['descricao']; //variavel para pegar descricao do formulario

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
<?php include ('rodape.php'); //importa rodape ?>
