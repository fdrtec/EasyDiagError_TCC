<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-informacao.php");

$id = $_POST['id'];
removeInformacao($conexao, $id);
header("Location: informacao-lista.php?removido=true");
?>



<?php include("rodape.php");?>
