  <tr>
    <td>Equipamento</td>
    <td>
      <select class="form-control" name="equip_id">
        <option value="">Escolha um Equipamento</option>
        <?php foreach ($equipamentos as $equipamento):
          $equipamentoSelecionado = $informacao->equipamento->equip_id == $equipamento->equip_id;
          $selecaoEquipamento = $equipamentoSelecionado ? "selected='selected'" : "";?>

          <option value="<?=$equipamento->equip_id?>"<?=$selecaoEquipamento?>><?=$equipamento->equip_nome?></option>
        <?php  endforeach ?>
      </select>
    </td>
  </tr>
  <tr>
  <tr>
    <td>Tipo</td>
    <td>
      <select class="form-control" name="tipo_id">
        <option value="">Selecione o Tipo</option>
        <?php foreach ($tipos as $tipo):
          $tipoSelecionado = $informacao->tipo->tipo_id == $tipo->tipo_id;
          $selecaoTipo = $tipoSelecionado ? "selected='selected'" : "";?>

          <option value="<?=$tipo->tipo_id?>"<?=$selecaoTipo?>><?=$tipo->tipo_nome?></option>
        <?php  endforeach ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Fabricante</td>
    <td>
      <select class="form-control" name="fab_id">
        <option value="">Informe o Fabricante</option>
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
        <option value="">Diga qual modelo</option>
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
      <td><input class="form-control"type="text" name="erro" placeholder="Descreva o problema encontrado" value="<?=$informacao->erro?>"/><td>
  </tr>
  <tr>
      <td>Descrição</td>
      <td><textarea class="form-control" name="descricao" rows="2" cols="25"><?=$informacao->descricao?>
      </textarea></td>
  </tr>
  <tr>
      <td>Solução</td>
      <td><textarea class="form-control" name="solucao"  rows="2" cols="25"><?=$informacao->solucao?>
      </textarea></td>
  </tr>
