<?php  require_once("variaveis.php");

$client = new SoapClient(null,array(
	"location"=>$var_url_location_soap,
	"uri"=>$var_uri_soap,
	"trace"=>1));

$result = $client->getProdutos(1);

if(is_soap_fault($result)){
	trigger_error("SOAP Fault: (faultcode: {$result->faultcode}),
							faultstring: {$result->faultstring}",E_ERROR);
}
else{
	echo "Resultado Encontrado: <br><br>";
	$produto = json_decode($result);


}
