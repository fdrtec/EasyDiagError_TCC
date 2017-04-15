<?php

//autoLoading - pega a class que esta sendo estanciada e faz require no nome do arquivo
spl_autoload_register(function($nomeDaclasse){
  require_once("class/".$nomeDaclasse.".php");
});

// importação da conexão do BD para todas paginas
require_once("conecta.php");

?>
<html>
  <head>
    <meta charset="utf-8">
    <title>EasyDiagError</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">EasyDiagError</a>
        </div>

        <div>
          <ul class="nav navbar-nav">
            <li><a href="informacao-formulario.php">Adição de Informações</a></li>
            <li><a href="informacao-lista.php">Alterações de Informações</a></li>
            <li><a href="informacao-busca.php">Buscador da Biblioteca</a></li>
            <li><a href="selecao.php">Select Categorias</a></li>

          </ul>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="principal">
