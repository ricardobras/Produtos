<?php include("_inc/config.php");


$empresa = $_POST['empresa'];
$nome = $_POST['nome'];
$setor = $_POST['setor'];
$ramal = $_POST['ramal'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = md5($_POST['senha']);
$nivelAcesso="Solicitante";

$sqlValidarEmail = "SELECT * FROM usuario WHERE email='{$email}'";

$validacao = 0;

$result=mysqli_query($conexao,$sqlValidarEmail);

if(mysqli_num_rows($result) > 0){
	$response=array("erro"=>"E-mail já existe no sistema");
	$validacao=1;
} 


$sqlValidarUsuario = "Select * from usuario where login='{$login}'";
$resultUsuario = mysqli_query($conexao,$sqlValidarUsuario);

if(mysqli_num_rows($resultUsuario) > 0){
	$response=array("erro"=>"usuário já existe no sistema");
	$validacao=1;
}
 
if($validacao==0){
	$sql = "INSERT INTO usuario (nome,email,setor,ramal,login,senha,nivelAcesso) values ('{$nome}','{$email}','{$setor}','{$ramal}','{$login}','{$senha}','{$nivelAcesso}')";
	mysqli_query($conexao,$sql) or die(mysqli_error());

	$idUsuario = mysqli_insert_id($conexao);
	$sqlEmpresa = "INSERT INTO usuario_empresa (usuario_id,empresa_id) values('{$idUsuario}','$empresa')";
	mysqli_query($conexao,$sqlEmpresa) or die(mysqli_error());
	$response = array("success"=>true);

}

echo json_encode($response);