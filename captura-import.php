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
      $tipo = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
        echo "Tipo Impressora: $tipo<br>";
      $modelo = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
        echo "Modelo: $modelo<br>";
      $defeito= $linha->getElementsByTagName("Data")->item(2)->nodeValue;
        echo "defeito: $defeito<br>";
      $solucao = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
        echo "Solução: $solucao<br>";
      $codPeca = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
        echo "Código Peça: $codPeca<br>";
      $descricaoPeca = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
        echo "Descricao da Peca: $descricaoPeca<br>";
      echo "<hr>";

      $result_captacao = "insert into captacao(tipo, modelo, defeito, solucao, codPeca, descricaoPeca)
      values('$tipo','$modelo','$defeito', '$solucao', '$codPeca', '$descricaoPeca')";

      $resultado_captacao = mysqli_query($conexao, $result_captacao);
    }
    $primeiraLinha = false;
  }





}


require_once('view/rodape.php');
?>
