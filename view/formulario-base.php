  <tr>
    <td>modelo</td>
    <td>
      <select name="modelo_id">
        <?php foreach ($modelos as $modelo) :?>
          <option value="<?=$modelo['id']?>"><?=$modelo['nome']?></option>
        <?php endforeach ?>
      </select>
    </td>

  </tr>
  <tr>
      <td>Erro:</td>
      <td><input class="form-control"type="text" name="erro" value="<?=$informacao['erro']?>"/><td>
  </tr>
  <tr>
      <td>Descrição:</td>
      <td><textarea class="form-control" name="descricao" rows="8" cols="40"><?=$informacao['descricao']?></textarea></td>
  </tr>
