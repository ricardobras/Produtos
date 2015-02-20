<?php require_once("_inc/config.php");
	  require_once("verifica-login.php");

$modoExibicao=$_POST['modoExibicao'];
$usuarioID=$_SESSION['UsuarioId'];
$valorBusca=$_POST['campoBusca'];

if($modoExibicao=="todas"){
	$jsonSolicitacao=[];
//listar todas as solicitações vinculadas aquele usuário
	  
		
		$sqlSelect = "Select * from solicitacao where usuario_id='{$usuarioID}' and status in(0,1) order by status asc, importancia desc,dt_solicitacao asc";

		$resultado=mysqli_query($conexao,$sqlSelect);

 
		if(mysqli_num_rows($resultado)>0){

			while($solicitacao=mysqli_fetch_assoc($resultado)){
				array_push($jsonSolicitacao,$solicitacao);
			}

		}
}else if($modoExibicao=="busca"  && $valorBusca!=""){
$jsonSolicitacao=[];

//listar todas as solicitações vinculadas aquele usuário

		$sqlSelectBusca = "Select * from solicitacao where usuario_id='{$usuarioID}'  order by status asc, importancia desc,dt_solicitacao asc";

		$resultadoBusca=mysqli_query($conexao,$sqlSelectBusca);

	
		if(mysqli_num_rows($resultadoBusca)>0){

			while($solicitacaoBusca=mysqli_fetch_assoc($resultadoBusca)){
					if(strrpos(strtoupper($solicitacaoBusca['descricao']), strtoupper($valorBusca))!==false){
							array_push($jsonSolicitacao,$solicitacaoBusca);}
					else if(strrpos(strtoupper($solicitacaoBusca['referencia']), strtoupper($valorBusca))!==false){
							array_push($jsonSolicitacao,$solicitacaoBusca);
						}

					else if(strrpos(strtoupper($solicitacaoBusca['marca']), strtoupper($valorBusca))!==false){
							array_push($jsonSolicitacao,$solicitacaoBusca);
						}
					else if(strrpos(strtoupper($solicitacaoBusca['aplicacao']), strtoupper($valorBusca))!==false){
							array_push($jsonSolicitacao,$solicitacaoBusca);
						}
					else if(strrpos(strtoupper($solicitacaoBusca['observacao']), strtoupper($valorBusca))!==false){
							array_push($jsonSolicitacao,$solicitacaoBusca);
						}
					else if(strrpos(strtoupper($solicitacaoBusca['grupo']), strtoupper($valorBusca))!==false){
							array_push($jsonSolicitacao,$solicitacaoBusca);
						}
					else if(strrpos(strtoupper($solicitacaoBusca['ccusto']), strtoupper($valorBusca))!==false){
							array_push($jsonSolicitacao,$solicitacaoBusca);
						}
					else if(strrpos(strtoupper($solicitacaoBusca['dt_solicitacao']), strtoupper($valorBusca))!==false){
							array_push($jsonSolicitacao,$solicitacaoBusca);
						}

			}

		}
}

echo json_encode($jsonSolicitacao);