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

}