<?php require_once("variaveis.php");
	  require_once("json/produto.php");

//criar a instancia do servidor
$server = new SoapServer(null, array('uri'=>'http://localhost/produtos/soap'));

//definicao do serviço
function getProdutos($empresa){
	$result = printJsonProdutoPorEmpresa($empresa);
	return $result;
}

//registrando o serviço
$server->addFunction("getProdutos");
$server->addFunction("setStatusOk");
//se o metoto de requisição for POST

if($_SERVER['REQUEST_METHOD']=="POST"){
		$server->handle();
}else{
	$functions = $server->getFunctions();
	foreach($functions as $func){
		print $func. "<br>";
	}
}
