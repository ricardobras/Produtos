<?php require_once("../_inc/config.php");
	  require_once("verifica-login-adm.php");

$usuarioID=$_GET['usuarioId'];
$sql = "SELECT * FROM usuario WHERE id='{$usuarioID}'";

$resultado = mysqli_query($conexao,$sql);


$arrayJson=array();
if(mysqli_num_rows($resultado)>0){

	while($linha = mysqli_fetch_assoc($resultado)){
		array_push($arrayJson, array("id"=>$linha['id'],"nome"=>$linha['nome'],"email"=>$linha['email'],"setor"=>$linha['setor'],"login"=>$linha['login']));
 
	}
}

echo json_encode($arrayJson);