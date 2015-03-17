<?php  include("../nusoap/nusoap.php");


//criar a instancia do servidor
$server = new nusoap_server();
$server->configureWSDL("urn:Servidor");
$server->wsdl->schemaTargetNamespace = 'urn:Servidor';



function getProdutos($codigoEmpresa){ 
	include("../_inc/connectBD.php");
$connect = new connectBD();

$sql = "SELECT * FROM produto p LEFT JOIN
produto_detalhes d ON d.produto_codigo = p.codigo  
inner JOIN empresa e ON e.id = d.empresa_id
WHERE e.id = '{$codigoEmpresa}'
AND d.sincronizado='N' AND p.status='1';";

$connect->set('sql',$sql);
$connect->conectar();
$result = $connect->execute();
$arrayDados=array();
if(mysqli_num_rows($result)>0){
	while($linha = mysqli_fetch_assoc($result)){
	array_push($arrayDados, $linha);
	}
	
	$json = json_encode($arrayDados);
	return $json;
}

}

function setStatusOk($idEmpresa,$codigoProduto){
include("../_inc/connectBD.php");
	$connect = new connectBD();
	$sql="UPDATE produto_detalhes set sincronizado='S' where produto_codigo='{$codigoProduto}' and empresa_id='{$idEmpresa}'";
	$connect->conectar();
	$connect->set("sql",$sql);
	$connect->execute();
	$retorno = array("status"=>"atualizado");
	return $json_encode($retorno,JSON_PRETTY_PRINT);
}


$server->register('getProdutos',
		array('codigoEmpresa'=>'xsd:int'),
		array('return'=>'xsd:string'),
		'urn:Servidor.produtos',
		'urn:Servidor.produtos',
		'rpc',
		'encoded',
		'Comunicação SOAP para sincronizar os produtos entre CHB e Cadastro Web'

	);

$server->register('setStatusOk',
		array('idEmpresa'=>'xsd:int','codigoProduto'=>'xsd:int'),
		array('retorno'=>'xsd:string'),
		'urn:Servidor.statusOk',
		'urn:Servidor.statusOk',
		'rpc',
		'encoded',
		'Usado para definir o status do produto, após ser recebido pelo cliente'

	);
//criando e verificando a variavel de comunicação de servidor
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//adicionando a variavel ao servidor soap
$server->service($HTTP_RAW_POST_DATA);
