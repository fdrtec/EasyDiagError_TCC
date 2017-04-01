<?php include('view/cabecalho.php');
      include('banco-informacao.php');
      include('banco-modelo.php');
      include('banco-fabricante.php');

      include('logica-usuario.php');


$id =  $_GET['id'];
$informacao = buscaInformacao($conexao, $id);
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
