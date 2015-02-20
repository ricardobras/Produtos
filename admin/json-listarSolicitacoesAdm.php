<?php require_once("../_inc/config.php");
      require_once("verifica-login-adm.php"); 

 
$usuarioID=$_SESSION['UsuarioId'];
 
$status=$_POST['status'];
 
	$jsonSolicitacao=[];




//listar todas as solicitações vinculadas aquele usuário
	if($status=="todos"){
		$idSolicitacao = $_POST['id'];
		$sqlSelect = "Select * from solicitacao where idsolicitacao='{$idSolicitacao}'  order by status asc, importancia desc,dt_solicitacao asc";

		$resultado=mysqli_query($conexao,$sqlSelect);

		if(mysqli_num_rows($resultado)>0){
			while($solicitacao=mysqli_fetch_assoc($resultado)){
				array_push($jsonSolicitacao,$solicitacao);
			}
		}
	}else{
		$sqlSelect = "Select * from solicitacao where status='{$status}'  order by status asc, importancia desc,dt_solicitacao asc";

		$resultado=mysqli_query($conexao,$sqlSelect);

		if(mysqli_num_rows($resultado)>0){
			while($solicitacao=mysqli_fetch_assoc($resultado)){
				array_push($jsonSolicitacao,$solicitacao);
			}
		}
 	}

echo json_encode($jsonSolicitacao);