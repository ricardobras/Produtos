<?php require_once("../_inc/connectBD.php");
    require_once("verifica-login-adm.php");
		 
	
class ProdutoDao{
 
function insert($produto){
 $connect = new connectBD();
 $connect->conectar();
 
 $sqlInsert = "INSERT INTO produto(descricao,compl1,compl2,princ_ativo,tp_prod,bloqueado,citricidade,user_cadastro,user_val,user_int,ncm_codigo,marca_codigo,idsolicitacaoweb,status,dt_cadastro)  VALUES ('{$produto->getDescricao()}','{$produto->getCompl1()}','{$produto->getCompl2()}','{$produto->getPrinc_ativo()}', 	'{$produto->getTp_prod()}','{$produto->getBloqueado()}','{$produto->getCitricidade()}','{$produto->getUserCadastro()}','{$produto->getUserVal()}', 	'{$produto->getUserInt()}','{$produto->getCodNcm()}','{$produto->getCodMarca()}','{$produto->getIdSolicitacaoWeb()}','{$produto->getStatus()}','{$produto->getDtCadastro()}');";	
 $connect->set("sql",$sqlInsert);

	if($connect->execute()){ //se a execução for correta, ele continua e retorna o codigo do novo registro
							  //ele retorna o json com o código
		$codigo = mysqli_insert_id($connect->get('conexao'));
	 
		$produto->setCodigo($codigo); 	

		return json_encode("{".$produto->getCodigo()."}");
	}else{
		return false;
	}

}


//VERIFICAR A EXISTENCIA DE UM PRODUTO JA CADASTRADO PARA ESSA SOLICITAÇÃO
function buscarPorSolicitacao($id){
	$connect = new connectBD();//pega a classe de conexao
	$connect->conectar();//conecta ao bd

	$sql = "SELECT * FROM produto WHERE idsolicitacaoweb='{$id}';"; //sql de pesquisa
	
	$connect->set("sql",$sql); //passa o sql como parametro para execute a pesquisa
	$result=$connect->execute(); //executa o sql na base de dados


	if(mysqli_num_rows($result)>0){
		$prod = mysqli_fetch_assoc($result);
		$json = json_encode($prod);
	}else{
		$prod='{"codigo":0}';
		$json = $prod;
	}
		return $json;
 
}


function buscarPorCodigo($id){
	$connect = new connectBD();
	$connect->conectar();

	$sql = "SELECT * FROM produto WHERE codigo='{$id}';";
	
	$connect->set("sql",$sql);
	$result=$connect->execute();
	if(mysqli_num_rows($result)>0){
		$prod = mysqli_fetch_assoc($result);
		$json = json_encode($prod);
	}else{
		$prod='{"codigo":0}';
		$json = $prod;
	}
		return $json;
 
}


function buscar($val){
	$connect = new connectBD();
	$connect->conectar();

	$sql = "SELECT * FROM produto WHERE codigo='{$val}' OR descricao like '%{$val}%';";
	
	$connect->set("sql",$sql);
	$result=$connect->execute();
	if(mysqli_num_rows($result)>0){
		$prod = mysqli_fetch_assoc($result);
		$json = json_encode($prod);
	}else{
		$prod='{"codigo":0}';
		$json = $prod;
	}
		return $json;
 
}

function update(Produto $produto){
$connect2 = new connectBD();
$sqlUpdate2 = "UPDATE produto SET dv='{$produto->getDv()}', 
descricao = '{$produto->getDescricao()}', 
compl1 = '{$produto->getCompl1()}', 
compl2 = '{$produto->getCompl2()}', 
princ_ativo = '{$produto->getPrinc_ativo()}',
tp_prod = '{$produto->getTp_prod()}',
bloqueado = '{$produto->getBloqueado()}',
user_cadastro = '{$produto->getUserCadastro()}',
dt_cadastro = '{$produto->getDtCadastro()}',
user_val = '{$produto->getUserVal()}',
dt_val = '{$produto->getDtVal()}',
user_int = '{$produto->getUserInt()}',
dt_int = '{$produto->getDtInt()}',
ncm_codigo = '{$produto->getCodNcm()}',
marca_codigo = '{$produto->getCodMarca()}',
status = '{$produto->getStatus()}'  WHERE codigo='{$produto->getCodigo()}';";


$connect2->conectar();
$connect2->set("sql",$sqlUpdate2);
return $connect2->execute();
}

function updateStatus(Produto $produto){
	$connect = new connectBD();
	$sqlUpdate = "UPDATE produto SET status='{$produto->getStatus()}' WHERE codigo='{$produto->getCodigo()}';";
	$connect->conectar();
	$connect->set("sql",$sqlUpdate);
return $connect->execute();
}

}