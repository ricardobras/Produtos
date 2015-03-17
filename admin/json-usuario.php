<?php require_once("../_inc/config.php");
	  require_once("verifica-login.php");

$sql = "SELECT * FROM usuario";

$resultado = mysqli_query($conexao,$sql);


$arrayJson=array();
if(mysqli_num_rows($resultado)>0){

	while($linha = mysqli_fetch_assoc($resultado)){

		array_push($arrayJson, $linha);
	}
}

echo json_encode($arrayJson);