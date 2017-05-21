<?php
require_once('view/cabecalho.php');
require_once('logica-usuario.php');

// activar Error reporting
error_reporting(E_ALL);

// carregar a classe PHPExcel
require_once 'PHPExcel/PHPExcel.php';

// iniciar o objecto para leitura
// definir a abertura do ficheiro em modo só de leitura
//$file_tmp = $_FILES['filesXLS'];

// try {
//     $FileType = PHPExcel_IOFactory::identify( $file_tmp );
//     $objReader = PHPExcel_IOFactory::createReader( $FileType );
//     $objReader->setReadDataOnly( true );
//     $objPHPExcel = $objReader->load( $file_tmp );
// }catch( Exception $e ){
//     die( $e->getMessage() );
// }
//
// $objWorksheet = $objPHPExcel->getActiveSheet();
// $fimColuna = $objWorksheet->getHighestColumn();
// $numero_de_linhas = $objWorksheet->getHighestRow();
// $numero_de_colunas = PHPExcel_Cell::columnIndexFromString( $fimColuna );
//
// for( $row = 0; $row <= $numero_de_linhas; $row++ ){
//     $data = array();
//     for( $col = 0; $col < $numero_de_colunas; $col++ ){
//         $data[] = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
//     }
// }

$objReader = new PHPExcel_Reader_Excel5();
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load($_FILES['filesXLS']);
//$objPHPExcel = $objReader->load("listaExcel/tabela de defeitos.xls");
$objPHPExcel->setActiveSheetIndex(0);

echo "<table border='1'>";
// navegar na linha
for($linha=1; $linha<=30; $linha++){
    echo "<tr>";
	// navegar nas colunas da respectiva linha
    for($coluna=0; $coluna<=5; $coluna++){
        if($linha==1){
			// escreve o cabeçalho da tabela a bold
            echo "<th>".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue())."</th>";
        }else{
			// escreve os dados da tabela
            echo "<td>".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue())."</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";



// if(!empty($_FILES['fileXLS']['tmp_name'])){
//   $arquivo = new DOMDocument ();
//   $arquivo->load($_FILES['arquivo']['tmp_name']);
//
// }

require_once('view/rodape.php');
?>
