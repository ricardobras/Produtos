<?php require_once("verifica-login-adm.php"); //faz a validação se o usuário está logado como adm
$valorBusca = $_POST["busca"];



//CRIAR FUNCAO PARA REALIZAR BUSCA COM BASE NO SQL PASSADO VIA PARAMETRO

 function executarSql($sql){
 	require_once("../_inc/config.php"); //incluindo conexão do bd
 	$arrayJson=array();

	$resultado = mysqli_query($conexao,$sql);

	if(mysqli_num_rows($resultado)>0){
		while($dadosNcm = mysqli_fetch_assoc($resultado)){
			array_push($arrayJson,$dadosNcm);
		}
	}

	return $arrayJson;
}

 
//VERIFICA OS DADOS PASSADOS VIA PARAMETRO POST E REALIZA O FILTRO CASO NECESSÁRIO
	if($valorBusca=="todos"){
		$sql1="SELECT * FROM ncm";
		echo json_encode(executarSql($sql1));
	}else{
		$sql2="SELECT * FROM ncm WHERE codigo LIKE ('%{$valorBusca}%') OR descricao LIKE ('%{$valorBusca}%');";
	 	echo json_encode(executarSql($sql2));
	}
