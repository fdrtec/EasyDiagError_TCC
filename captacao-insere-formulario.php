<?php include('view/cabecalho.php');
      include('logica-usuario.php');


$captacaoDao = new CaptacaoDao($conexao);


$id =  $_GET['id'];
$informacao = $captacaoDao->buscaInformacao($id);
//var_dump($informacao);

//var_dump ($modelos);
verificaUsuario();
 ?>

<h3><b>Formulário para aprovação de dica via conversão de tabela excel<b></h3><br><br>

  <form action="altera-informacao.php" method="POST">

    <input type="hidden" name="info_id" value="<?=$informacao->info_id?>">
    <table class="table">

    <tr>
      <td>Equipamento</td>
      <td><input class="form-control"type="text" name="Equipamento" value="<?=$informacao->equipamento->equip_nome?>"/></td>
    </tr>
    <tr>
      <td>Tipo</td>
      <td><input class="form-control"type="text" name="Tipo" value="<?=$informacao->tipo->tipo_nome?>"/></td>
    </tr>
    <tr>
      <td>Fabricante</td>
      <td><input class="form-control"type="text" name="Fabricante" value="<?=$informacao->fabricante->fab_nome?>"/></td>
    </tr>
    <tr>
      <td>Modelo</td>
      <td><input class="form-control"type="text" name="Modelo" value="<?=$informacao->modelo->modelo_nome?>"/></td>
    </tr>
    <tr>
        <td>Erro</td>
        <td><input class="form-control"type="text" name="erro" placeholder="Descreva o problema encontrado" value="<?=$informacao->erro?>"/><td>
    </tr>
    <tr>
        <td>Descrição</td>
        <td><textarea class="form-control" name="descricao" rows="2" cols="25"><?=$informacao->descricao?>
        </textarea></td>
    </tr>
    <tr>
        <td>Solução</td>
        <td><textarea class="form-control" name="solucao"  rows="2" cols="25"><?=$informacao->solucao?>
        </textarea></td>
    </tr>

      <tr>
        <td></td>
        <td>
          <button class="form-control btn btn-primary" type="submit">Aprovar Informação</button>
        </td>
      </tr>
    </table>

  </form>

<?php include ('view/rodape.php'); ?>
