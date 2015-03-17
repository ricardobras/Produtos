<?php require_once("../_inc/config.php");
      require_once("verifica-login-adm.php"); 

	$jsonSolicitacao=array();




//listar todas as solicitações vinculadas aquele usuário

	
		$sqlSelect = "SELECT status,count(idsolicitacao) as total FROM solicitacao group by status";

		$resultado=mysqli_query($conexao,$sqlSelect);

		if(mysqli_num_rows($resultado)>0){
			while($solicitacao=mysqli_fetch_assoc($resultado)){
				array_push($jsonSolicitacao,$solicitacao);
			}
		}
	

echo json_encode($jsonSolicitacao);