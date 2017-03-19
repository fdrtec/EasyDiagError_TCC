<?php require_once('view/cabecalho.php');
      require_once('logica-usuario.php');
      require_once('banco-modelo.php');
      require_once('class/Informacao.php');
      require_once('class/Modelo.php');

      verificaUsuario();

      $modelo = new Modelo();
      $modelo->id = 1;

      $informacao = new Informacao();
      $informacao->modelo = $modelo;

      $modelos = listaModelo($conexao);
 ?>

<h3><b>Formulário de Inserção para novas
Informações de erros dos Equipamentos<b></h3><br><br>

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
