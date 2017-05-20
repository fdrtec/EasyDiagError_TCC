<?php

require_once("view/cabecalho.php");
require_once('logica-usuario.php');

  verificaUsuario();
?>

<form action="index.html" method="post">


<h3>Prototipo do Select</h3>
<select class="form-control" id="equip">
  <option value="">Escolha um equipamento</option>
  <?php $query = mysqli_query($conexao, "select * from equipamento order by nome");
        while($objArrayEquipto = mysqli_fetch_assoc($query)){
          echo '<option value="'.objArrayEquipto["id"].'">'.$objArrayEquipto["nome"].'</option>';
        }?>
</select><br>
<span class="carregando">aguarde, carregando...</span>
<select class="form-control" id="tipo">
  <option value="">Escolha um tipo</option>
</select>
</form>

<script src="https://www.google.com/jsapi"></script>
<script> google.load("jquery", "1.4.2");</script>

<script>
  $(function(){
    $('#equip').change(function(){
      if($(this).val()){
        $('#tipo').hide();
        $('.carregando').show();
        $.getJSON('sub_select.php?search=',{equip_id: $(this).val(), ajax:'true'}, function(j){
          var options = '<options values="">Escolha o tipo</options>';
          for (var i = 0; i < j.length; i++) {
            options += '<option value="'+ j[i].id +'">'+ j[i].categoria +'</option>';
          }
          $('#tipo').html(options).show();
          $('.carregando').hide();
        });


    } else {
      $('#tipo').html('<option value=""> - Escolha o tipo - </option>');
    }

  });
  });


</script>


<?php include("view/rodape.php");?>
