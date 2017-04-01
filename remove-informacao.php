<?php require_once("view/cabecalho.php");

$informacaoDao = new InformacaoDao($conexao);

$id = $_POST['id'];
$informacaoDao->removeInformacao($id);
header("Location: informacao-lista.php?removido=true");
?>

<?php include("rodape.php");?>
