<?php include('cabecalho.php');
      include('conecta.php');
      include ('logica-usuario.php');
      //include ('banco-categoria.php');
      include ('banco-informacoes.php');

$id =  $_GET['id'];
$informacao = buscaInformacao($conexao, $id);
//$categorias = listaCategorias($conexao);

verificaUsuario();
 ?>

<h3><b>Formulário de Alteração de
Informação de erros<b></h3><br><br>

  <form action="altera-informacao.php" method="POST">
    <input type="hidden" name="id" value="<?=$informacao['id']?>">
    <table class="table">
      <tr>
        <td>Erro:</td>
        <td><input class="form-control"type="text" name="erro" value="<?=$informacao['erro']?>"/><td>
      </tr>
      <tr>
        <td>Descrição:</td>
        <td><textarea class="form-control" name="descricao" rows="8" cols="40"><?=$informacao['descricao']?>"</textarea></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <button class="form-control btn btn-primary" type="submit">Alterar</button>
        </td>
      </tr>
    </table>

  </form>

<?php include ('rodape.php'); ?>
