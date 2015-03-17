<?php 
//cliente SOAP
include("nusoap/nusoap.php");
include("variaveis.php");


$cliente = new nusoap_client($urnServidor);

$parametros = array('codigoEmpresa'=>$IdEmpresaWeb);

$resultado = $cliente->call("getProdutos",$parametros);

$json=utf8_encode($resultado);


$produto = json_decode($json);

	if($produto!=null){
	 

 		foreach($produto as $p){

		$arrayPrincipioAtivo = array("descricao"=>$p->descricao,"codigo"=>$p->codigo.$p->dv);
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
 			if(inserirProdutoChb($arrayDados,$arrayPrincipioAtivo)){ 
 				//caso o produto tenha sido inserido no bd postgres com sucesso
 				//ele altera o status do cadastro do produto na WEB
 				echo "produto: ".$p->codigo.$p->dv." inserido em: ".date("d/m/Y H:i:s");
 					$arrayAtualizarStatus = array("idEmpresa"=>$p->empresa_id,"codigoProduto"=>$p->codigo);
 					$cliente->call("setStatusOk",$arrayAtualizarStatus);

 			}else if(atualizarProduto($arrayDados,$arrayPrincipioAtivo)){
 				echo "produto: ".$p->codigo.$p->dv." Atualizado em: ".date("d/m/Y H:i:s");
 					$arrayAtualizarStatus = array("idEmpresa"=>$p->empresa_id,"codigoProduto"=>$p->codigo);
 					$cliente->call("setStatusOk",$arrayAtualizarStatus);
 			}else{
 				echo "erro <br>";
 			}
 		}
 	}else{
 			//echo "Nenhum Resultado Encontrado: ".date("d/m/Y H:i:s")."\n"; ;
 		 }


 function inserirProdutoChb($arrayInserir,$arrayPrincipioAtivo){
  include("conexaoBD.php");

	$sqlInsertPrincipioAtivo = "INSERT INTO co40t VALUES(:codigo,:descricao)";
 	$sqlChb='INSERT into co13t 
 	(co13codpro,co13descri,co13desc01,co13desc02,co13codpri,co13tippro,
 	 co13bloq,co13dtacad,co13nbm,co13codmar,co13undcom,co13undcon,co13c_cust,
	 co13grupo,co13ordpro,co13codent,co13emp06) 
VALUES (:codproduto, :descricao, :compl1, :compl2, :princAtivo, :tipoProduto, 
 	 :bloqueado, :dtCadastro,:ncm,:marca,:unidCompra,:unidConsumo, :ccusto,
	 :grupo, :ordproducao, :opEntrada, :empresaChb)';
	
	$stm = $conexao->prepare($sqlChb);
	$insert = $stm->execute($arrayInserir) ;
	$stm2 = $conexao->prepare($sqlInsertPrincipioAtivo);
	$stm2->execute($arrayPrincipioAtivo);
 return $insert;

}

function atualizarProduto($arrayUpdate,$arrayPrincipioAtivo){
 include("conexaoBD.php");
 
 $sqlUpdatePrincAtivo = "UPDATE co40t set co40despri=:descricao where co40codpri=:codigo";
	$sqlUpdate = "UPDATE co13t set  co13descri=:descricao, 
				 co13desc01=:compl1,co13desc02=:compl2, 
				 co13codpri=:princAtivo, co13tippro=:tipoProduto, co13bloq= :bloqueado, 
				 co13dtacad=:dtCadastro, co13nbm=:ncm, co13codmar=:marca, co13undcom=:unidCompra, 
				 co13undcon=:unidConsumo, co13c_cust=:ccusto, co13grupo=:grupo, 
				 co13ordpro=:ordproducao, co13codent=:opEntrada 
				 WHERE co13codpro=:codproduto and co13emp06=:empresaChb";

	$stm = $conexao->prepare($sqlUpdate);
 	$update = $stm->execute($arrayUpdate);

 	$stm2 = $conexao->prepare($sqlUpdatePrincAtivo);
 	$stm2->execute($arrayPrincipioAtivo);
 return $update;
	
}