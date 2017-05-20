<?php
require_once('view/cabecalho.php');
require_once('logica-usuario.php');

verificaUsuario();

?>

<form action="captura-import.php" method="post" enctype="multipart/form-data">

  <input class="form-control"type="hidden" name="MAXI_FILE_SIZE" value="2000000"/>

  <h2>Adicione um arquivo .xls para captação de dados</h2><br><br>

  <table>
    <tr>
      <td><input class="form-control" type="file" name="fileXLS"></td>
      <td><input class="btn btn-primary" type="submit" value="Upload"></td>
    </tr>
  </table>


</form>


<?php include ('view/rodape.php'); //importa rodape ?>
