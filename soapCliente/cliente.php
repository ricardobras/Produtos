<?php  require_once("variaveis.php");
	   require_once("conexaoBD.php");
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
//funções de banco de dados
 
$client = new SoapClient(null,array(
	"location"=>$var_url_location_soap,
	"uri"=>$var_uri_soap,
	"trace"=>1));

$result = $client->getProdutos($empresaId);

if(is_soap_fault($result)){
	trigger_error("SOAP Fault: (faultcode: {$result->faultcode}),
							faultstring: {$result->faultstring}",E_ERROR);
}
else{
	
	$produto = json_decode($result);
	//echo $result;
	if($produto!=null){
	 

 		foreach($produto as $p){
 		$arrayDados=array('codproduto'=>$p->codigo.$p->dv
							,'descricao'=>$p->descricao
							,'compl1'=>$p->compl1
							,'compl2'=>$p->compl2
							,'princAtivo'=>$p->princ_ativo
							,'tipoProduto'=>$p->tp_prod
							,'bloqueado'=>$p->bloqueado
							,'dtCadastro'=>$p->dt_cadastro
							,'ncm'=>$p->ncm_codigo
							,'marca'=>$p->marca_codigo
							,'unidCompra'=>$p->unidCompras
							,'unidConsumo'=>$p->unidConsumo
							,'ccusto'=>$p->ccusto
							,'grupo'=>$p->grupo
							,'ordproducao'=>$p->ordproducao
							,'opEntrada'=>$p->opentrada
							,'empresaChb'=>$p->codigochb);

 		//********* Só altera o status se o produto for inserido **********//
 			if(inserirProdutoChb($arrayDados)){ 
 				//caso o produto tenha sido inserido no bd postgres com sucesso
 				//ele altera o status do cadastro do produto na WEB
 				echo "produto: ".$p->codigo.$p->dv." inserido em: ".date("d/m/Y H:i:s");
 				$client->setStatusOk($p->codigo,$p->empresa_id);
 			}else if(atualizarProduto($arrayDados)){
 				echo "produto: ".$p->codigo.$p->dv." Atualizado em: ".date("d/m/Y H:i:s");
 				$client->setStatusOk($p->codigo,$p->empresa_id);
 			}else{
 				echo "erro <br>";
 			}
 		}
 	}else{
 			echo "Nenhum Resultado Encontrado: ".date("d/m/Y H:i:s")."\n"; ;
 		 }
}

 function inserirProdutoChb($arrayInserir){
  include("conexaoBD.php");


 	$sqlChb='INSERT into co13t 
 	(co13codpro,co13descri,co13desc01,co13desc02,co13codpri,co13tippro,
 	 co13bloq,co13dtacad,co13nbm,co13codmar,co13undcom,co13undcon,co13c_cust,
	 co13grupo,co13ordpro,co13codent,co13emp06) 
VALUES (:codproduto, :descricao, :compl1, :compl2, :princAtivo, :tipoProduto, 
 	 :bloqueado, :dtCadastro,:ncm,:marca,:unidCompra,:unidConsumo, :ccusto,
	 :grupo, :ordproducao, :opEntrada, :empresaChb)';

$stm = $conexao->prepare($sqlChb);
 


 return $stm->execute($arrayInserir) ;
	
}

function atualizarProduto($arrayUpdate){
 include("conexaoBD.php");
	$sqlUpdate = "UPDATE co13t set  co13descri=:descricao, 
				 co13desc01=:compl1,co13desc02=:compl2, 
				 co13codpri=:princAtivo, co13tippro=:tipoProduto, co13bloq= :bloqueado, 
				 co13dtacad=:dtCadastro, co13nbm=:ncm, co13codmar=:marca, co13undcom=:unidCompra, 
				 co13undcon=:unidConsumo, co13c_cust=:ccusto, co13grupo=:grupo, 
				 co13ordpro=:ordproducao, co13codent=:opEntrada, co13emp06=:empresaChb 
				 WHERE co13codpro=:codproduto";

	$stm = $conexao->prepare($sqlUpdate);
 


 return $stm->execute($arrayUpdate) ;
	
}