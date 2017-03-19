<?php include ('view/cabecalho.php');
      include ('banco-informacao.php');

      include ('class/Informacao.php');
      include ('class/Modelo.php');
      //include ('logica-usuario.php');
      
  //verificaUsuario();

  $modelo = new Modelo();
  $modelo->id = $_POST['modelo_id'];

  $informacao = new Informacao();
  $informacao->id = $_POST['id'];
  $informacao->erro = $_POST['erro'];
  $informacao->descricao = $_POST['descricao'];
  $informacao->modelo = $categoria;

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
