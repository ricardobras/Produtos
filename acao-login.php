<?php require_once("_inc/config.php");

$login=$_POST['login'];
$senha=md5($_POST['senha']);
$sqlLogin = "SELECT * FROM usuario WHERE login='{$login}' AND senha='{$senha}'";

$result = mysqli_query($conexao,$sqlLogin);

 
if(mysqli_num_rows($result)>0){

	$loginDb = mysqli_fetch_assoc($result);
  
 		if (!isset($_SESSION)) session_start();//verifica a existencia de uma sessão, caso não, ele abre
		$_SESSION['UsuarioId']=$loginDb['id'];
		$_SESSION['UsuarioLogin']=$loginDb['login'];
		$_SESSION['UsuarioNivel']=$loginDb['nivelacesso'];
		$_SESSION['UsuarioNome']=$loginDb['nome'];
		$_SESSION['UsuarioEmail']=$loginDb['email'];
		$_SESSION['UsuarioDepartamento']=$loginDb['setor'];
	    $response = array("resposta"=>"sucesso");
	
}else{
		$response = array("resposta"=>"erro");
	}
echo json_encode($response);
