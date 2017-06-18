<?php require_once('view/cabecalho.php');
      include ('logica-usuario.php');

  verificaUsuario();

  $captacaoDao = new CaptacaoDao($conexao);
  $modelo = new Modelo();


  $informacao = new Informacao();
  $informacao->erro = $_POST['erro'];
  $informacao->descricao = $_POST['descricao'];
  $informacao->solucao = $_POST['solucao'];
  $informacao->modelo = $modelo;
  $informacao->modelo->modelo_id = $_POST['modelo_id'];
  $informacao->modelo->modelo_nome = $_POST['modelo'];

if($_POST['modelo_id']){
  if($captacaoDao->insereInformacao($informacao)){ ?>
    <h3><b>Sua dica foi aceita e adicionada no modelo <?= $informacao->modelo->modelo_nome; ?><b></h3><br>
        <p class="text-success">
          Descrição do Erro: <?= $informacao->erro; ?><br>
          Informação: <?= $informacao->descricao; ?><br></p>
  <?php  }
   }
      else{
        $msg = mysqli_error($conexao);
        ?>
        <h3>Não há modelo cadastrado para adicionar a dica</h3>
        <p class="text-danger">A informação "<?= $informacao->erro; ?>" não foi adicionada:<?= $msg?></p>
        <h4>Faça o cadastro do modelo <?= $informacao->modelo->modelo_nome; ?> no banco de dados principal</h4>
        <?php
      }
      ?>

<?php include ('view/rodape.php'); //importa rodape ?>
