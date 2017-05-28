<?php
require_once('view/cabecalho.php');
require_once('logica-usuario.php');

verificaUsuario();

?>

<form action="captura-import.php" method="POST" enctype="multipart/form-data">


  <input class="form-control"type="hidden" name="MAXI_FILE_SIZE" value="2000000"/>

  <h2>Captação de dados</h2>
  <label><h3>Insira um arquivo de tabela excel no formato XML</h3></label>
  <table>
    <tr>
      <td><input class="form-control" type="file" name="arquivo"></td>
      <td><input class="btn btn-primary" type="submit" value="Upload"></td>
    </tr>
  </table>
</form>

<?php
$sql = "select * from captacao";
$resultado = mysqli_query($conexao, $sql);
?>
<table class="table table-striped table-bordered">
  <tr style="background: black; color:white">
    <td><b>Tipo</b></td>
    <td><b>Modelo</b></td>
    <td><b>Defeito</b></td>
    <td><b>Solução</b></td>
    <td><b>Código da Peca</b></td>
    <td><b>Descrição da peça</b></td>
  </tr>
<?php
  while($linha = mysqli_fetch_assoc($resultado)){

  ?>
    <tr>
      <td><?= $linha["tipo"] ?></td>
      <td><?= $linha["modelo"] ?></td>
      <td><?= $linha["defeito"] ?></td>
      <td><?= $linha["solucao"] ?></td>
      <td><?= $linha["codPeca"] ?></td>
      <td><?= $linha["descricaoPeca"] ?></td>
      
    </tr>
  <?php } ?>

</table>



<?php include ('view/rodape.php'); //importa rodape ?>
