<?php 	require_once("_inc/config.php");
		require_once("verifica-login.php");
		require_once("acao-enviarEmail.php");

$descricao=$_POST['descricao']; 
$und=$_POST['und']; 
$referencia=$_POST['referencia']; 
$marca_codigo=$_POST['marca']; 
$ccusto=$_POST['ccusto']; 
$grupo=$_POST['grupo']; 
$ordproducao=$_POST['ordproducao']; 
$aplicacao=$_POST['aplicacao']; 
$observacao=$_POST['observacao']; 
$importancia=$_POST['importancia']; 
$status=0;
$usuario_id=$_SESSION['UsuarioId'];
$empresa_id=$_POST['empresa']; 
$usuario_selecao="";
$nomeUsuarioLogado=$_SESSION['UsuarioNome'];
$emailUsuarioLogado=$_SESSION['UsuarioEmail'];
$data = date('j/m/y');
$sqlInsert="INSERT INTO solicitacao (descricao, und, referencia, marca, ccusto, grupo, ordproducao, aplicacao, observacao, importancia, status, usuario_id, empresa_id, usuario_selecao,dt_solicitacao) VALUES (upper('{$descricao}'), upper('{$und}'), upper('{$referencia}'), upper('{$marca_codigo}'), '{$ccusto}', '{$grupo}', '{$ordproducao}', '{$aplicacao}', '{$observacao}', '{$importancia}', '{$status}', '{$usuario_id}', '{$empresa_id}', '{$usuario_selecao}',NOW())"; 
$arrayJson=array();

//sql para exibir os usuarios que realizam cadastro
$sqlUsuariosCadastro="SELECT * FROM usuario WHERE nivelacesso='Cadastro' AND ativo='S'";

if(mysqli_query($conexao,$sqlInsert)){
	$resultUsuarioCadastro=mysqli_query($conexao,$sqlUsuariosCadastro);
	if($resultUsuarioCadastro){	
		//enviando e-mail para todos os usuarios que realizam cadastros
		while($usuarioCadastro=mysqli_fetch_assoc($resultUsuarioCadastro)){
			$nomeUsCadastro=$usuarioCadastro['nome'];
			$emailUsCadastro=$usuarioCadastro['email'];
			enviarEmail($nomeUsCadastro,$emailUsCadastro,"<span style='text-transform: uppercase;'>o Usuário: <b> '{$nomeUsuarioLogado}'</b><br>Acaba de solicitar o cadastramento do produto <b>'{$descricao}'</b> utilizando a plataforma WEB <br>Grau de Importância: <b>'{$importancia}'</b> <br>Data da Solicitação:'{$data}'</span>");
		}
		//enviar e-mail para o proprio usuário que solicitou o cadastro
		enviarEmail($nomeUsuarioLogado,$emailUsuarioLogado,"<span style='text-transform: uppercase;'>o Usuário: <b> '{$nomeUsuarioLogado}'</b><br>Acaba de solicitar o cadastramento do produto <b>'{$descricao}'</b> utilizando a plataforma WEB <br>Grau de Importância: <b>'{$importancia}'</b> <br>Data da Solicitação:'{$data}'</span>");
	}
	array_push($arrayJson,array("retorno"=>"true","msg"=>"Solicitação realizada com sucesso!\n Aguarde o retorno da equipe de cadastro!"));
}else{
	array_push($arrayJson,array("retorno"=>"false","msg"=>"Erro ao efetuar solicitação\n verifique se o cadastro já existe!"));
}

echo json_encode($arrayJson);