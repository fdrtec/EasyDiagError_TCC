<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-informacoes.php");

$id = $_POST['id'];
removeInformacao($conexao, $id);
header("Location: informacoes-lista.php?removido=true");
?>



<?php include("rodape.php");?>
