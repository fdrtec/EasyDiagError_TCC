<?php
  require_once("view/cabecalho.php");
  require_once('logica-usuario.php');

  verificaUsuario();

  $equipamentoDao = new EquipamentoDao($conexao);
  $equipamentos = $equipamentoDao->listaEquipamento();

  $tipoDao = new TipoDao($conexao);
  $tipos = $tipoDao->listaTipo();

  $fabricanteDao = new FabricanteDao($conexao);
  $fabricantes = $fabricanteDao->listaFabricante();

  $modeloDao = new ModeloDao($conexao);
  $modelos = $modeloDao->listaModelo();

 ?>

 <h3><b>Buscador de informações</b></h3>
 <h2><b>Principal</b></h2>

 <form action="busca-resultado.php" method="post">
   <table>
     <tr>
      <td>

        <select class="form-control" name="modelo_id">
          <option value="">Informe o Modelo</option>
          <?php foreach ($modelos as $modelo): ?>
            <option value="<?=$modelo->modelo_id?>"><?=$modelo->modelo_nome?></option>
          <?php endforeach ?>
        </select>
      </td>
      <td>
        <button class="btn btn-primary" type="submit">Buscar por modelo</button>
      </td>
    </tr>

 </table>
 </form>

<h2><b>Auxiliares</b></h3>
 <form action="busca-resultado.php" method="post">
   <table>
     <tr>
      <td>
        <select class="form-control" name="fab_id">
          <option value="">Informe o Fabricante</option>
          <?php foreach ($fabricantes as $fabricante): ?>
            <option value="<?=$fabricante->fab_id?>"><?=$fabricante->fab_nome?></option>
          <?php endforeach ?>
        </select>
      </td>
      <td>
        <button class="btn btn-primary" type="submit">Buscar por fabricante</button>
      </td>
    </tr>

 </table>
 </form>


 <form action="busca-resultado.php" method="post">
   <table>
     <tr>
       <td><input class="form-control" type="text" name="erro" placeholder="Digite uma palavra chave"</td>
       <td><button type="submit" class="btn btn-primary">Buscar por Erro</button></td>
     </tr>
   </table>

 </form>
 <form action="busca-resultado.php" method="post">
   <table>
     <tr>
       <td><input class="form-control" type="text" name="descricao" placeholder="digite uma palavra chave"</td>
       <td><button type="submit" class="btn btn-primary">Buscar por Descrição</button></td>
     </tr>
   </table>

 </form>
<?php include("view/rodape.php"); ?>
