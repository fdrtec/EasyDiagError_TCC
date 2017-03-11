<?php include('view/cabecalho.php');
      include('conecta.php');
      include ('logica-usuario.php');
      include ('banco-modelo.php');

      verificaUsuario();
      $modelos = listamodelo($conexao);
      $informacao = array('erro' => '','descricao' => '');
 ?>

<h3><b>Formulário de Inserção para novas
Informações de erros das Impressoras HP<b></h3><br><br>

  <form action="adiciona-informacao.php" method="POST">
    <table class="table">
      <?php include('view/formulario-base.php') ?>
    <tr>
      <td></td>
      <td>
        <button class="form-control btn btn-primary" type="submit">Cadastrar</button>
      </td>
    </tr>
  </table>

<?php include ('view/rodape.php'); ?>
