<?php
  require_once("conecta.php");

$equip_id = $_REQUEST('equip');

$result_sub_cat = "select * from tipo where equip = $equip_id order by categoria";
$resultado_sub_cat = mysqli_query($conexao, $result_sub_cat);

while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat)) {
  $sub_categoria_post[] = array(
    'id' => $row_sub_cat['id'],
    'categoria' => uft8-encode($row_sub_cat[]),
  );
}

echo(json_encode(sub_select));
