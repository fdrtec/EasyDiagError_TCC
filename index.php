<?php
  include ('view/cabecalho.php');
  include ('logica-usuario.php');

  if(isset($_GET["logout"]) && $_GET["logout"]==true){?>
    <p class="alert-danger">Deslogado com sucesso</p>
<?php } ?>

<?php
  if(isset($_GET["login"]) && $_GET["login"]==true){ ?>
  <p class="alert-success">Logado com sucesso</p>
<?php } ?>

<?php
  if(isset($_GET["login"]) && $_GET["login"]==false) { ?>
  <p class="alert-danger">E-mail ou senha invalidos</p>
<?php } ?>

<?php
  if(isset($_GET["falhaDeSeguranca"])) { ?>
  <p class="alert-danger">Voce não tem acesso permitido</p>
<?php } ?>


<h3>Bem Vindo ao <h1><b><font color="green";>EasyDiagError</font></b></h1></h3>

<?php
  if(usuarioEstaLogado()){?>
    <p class="text-success">Você está logado como <?=usuarioLogado()?></p>
    <a href="logout.php">Deslogar</a>
<?php }
else { ?>

<h4><em>Faça seu Login</em></h4>

<form action="login.php" method="post">
  <table class="table">
    <tr>
      <td>E-mail</td>
      <td><input class="form-control "type="email" name="email"></td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><input class="form-control" type="password" name="senha"></td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit" class="form-control btn btn-primary">Login</button></td>
    </tr>


  </table>

</form>
<?php } ?>
<a href="novoUsuario.php">Criar Novo Usuário</a>

<?php include ('view/rodape.php'); ?>
