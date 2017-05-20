<?php
require_once('view/cabecalho.php');
require_once('banco-usuario.php');


if($_SERVER['REQUEST_METHOD'] == 'GET') {
 ?>

 <h3><b>Cadastrar novo usuario<b></h3><br><br>

   <form method="POST">
     <table class="table">
       <tr>
         <td>Email do Usuário:</td>
         <td><input class="form-control"type="email" name="usuarioNovo"/><td>
       </tr>
       <tr>
         <td>Senha:</td>
         <td><input class="form-control" type="password" name="senhaUsuarioNovo" ></td>
       </tr>
       <tr>
         <td>
           <button class="btn btn-primary" type="submit">Cadastrar</button>
         </td>
       </tr>
     </table>

   </form>

   <?php } else {
     $email = $_POST['usuarioNovo'];
     $senha = $_POST['senhaUsuarioNovo'];
     criaUsuario($conexao, $email, $senha);
     header("Location: index.php");

   } ?>

 
 <?php include ('view/rodape.php'); //importa rodape ?>
