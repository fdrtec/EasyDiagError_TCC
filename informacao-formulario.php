<?php include('view/cabecalho.php');
      include('conecta.php');
      include ('logica-usuario.php');
      include ('banco-informacao.php');
      include ('banco-modelo.php');
      //include('class/Informacao.php');
      //include('class/Modelo.php');


      verificaUsuario();

      $modelos = listaModelo($conexao);

      $modelo = new modelo();
      $modelo->id = 1;

      $informacao = new informacao();
      $informacao->modelo = $modelo;

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
