<?php require_once("verifica-login-adm.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	
<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
	<!-- <link rel="stylesheet" href="../css/normalize.css"> -->
	<link rel="stylesheet" href="css/admin.css">


	<!-- Latest compiled and minified JavaScript -->
	<script src="../js/jquery-2.1.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
  	<script src="../js/moment.js"></script>
  	<script src="../js/scripts-admin.js"></script>
	<script src="../js/jquery.inputmask.js"></script>
	<script src="../js/formatarInput.js"></script>

	<title>
		ADMIN  Sistema de integração de Produtos - Centralizado
	</title>
 
</head>
	
<body>	
<div class="page-header">
  <h1>Painel Administrativo -  Cadastros</h1> <small>Gerenciar as opções de cadastros de Produtos de todo o sistema, Adicionar, Alterar, Excluir etc..</small>
 
  <nav class="navbar navbar-default">
  <div class="container-fluid">
  		<div class="navbar-btn pull-right">
  			<button id="btPesquisarProduto" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Pesquisar Produtos Cadastrados" data-placement="bottom">
					 <span class="glyphicon glyphicon-file"></span>
					  <span class="glyphicon glyphicon-search"></span>
				</button>
  		<div class="btn-group">

  	
  			<button class="btn btn-sm btn-success" id="btAtualizar" type="button" data-toggle="tooltip" data-placement="bottom" title="Atualizar">
					  <span class="glyphicon glyphicon-refresh"></span>
			</button>
  			<button type="btn" id="btSolicitacoesPendentes" class="btn btn-sm  alert-warning"> Pendentes    <span class="badge btn-danger" id="contadorSolicitacoesPendentes">0</span></button>  		
  			<button type="btn" id="btSolicitacoesEmAndamento" class="btn btn-sm  alert-info">   Em Andamento <span class="badge btn-primary " id="contadorSolicitacoesEmAndamento">0</span></button>  		
  			<button type="btn" id="btSolicitacoesFinalizadas" class="btn btn-sm  alert-success">Finalizadas  <span class="badge btn-success" id="contadorSolicitacoesFinalizadas">0</span></button> 
  			<button type="btn" id="btSolicitacoesRecusadas" class="btn btn-sm  btn-default">Recusadas    <span class="badge " id="contadorSolicitacoesRecusadas">0</span></button>  		
  		</div>
    	
 			<a href="../index.php" class="btn btn-sm btn-danger">Sair <span class="glyphicon glyphicon-log-out"></span></a>
 		</div>

      

	</div>
	</nav>
  </div>
 			

 <div class="page-content">