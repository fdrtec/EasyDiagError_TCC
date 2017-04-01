<?php include('view/cabecalho.php');
      include('banco-modelo.php');
      include('banco-fabricante.php');
      include('logica-usuario.php');


$informacaoDao = new InformacaoDao($conexao);

$id =  $_GET['id'];
$informacao = $informacaoDao->buscaInformacao($id);
$modelos = listaModelo($conexao);
$fabricantes = listaFabricante($conexao);

verificaUsuario();
 ?>

<h3><b>Formulário de Alteração de
Informação de erros<b></h3><br><br>

  <form action="altera-informacao.php" method="POST">
    <input type="hidden" name="id" value="<?=$informacao->id?>">
    <table class="table">

    <?php include('view/formulario-base.php') ?>

      <tr>
        <td></td>
        <td>
          <button class="form-control btn btn-primary" type="submit">Alterar</button>
        </td>
      </tr>
    </table>

  </form>

<?php include ('view/rodape.php'); ?>
