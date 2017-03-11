<?php
  include("view/cabecalho.php");
  include("conecta.php");
  include("banco-informacao.php");
  include ('logica-usuario.php');

  verificaUsuario(); ?>

<?php if(array_key_exists("removido", $_GET) && $_GET['removido']=='true'){ ?>
  <p class="alert-success">informação apagada com sucesso</p>
  <?php } ?>

<?php
  $informacoes = listaInformacao($conexao);

?>
  <table class="table table-striped table-bordered">
    <tr style="background: black; color:white">
      <td><b>Modelo</b></td>
      <td><b>Erro</b></td>
      <td><b>Descrição</b></td>
    </tr>
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

<?php include("view/rodape.php");?>
