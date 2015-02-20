<?php require_once("../_inc/connectBD.php");


function printJsonProdutoPorEmpresa($codigoEmpresa){ 
$connect = new connectBD();

$sql = "SELECT * FROM produto p LEFT JOIN
produto_detalhes d ON d.produto_codigo = p.codigo  
inner JOIN empresa e ON e.id = d.empresa_id
WHERE e.codigochb = '{$codigoEmpresa}' -- EMPRESA ID
AND p.status=1;";

$connect->set('sql',$sql);
$connect->conectar();
$result = $connect->execute();

if(mysqli_num_rows($result)>0){
	$dados = mysqli_fetch_assoc($result);
	header('Content-Type: application/json');
	$json = json_encode($dados,JSON_PRETTY_PRINT);
	return $json;
}

}
