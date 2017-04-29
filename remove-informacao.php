<?php require_once("view/cabecalho.php");

$informacaoDao = new InformacaoDao($conexao);

$info_id = $_POST['info_id'];
$informacaoDao->removeInformacao($info_id);
header("Location: informacao-lista.php?removido=true");
?>

<?php include("rodape.php");?>
