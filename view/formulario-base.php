  <tr>
    <td>Fabricante</td>
    <td>
      <select class="form-control" name="fab_id">
        <?php foreach ($fabricantes as $fabricante):
          $fabricanteSelecionado = $informacao->fabricante->fab_id == $fabricante->fab_id;
          $selecaoFabricante = $fabricanteSelecionado ? "selected='selected'" : "";?>

          <option value="<?=$fabricante->fab_id?>"<?=$selecaoFabricante?>><?=$fabricante->fab_nome?></option>
        <?php  endforeach ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Modelo</td>
    <td>
      <select name="modelo_id" class="form-control">
        <?php foreach ($modelos as $modelo) :
          $modeloSelecionado = $informacao->modelo->modelo_id == $modelo->modelo_id;
          $selecaoModelo = $modeloSelecionado ? "selected='selected'" : "";?>

          <option value="<?=$modelo->modelo_id?>"<?=$selecaoModelo?>><?=$modelo->modelo_nome?></option>

        <?php endforeach ?>
      </select>
    </td>

  </tr>
  <tr>
      <td>Erro</td>
      <td><input class="form-control"type="text" name="erro" value="<?=$informacao->erro?>"/><td>
  </tr>
  <tr>
      <td>Descrição</td>
      <td><textarea class="form-control" name="descricao" rows="4" cols="25"><?=$informacao->descricao?>
      </textarea></td>
  </tr>
  <tr>
      <td>Solução</td>
      <td><textarea class="form-control" name="solucao" rows="4" cols="25"><?=$informacao->solucao?>
      </textarea></td>
  </tr>
