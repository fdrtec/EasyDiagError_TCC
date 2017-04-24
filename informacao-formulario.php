<?php require_once('view/cabecalho.php');
      require_once('logica-usuario.php');
      require_once('banco-fabricante.php');

      verificaUsuario();

      $fabricante = new Fabricante();
      $modelo = new Modelo();

      $informacao = new Informacao();
      $informacao->modelo = $modelo;
      $informacao->fabricante = $fabricante;

      $modeloDao = new ModeloDao($conexao);
      $modelos = $modeloDao->listaModelo();
      $fabricantes = listaFabricante($conexao);
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
