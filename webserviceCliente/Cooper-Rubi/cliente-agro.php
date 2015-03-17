<?php 
//cliente SOAP
include("nusoap/nusoap.php");
include("variaveis.php");


/**INSTRUÇÕES DE CONFIGURAÇÃO DA SINCRONIZAÇÃO *********
-----------------------------------------------------------------------------------
	Antes de realizar qualquer mudança, devemos verificar o arquivo de variaveis.php, 
	que contém as variáveis para definir a empresa, servidor, etc...
-----------------------------------------------------------------------------------
_______________________________________________
--- > depois alterar os seguintes locais: 

	1- Alterar a variavel $IdEmpresaWeb
	2-Alterar o codigo do comprador
	3-Alterar a empresa do fornecedor

**/
$cliente = new nusoap_client($urnServidor);

$parametros = array('codigoEmpresa'=>$IdEmpresaWebAgro); //ALTERAR A EMPRESA

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
							,'empresaChb'=>$p->codigochb
							,'empresaCCusto'=>$p->codigochb
							,'empresaGrupo'=>$p->codigochb
							,'tipoConversao'=>'S' //TIPO DE CONVERSÃO (S=SEM CONVERSÃO)
							,'codComprador'=>'1' //VARIA POR EMPRESA
							,'empresaFornecedor'=>$p->codigochb //na base CRV = 1, na COOPER cada um tem a sua
							,'descricaoCompleta'=>$p->descricao." ".$p->compl1." ".$p->compl2
							);

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
	 co13grupo,co13ordpro,co13codent,co13emp06,co13emp01,co13emp06a,co13tipcal,
	 co13codcom,co13empfor,co13dtinse,co13empgra,co13descrx) 
VALUES (:codproduto, :descricao, :compl1, :compl2, :princAtivo, :tipoProduto, 
 	 :bloqueado, :dtCadastro,:ncm,:marca,:unidCompra,:unidConsumo, :ccusto,
	 :grupo, :ordproducao, :opEntrada, :empresaChb, :empresaCCusto, :empresaGrupo,
	 :tipoConversao, :codComprador, :empresaFornecedor,current_date,:empresaChb,:descricaoCompleta)';
	
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
				 co13ordpro=:ordproducao, co13codent=:opEntrada ,co13emp01=:empresaCCusto,co13emp06a=:empresaGrupo,
				 co13tipcal=:tipoConversao,	 co13codcom=:codComprador,co13empfor=:empresaFornecedor,
				 co13empgra=:empresaChb,co13descrx=:descricaoCompleta 
				 WHERE co13codpro=:codproduto and co13emp06=:empresaChb";

	$stm = $conexao->prepare($sqlUpdate);
 	$update = $stm->execute($arrayUpdate);

 	$stm2 = $conexao->prepare($sqlUpdatePrincAtivo);
 	$stm2->execute($arrayPrincipioAtivo);
 return $update;
	
}
