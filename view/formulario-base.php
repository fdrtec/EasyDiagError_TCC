  <tr>
    <td>Modelo</td>
    <td>

      <select name="modelo_id" class="form-control">

        <?php foreach ($modelos as $modelo) :
          $modeloSelecionado = $informacao->modelo->id == $modelo->id;
          $selecaoModelo = $modeloSelecionado ? "selected='selected'" : "";?>

          <option value="<?=$modelo->id?>"<?=$selecaoModelo?>><?=$modelo->nome?></option>

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
      <td><textarea class="form-control" name="descricao" rows="8" cols="40"><?=$informacao->descricao?>
      </textarea></td>
  </tr>
