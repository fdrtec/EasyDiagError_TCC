<?php
  include("cabecalho.php");
  include("conecta.php");
  include("banco-informacoes.php");
  include ('logica-usuario.php');

  verificaUsuario(); ?>

<?php if(array_key_exists("removido", $_GET) && $_GET['removido']=='true'){ ?>
  <p class="alert-success">informação apagada com sucesso</p>
  <?php } ?>

<?php
  $informacoes = listaInformacoes($conexao);
?>
  <table class="table table-striped table-bordered">
<?php
  foreach($informacoes as $informacao):
?>
    <tr>
      <td><?= $informacao["modelo_nome"] ?></td>
      <td><?= $informacao["erro"] ?></td>
      <td><?= $informacao["descricao"] ?></td>
      <td><a class="btn btn-primary" href="informacao-altera-formulario.php?id=<?=$informacao['id']?>">Alterar</a></td>
      <td>
        <form action="remove-informacao.php" method="post">
          <input type="hidden" name="id" value="<?=$informacao['id']?>"/>
          <button class="btn btn-danger">remover</button>
        </form>
      </td>
    </tr>
<?php
  endforeach
 ?>
 </table>

<?php include("rodape.php");?>
