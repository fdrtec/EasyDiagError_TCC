<?php require_once('view/cabecalho.php');
      require_once('logica-usuario.php');

      verificaUsuario();

      $fabricante = new Fabricante();
      $equipamento = new Equipamento();
      $tipo = new Tipo();
      $modelo = new Modelo();
      $informacao = new Informacao();


      $informacao->fabricante = $fabricante;
      $informacao->equipamento = $equipamento;
      $informacao->tipo = $tipo;
      $informacao->modelo = $modelo;

      $modeloDao = new ModeloDao($conexao);
      $modelos = $modeloDao->listaModelo();

      $tipoDao = new TipoDao($conexao);
      $tipos = $tipoDao->listaTipo();

      $equipamentoDao = new EquipamentoDao($conexao);
      $equipamentos = $equipamentoDao->listaEquipamento();

      $fabricanteDao = new FabricanteDao($conexao);
      $fabricantes = $fabricanteDao->listaFabricante();

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
