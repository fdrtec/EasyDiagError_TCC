<?php include('view/cabecalho.php');
      include('logica-usuario.php');


$informacaoDao = new InformacaoDao($conexao);
$modeloDao = new ModeloDao($conexao);
$tipoDao = new TipoDao($conexao);
$equipamentoDao = new EquipamentoDao($conexao);
$fabricanteDao = new FabricanteDao($conexao);


$info_id =  $_GET['info_id'];
$informacao = $informacaoDao->buscaInformacao($info_id);
//var_dump($informacao);

$modelos = $modeloDao->listaModelo();
$tipos = $tipoDao->listaTipo();
$equipamentos = $equipamentoDao->listaEquipamento();
$fabricantes = $fabricanteDao->listaFabricante();



//var_dump ($modelos);
verificaUsuario();
 ?>

<h3><b>Formulário de Alteração de
Informação de erros<b></h3><br><br>

  <form action="altera-informacao.php" method="POST">

    <input type="hidden" name="info_id" value="<?=$informacao->info_id?>">
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
