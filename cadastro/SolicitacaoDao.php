<?php  require_once("../_inc/connectBD.php");
       require_once("verifica-login-adm.php");

class SolicitacaoDao{


	function updateStatus($idsolicitacao,$novoStatus){
		$sql="UPDATE solicitacao SET status='{$novoStatus}' WHERE idsolicitacao='{$idsolicitacao}'";
		$connect = new connectBD();	//cria uma conexão
		$connect->conectar(); 		//conecta ao bd
		$connect->set("sql",$sql); 	//define o sql a ser executado
		return $connect->execute(); //executa o sql
	}
	function recusarSolicitacao($idsolicitacao,$comentario){
		$sql="INSERT INTO solicitacao_recusada (idSolicitacao,comentario) values('{$idsolicitacao}','{$comentario}');";
		$connect = new connectBD();	//cria uma conexão
		$connect->conectar(); 		//conecta ao bd
		$connect->set("sql",$sql); 	//define o sql a ser executado
		$this->updateStatus($idsolicitacao,3);
		$connect->execute(); //executa o sql	

	}

}