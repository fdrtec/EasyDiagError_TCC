<?php include ('cabecalho.php');?> <!--importa cabeçalho-->
<?php include ('conecta.php');?> <!--importa conexao BD-->
<?php include ('banco-informacoes.php');?> <!--importa arquivo de funcoes-->
<?php include ('logica-usuario.php');?>

<?php
  verificaUsuario();
  $id = $_POST['id'];
  $erro = $_POST['erro']; //variavel para pegar campo erro do formulário
  $descricao = $_POST['descricao']; //variavel para pegar descricao do formulario

  if(alteraInformacao($conexao, $id, $erro, $descricao)) { ?>
    <h3><b>A informação foi alterada com sucesso no banco de dados!<b></h3><br>
      <p class="text-success">
        Descrição do Erro: <?= $erro; ?><br>
        Informação: <?= $descricao; ?><br></p>
    <?php }
    else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger">A informação com erro <?= $erro; ?> não foi alterado:<?= $msg?></p>
    <?php
    }
    ?>
<?php include ('rodape.php'); //importa rodape ?>
