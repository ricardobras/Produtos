<?php require_once("../_inc/config.php");
      require_once("verifica-login-adm.php"); 

 
$usuarioID=$_SESSION['UsuarioId'];
 
$status=$_POST['status'];
 
	$jsonSolicitacao=array();




//listar todas as solicitações vinculadas aquele usuário
	if($status=="todos"){
		$idSolicitacao = $_POST['id'];
		$sqlSelect = "SELECT * FROM solicitacao WHERE idsolicitacao='{$idSolicitacao}'  ORDER BY status ASC, importancia DESC,dt_solicitacao ASC";

		$resultado=mysqli_query($conexao,$sqlSelect);

		if(mysqli_num_rows($resultado)>0){
			while($solicitacao=mysqli_fetch_assoc($resultado)){
				array_push($jsonSolicitacao,$solicitacao);
			}
		}
	}else{
		$sqlSelect = "SELECT * FROM solicitacao WHERE status='{$status}'  ORDER BY status ASC, importancia DESC,dt_solicitacao ASC";

		$resultado=mysqli_query($conexao,$sqlSelect);

		if(mysqli_num_rows($resultado)>0){
			while($solicitacao=mysqli_fetch_assoc($resultado)){
				array_push($jsonSolicitacao,$solicitacao);
			}
		}
 	}

echo json_encode($jsonSolicitacao);