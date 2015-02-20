<?php include("_inc/config.php");
	  require_once("verifica-login.php");

$usuarioID=$_SESSION['UsuarioId'];
$sql = "Select * from usuario_empresa where usuario_id='{$usuarioID}'";

$resultado = mysqli_query($conexao,$sql);


$arrayJson=[];
if(mysqli_num_rows($resultado)>0){

	while($empresaUsuario = mysqli_fetch_assoc($resultado)){
		$empresaId = $empresaUsuario['empresa_id'];
		$sqlEmpresa = "Select * from empresa where id='{$empresaId}'";
		$resultadoEmpresa = mysqli_query($conexao,$sqlEmpresa);
		
		while($empresa=mysqli_fetch_assoc($resultadoEmpresa)){
			array_push($arrayJson, array("id"=>$empresa['id'],"databaseChb"=>$empresa['databasechb'],"codigoChb"=>$empresa['codigochb'], "nome"=>$empresa['nome'],"servidor"=>$empresa['servidor'],"porta"=>$empresa['porta']));
		}
	}
}

echo json_encode($arrayJson);