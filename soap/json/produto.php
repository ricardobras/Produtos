<?php require_once("../_inc/connectBD.php");


function printJsonProdutoPorEmpresa($codigoEmpresa){ 
$connect = new connectBD();

$sql = "SELECT * FROM produto p LEFT JOIN
produto_detalhes d ON d.produto_codigo = p.codigo  
inner JOIN empresa e ON e.id = d.empresa_id
WHERE e.codigochb = '{$codigoEmpresa}'
AND d.sincronizado='N' AND p.status='1';";

$connect->set('sql',$sql);
$connect->conectar();
$result = $connect->execute();
$arrayDados=array();
if(mysqli_num_rows($result)>0){
	while($dados = mysqli_fetch_assoc($result)){
array_push($arrayDados, $dados);
	}
	header('Content-Type: application/json');
	$json = json_encode($arrayDados,JSON_PRETTY_PRINT);
	return $json;
}

}

function setStatusOk($codigo,$empresaId){
	$connect = new connectBD();
	$sql="UPDATE produto_detalhes set sincronizado='S' where produto_codigo='{$codigo}' and empresa_id='{$empresaId}'";
	$connect->conectar();
	$connect->set("sql",$sql);
	$connect->execute();
}

 