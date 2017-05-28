<?php
class Tipo{
  public $tipo_id;
  public $tipo_nome;
  public $equipamento;
} ?>

<!-- select i.*, m.modelo_nome as modelo_nome, f.fab_nome as fab_nome, t.tipo_nome as tipo_nome from informacao i
                                                  join modelo m on m.modelo_id = i.modelo_fk
                                                  inner join fabricante as f on f.fab_id=m.fab_fk
                                                  inner join tipo_fab as tp on tp.tipo_fk=f.fab_id
                                                  inner join tipo as t on t.tipo_id = tp.fab_fk; -->
