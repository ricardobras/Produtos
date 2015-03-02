<?php require_once("variaveis.php");
	  require_once("json/produto.php");

//criar a instancia do servidor
$server = new SoapServer(null, array('uri'=>$var_url_soap_server));

//definicao do serviço
function getProdutos($empresa){
	$result = printJsonProdutoPorEmpresa($empresa);
	return $result;
}

//registrando o serviço
$server->addFunction("getProdutos");

//se o metoto de requisição for POST

if($_SERVER['REQUEST_METHOD']=="POST"){
		$server->handle();
}else{
	$functions = $server->getFunctions();
	foreach($functions as $func){
		print $func. "<br>";
	}
}
