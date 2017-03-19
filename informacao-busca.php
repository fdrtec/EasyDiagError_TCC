<?php
  include("view/cabecalho.php");
  include("conecta.php");
  include ('banco-modelo.php');
  include ('logica-usuario.php');



  verificaUsuario();
  $modelos = listaModelo($conexao);
 ?>

 <h3><b>Busca de informações por campo</b></h3>

 <form action="busca-resultado.php" method="post">
   <table>
     <tr>
      <td>
        <select class="form-control" name="modelo_id">
          <?php foreach ($modelos as $modelo): ?>
            <option value="<?=$modelo->id?>"><?=$modelo->nome?></option>
          <?php endforeach ?>
        </select>
      </td>
      <td>
        <button class="btn btn-primary" type="submit">Buscar por modelo</button>
      </td>
    </tr>

 </table>
 </form>

 <form action="busca-resultado.php" method="post">
   <table>
     <tr>
       <td><input class="form-control" type="text" name="erro"</td>
       <td><button type="submit" class="btn btn-primary">Buscar por Erro</button></td>
     </tr>
   </table>

 </form>
 <form action="busca-resultado.php" method="post">
   <table>
     <tr>
       <td><input class="form-control" type="text" name="descricao"</td>
       <td><button type="submit" class="btn btn-primary">Buscar por Descrição</button></td>
     </tr>
   </table>

 </form>
<?php include("view/rodape.php"); ?>
