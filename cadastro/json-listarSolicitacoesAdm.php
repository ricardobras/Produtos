<?php require_once("../_inc/config.php");
      require_once("verifica-login-adm.php"); 

 
$usuarioID=$_SESSION['UsuarioId'];
 
$status=$_POST['status'];
 
	$jsonSolicitacao=array();




//listar todas as solicitações vinculadas aquele usuário
	if($status=="todos"){
	
		$sqlSelect = "SELECT s.idsolicitacao,
						s.codigo,
						s.descricao,
						s.und,
						s.referencia,
						s.marca,
						s.ccusto,
						s.grupo,
						s.ordproducao,
						s.aplicacao,
						s.observacao,
						s.importancia,
						s.status,
						s.dt_solicitacao,
						s.empresa_id,
						e.nome as nomeEmpresa,
						s.usuario_id, 
						u.nome as nomeSolicitante

						 FROM solicitacao s 
							left join empresa e on s.empresa_id = e.id 
							left join usuario u on s.usuario_id  = u.id
							ORDER BY status ASC, importancia DESC,dt_solicitacao ASC";

		$resultado=mysqli_query($conexao,$sqlSelect);

		if(mysqli_num_rows($resultado)>0){
			while($solicitacao=mysqli_fetch_assoc($resultado)){
				array_push($jsonSolicitacao,$solicitacao);
			}
		}
	}else{
		$sqlSelect = "SELECT s.idsolicitacao,
						s.codigo,
						s.descricao,
						s.und,
						s.referencia,
						s.marca,
						s.ccusto,
						s.grupo,
						s.ordproducao,
						s.aplicacao,
						s.observacao,
						s.importancia,
						s.status,
						s.dt_solicitacao,
						s.empresa_id,
						e.nome as nomeEmpresa,
						s.usuario_id, 
						u.nome as nomeSolicitante

						 FROM solicitacao s 
							left join empresa e on s.empresa_id = e.id 
							left join usuario u on s.usuario_id  = u.id
						 WHERE  s.status='{$status}'
							ORDER BY status ASC, importancia DESC,dt_solicitacao ASC";

		$resultado=mysqli_query($conexao,$sqlSelect);

		if(mysqli_num_rows($resultado)>0){
			while($solicitacao=mysqli_fetch_assoc($resultado)){
				array_push($jsonSolicitacao,$solicitacao);
			}
		}
 	}

echo json_encode($jsonSolicitacao);