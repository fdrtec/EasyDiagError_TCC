<?php
  require_once("view/cabecalho.php");
  require_once("banco-modelo.php");

  include ('logica-usuario.php');
  verificaUsuario();

 if(array_key_exists("removido", $_GET) && $_GET['removido']=='true'){ ?>
  <p class="alert-success">informação apagada com sucesso</p>

  <?php }

  $informacaoDao = new InformacaoDao($conexao);
  $informacoes = $informacaoDao->listaInformacao();
?>

  <table class="table table-striped table-bordered">
    <tr style="background:black; color:white">
      <td><b>Modelo</b></td>
      <td><b>Erro</b></td>
      <td><b>Descrição</b></td>
      <td><b>Solução</b></td>
      <td><b>Alteração</b></td>
      <td><b>Remoção</b></td>
    </tr>

<?php
  foreach($informacoes as $informacao):
?>
    <tr>
      <td><?= $informacao->modelo->nome ?></td>
      <td><?= $informacao->erro ?></td>
      <td><?= $informacao->descricao ?></td>
      <td><?= $informacao->solucao ?></td>
      <td><a class="btn btn-primary"
        href="informacao-altera-formulario.php?
        id=<?=$informacao->id ?>">Alterar</a></td>
      <td>
        <form action="remove-informacao.php" method="post">
          <input type="hidden" name="id" value="<?=$informacao->id?>"/>
          <button class="btn btn-danger">remover</button>
        </form>
      </td>
    </tr>
<?php
  endforeach
 ?>
 </table>

<?php include("view/rodape.php");?>
