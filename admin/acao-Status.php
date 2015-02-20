<?php 	  
require_once("DAO-Produto.php"); 
require_once("Produto.php"); 
require_once("DAO-Solicitacao.php");

$acao = $_POST['acao'];
$codigo = $_POST['codigo'];
$status = $_POST['status'];
$json=array();

if($acao=="statusProduto")
{
	$daoProd = new ProdutoDao();
	$produto = new Produto();
	$produto->setCodigo($codigo);
	$produto->setStatus($status);

	if($daoProd->updateStatus($produto)){
		array_push($json, array("resultado"=>"ok"));
	}

}else if($acao=="statusSolicitacao"){
	$daoSol = new SolicitacaoDao();

	if($daoSol->updateStatus($codigo,$status)){
		array_push($json, array("resultado"=>"ok"));
	}
}


echo json_encode($json);