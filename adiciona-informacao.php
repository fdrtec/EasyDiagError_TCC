<?php include ('cabecalho.php');?> <!--importa cabeçalho-->
<?php include ('conecta.php');?> <!--importa conexao BD-->
<?php include ('banco-informacoes.php');?> <!--importa arquivo de funcoes-->
<?php include ('logica-usuario.php');?>

<?php
  verificaUsuario();

  $erro = $_POST['erro']; //variavel para pegar campo erro do formulário
  $descricao = $_POST['descricao']; //variavel para pegar descricao do formulario
  $modelo_id = $_POST['modelo_id'];

  if(insereInformacao($conexao, $erro, $descricao, $modelo_id)) { ?>
    <h3><b>A informação foi adicionada com sucesso ao banco de dados!<b></h3><br>
      <p class="text-success">
        Descrição do Erro: <?= $erro; ?><br>
        Informação: <?= $descricao; ?><br>
        Modelo: <?= $modelo_id; ?></p>

  <?php } else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger">A informação com erro <?= $erro; ?> não foi adicionado:<?= $msg?></p>
    <?php
    }
    ?>
<?php include ('rodape.php'); //importa rodape ?>
