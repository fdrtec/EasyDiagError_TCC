<?php
require_once('view/cabecalho.php');
require_once('logica-usuario.php');

verificaUsuario();

?>

<form action="captura-import.php" method="POST" enctype="multipart/form-data">


  <input class="form-control"type="hidden" name="MAXI_FILE_SIZE" value="2000000"/>

  <h2>Captação de dados</h2>


  <label><h4>Instruções: Faça o download da tabela padrão excel <a href="listaExcel/modelo tabela de defeitos.zip">AQUI</a></h3>
  Inclua os novos dados no arquivo usando uma suite de escritório (ex: Excel do pacote Office)<br>
  Ao terminar salve seu trabalho numa copia de extensão XML</label>
  <label><h3>Busque seu arquivo XML (Conteúdo da Tabela excel) e faça o upload</h3></label>
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
    <td><b>Equip</b></td>
    <td><b>Tipo</b></td>
    <td><b>Fabricante</b></td>
    <td><b>Modelo</b></td>
    <td><b>Erro</b></td>
    <td><b>Descrição</b></td>
    <td><b>Solução</b></td>
    <td><b>Código da Peca</b></td>
    <td><b>Descrição da peça</b></td>
    <td><b>Inclusão</b></td>
  </tr>
<?php
  while($linha = mysqli_fetch_assoc($resultado)){

  ?>
    <tr>
      <td><?= $linha["equipamento"] ?></td>
      <td><?= $linha["tipo"] ?></td>
      <td><?= $linha["fabricante"] ?></td>
      <td><?= $linha["modelo"] ?></td>
      <td><?= $linha["erro"] ?></td>
      <td><?= $linha["descricao"] ?></td>
      <td><?= $linha["solucao"] ?></td>
      <td><?= $linha["codPeca"] ?></td>
      <td><?= $linha["descricaoPeca"] ?></td>
      <td><a class="btn btn-primary"
        href="captacao-insere-formulario.php?
        id=<?=$linha['id']?>">Analisar</a></td>


    </tr>
  <?php } ?>

</table>



<?php include ('view/rodape.php'); //importa rodape ?>
