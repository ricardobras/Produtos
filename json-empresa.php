<?php include("_inc/config.php");
	  require_once("verifica-login.php");

$sql = "Select * from empresa";

$resultado = mysqli_query($conexao,$sql);


$arrayJson=[];
if(mysqli_num_rows($resultado)>0){

	while($empresa = mysqli_fetch_assoc($resultado)){

		array_push($arrayJson, array("id"=>$empresa['id'],"databaseChb"=>$empresa['databasechb'],"codigoChb"=>$empresa['codigochb'], "nome"=>$empresa['nome'],"servidor"=>$empresa['servidor'],"porta"=>$empresa['porta']));
	}
}

echo json_encode($arrayJson);