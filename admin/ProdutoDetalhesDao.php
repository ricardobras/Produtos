<?php require_once("../_inc/connectBD.php");
 	  require_once("verifica-login-adm.php");

class ProdutoDetalhesDao{

	function insert(ProdutoDetalhes $det){
	$sqlInsert="INSERT INTO produto_detalhes 
	(empresa_id,produto_codigo,unidCompras,unidConsumo,ccusto,grupo,ordproducao,opentrada) 
	VALUES ('{$det->get("codEmpresa")}','{$det->get("codProduto")}','{$det->get("unidCompras")}','{$det->get("unidConsumo")}','{$det->get("ccusto")}','{$det->get("grupo")}','{$det->get("ordProducao")}','{$det->get("opEntrada")}') 
	ON DUPLICATE KEY UPDATE empresa_id = '{$det->get("codEmpresa")}',produto_codigo='{$det->get("codProduto")}',unidCompras='{$det->get("unidCompras")}',
	unidConsumo='{$det->get("unidConsumo")}',ccusto='{$det->get("ccusto")}',grupo='{$det->get("grupo")}',ordproducao='{$det->get("ordProducao")}',opentrada='{$det->get("opEntrada")}', sincronizado='N'";
	$connect = new connectBD();
	$connect->conectar();
	$connect->set("sql",$sqlInsert);
	return $connect->execute();

	}

	function getProdutoDetalhes($idempresa,$idproduto){
		$json="";
		$sql = "SELECT * FROM produto_detalhes WHERE empresa_id='{$idempresa}' AND produto_codigo='{$idproduto}'";
		$connect = new connectBD();
		$connect->conectar();
		$connect->set("sql",$sql);
		$result = $connect->execute();

		if(mysqli_num_rows($result)>0){
			$det = mysqli_fetch_assoc($result);
			$json = json_encode($det);
		}
		return $json;
	}
}