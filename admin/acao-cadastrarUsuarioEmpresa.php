<?php include("../_inc/config.php");


$empresa = $_POST['idEmpresa'];
$idUsuario = $_POST['idUsuario'];
 
	$sqlEmpresa = "INSERT INTO usuario_empresa (usuario_id,empresa_id) values('{$idUsuario}','$empresa')";
	mysqli_query($conexao,$sqlEmpresa) or die(mysqli_error());
	$response = array("success"=>true);
 
echo json_encode($response);