<?php include('cabecalho.php');
      include('conecta.php');
      include ('logica-usuario.php');
      include ('banco-modelo.php');

      verificaUsuario();
      $modelo = listamodelo($conexao);
 ?>

<h3><b>Formulário de Inserção para novas
Informações de erros das Impressoras HP<b></h3><br><br>

  <form action="adiciona-informacao.php" method="POST">
    <table class="table">
      <tr>
        <td>modelo</td>
        <td>
          <select name="modelo_id">
            <?php foreach ($modelo as $modelo) :?>
              <option value="<?=$modelo['id']?>"><?=$modelo['nome']?></option>
            <?php endforeach ?>
          </select>
        </td>

      </tr>
      <tr>
        <td>Erro:</td>
        <td><input class="form-control"type="text" name="erro"/><td>
      </tr>
      <tr>
        <td>Descrição:</td>
        <td><textarea class="form-control" name="descricao" rows="8" cols="40"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <button class="form-control btn btn-primary" type="submit">Cadastrar</button>
        </td>
      </tr>
    </table>

  </form>

<?php include ('rodape.php'); ?>
