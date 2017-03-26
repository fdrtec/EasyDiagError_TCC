<?php require_once('view/cabecalho.php');
      require_once('banco-informacao.php');
      require_once('logica-usuario.php');
      require_once('class/Informacao.php');
      require_once('class/Modelo.php');
      require_once('class/Fabricante.php');



  verificaUsuario();

  $modelo = new Modelo();
  $modelo->id = $_POST['modelo_id'];

  $fabricante = new Fabricante();
  $fabricante->id = $_POST['fabricante_id'];

  $informacao = new Informacao();
  $informacao->erro = $_POST['erro'];
  $informacao->descricao = $_POST['descricao'];
  $informacao->modelo = $modelo;
  $informacao->fabricante = $fabricante;

 //Chama metodo do banco-informacao.php
  if(insereInformacao($conexao, $informacao)) { ?>
    <h3><b>A informação foi adicionada com sucesso ao banco de dados!<b></h3><br>
      <p class="text-success">
        Descrição do Erro: <?= $informacao->erro; ?><br>
        Informação: <?= $informacao->descricao; ?><br>
        Modelo: <?= $informacao->modelo->id; ?><br>
        Fabricante: <?=$informacao->fabricante->id; ?></p>

  <?php } else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger">A informação com erro <?= $informacao->erro; ?> não foi adicionado:<?= $msg?></p>
    <?php
    }
    ?>
<?php include ('view/rodape.php'); //importa rodape ?>
