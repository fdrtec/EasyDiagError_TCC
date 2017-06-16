<?php
require_once('view/cabecalho.php');
require_once('logica-usuario.php');

$dados = $_FILES['arquivo'];
//var_dump($dados);

if(!empty ($_FILES['arquivo']['tmp_name'])){
  $arquivo = new DOMDocument();
  $arquivo->load($_FILES['arquivo']['tmp_name']);
  //var_dump($arquivo);

  $linhas = $arquivo->getElementsByTagName('Row');
  //var_dump($linhas);

  $primeiraLinha = true;

  foreach($linhas as $linha){
    if($primeiraLinha == false){
      $equipamento = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
        echo "Equipamento: $equipamento<br>";
      $tipo = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
        echo "Tipo: $tipo<br>";
      $fabricante = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
        echo "Fabricante: $fabricante<br>";
      $modelo = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
        echo "Modelo: $modelo<br>";
      $erro = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
        echo "Erro: $erro<br>";
      $descricao = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
        echo "Descricao: $descricao<br>";
      $solucao = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
        echo "Solução: $solucao<br>";
      $codPeca = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
        echo "Código Peça: $codPeca<br>";
      $descricaoPeca = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
        echo "Descricao da Peca: $descricaoPeca<br>";
      echo "<hr>";

      $result_captacao = "insert into captacao(equipamento, tipo, fabricante,  modelo, erro , descricao , solucao, codPeca, descricaoPeca)
      values('$equipamento', '$tipo', '$fabricante', '$modelo' , '$erro','$descricao', '$solucao', '$codPeca', '$descricaoPeca')";

      $resultado_captacao = mysqli_query($conexao, $result_captacao);
    }
    $primeiraLinha = false;
  }





}


require_once('view/rodape.php');
?>
