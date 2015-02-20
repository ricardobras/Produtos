<?php  
//DEFINIR O LOCAL DO TIMEZONE ( BRASIL)
date_default_timezone_set('America/Sao_Paulo');

//INCLUINDO AS DEPENDENCIAS
	  require_once("Produto.php"); 
	  require_once("DAO-Produto.php"); 
 	  require_once("DAO-Solicitacao.php");
 	  require_once("ProdutoDetalhes.php"); 
 	  require_once("DAO-ProdutoDetalhes.php"); 
//VERIFICA O PARAMETRO RECEBIDO VIA WEB
//DE ACORDO COM O PARAMETRO, UM MÉTODO É EXECUTADO
 
$acao = $_POST['acao'];
$daoProduto = new ProdutoDao();
$daoSolicitacao = new SolicitacaoDao();
$arrayJson=array();

$usuarioCadastro = $_SESSION['UsuarioId']; 	

if($acao=="gerarId"){

	//PEGA O NOME DO USUÁRIO LOGADO VIA SESSION
	//PEGA O ID DA SOLICITACAO VIA PARAMETRO
	$idSolWeb = $_POST['idsolicitacao']; 	

	$produto = new Produto();

	$produto->setUserCadastro($usuarioCadastro);
	$produto->setIdSolicitacaoWeb($idSolWeb);
	$produto->setDtVal(date("Y/m/d H:i:s"));
	$produto->setDtCadastro(date("Y/m/d H:i:s"));
	$produto->setDtInt(date("Y/m/d H:i:s"));
	

		//verificar a existencia de um produto jacadastrado para a solicitação
		$p=json_decode($daoProduto->buscarPorSolicitacao($idSolWeb));
		if($p->codigo==0){
			$daoProduto->insert($produto); 							//gera um novo produto a ser cadastrado no BD
			array_push($arrayJson, array("codigo"=>$produto->getCodigo()));
			$daoSolicitacao->updateStatus($idSolWeb,1); 			//altera o status da solicitação para (1 = Em andamento)
		}else{
			array_push($arrayJson, array("codigo"=>$p->codigo)); 						//SE JA HOUVER O REGISTRO, RETORNE 0 (ZERO)
		}
	
	echo json_encode( $arrayJson,JSON_PRETTY_PRINT);

}
else if($acao=="update")
{

//CODIGO DO PRODUTO RECEBIDO VIA PARAMETRO
	$codigo = $_POST['codigo'];
	$dv = (int) $_POST['digitoVerificador'];
	$descricao = $_POST['descricao'];
	$compl1 = $_POST['complemento1'];
  	$compl2 = $_POST['complemento2'];
  	$ncm = $_POST['codigoNcm'];
  	$tipoProduto = $_POST['tipoProduto'];
 
 	$produto2 = new Produto(); //instancia um novo produto

 	$produto2->setUserCadastro($usuarioCadastro);
	$produto2->setDv($dv);
	$produto2->setCodigo($codigo);
	$produto2->setDv($dv);
	$produto2->setDescricao($descricao);
	$produto2->setCompl1($compl1);
	$produto2->setCompl2($compl2);
	$produto2->setPrinc_ativo($codigo.$dv);
	$produto2->setTp_prod($tipoProduto);
	$produto2->setCodNcm($ncm);
	$produto2->setCodMarca(0);

	$produto2->setDtVal(date("Y/m/d H:i:s"));
	$produto2->setDtCadastro(date("Y/m/d H:i:s"));
	$produto2->setDtInt(date("Y/m/d H:i:s"));
 	
 	
$retorno = $daoProduto->update($produto2);
array_push($arrayJson, array("retorno"=>$retorno)); 	
echo json_encode($arrayJson);


}else if($acao=="buscar"){
	//PEGA O ID DA SOLICITACAO VIA PARAMETRO	
	$idSolWeb = $_POST['idsolicitacao']; 	
	
	echo $daoProduto->buscarPorSolicitacao($idSolWeb); //retorna o produto localizado 

}else if($acao=="insertProdutoDetalhes"){

//inserir os detalhes de cada empresa cadastrada no banco de dados
$daoDet = new ProdutoDetalhesDao();
$det = new ProdutoDetalhes();

$det->set("codEmpresa",$_POST['codEmpresaDetalhes']);
$det->set("codProduto",$_POST['codProdutoDetalhes']);
$det->set("unidCompras",$_POST['unidComprasDetalhes']);
$det->set("unidConsumo",$_POST['unidConsumoDetalhes']);
$det->set("ccusto",$_POST['ccustoDetalhes']);
$det->set("grupo",$_POST['grupoDetalhes']);
$det->set("ordProducao",$_POST['ordProducaoDetalhes']);
$det->set("opEntrada",$_POST['opEntradaDetalhes']);
$retorno = $daoDet->insert($det);//inserindo
if($retorno==1){
	$retorno="ok";
}	
 array_push($arrayJson, array("retorno"=>$retorno)); 	
echo json_encode($arrayJson);

}else if($acao=="buscarProdutoDetalhes"){
  
 	$empresa=$_POST['codEmpresa'];
	$codigoProduto=$_POST['codProduto'];
	$daoProdutoDetalhes = new ProdutoDetalhesDao();
	$det = new ProdutoDetalhes();

	$result = $daoProdutoDetalhes->getProdutoDetalhes($empresa,$codigoProduto);
 
	echo $result;
}else if($acao=="buscarProdutoSolicitacao"){
	$codigoSol=$_POST['idsolicitacao'];
	$daoProduto = new ProdutoDao();
	$json = $daoProduto->buscarPorSolicitacao($codigoSol);
	echo $json;
}