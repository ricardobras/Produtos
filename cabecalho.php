<?php require_once("verifica-login.php"); ?>
<?php $versao=1.1 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	
<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css?<?=$versao?>">

	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css?<?=$versao?>">
	<link rel="stylesheet" href="../css/normalize.css?<?=$versao?>"> 
 	<link rel="stylesheet" href="css/botoes.css?<?=$versao?>">

	<script src="js/jquery-2.1.3.min.js?<?=$versao?>">		 </script>		
	<script src="bootstrap/js/bootstrap.min.js?<?=$versao?>"></script>
	<script src="js/moment.js?<?=$versao?>">				 </script>
	<script src="js/scripts-solicitacao.js?<?=$versao?>">	 </script>
	<script src="js/jquery.inputmask.js?<?=$versao?>">		 </script>
	<script src="js/formatarInput.js?<?=$versao?>">			 </script>

	
	
	

	<title>
		Sistema de integração de Produtos - Centralizado
	</title>
 
</head>
	
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
     	<div class="navbar-brand">
      	  <img alt="Brand" src="images/user.png" width="40px" height="40px" >
		</div>
    </div>

   <a href="logout.php" class="btn btn-danger botao direita"  data-toggle="tooltip" data-placement="bottom" title="Sair do sistema">Sair <span class="glyphicon glyphicon-log-out"> </span></a>
   
   <form class="form-inline">
    <span><b class="text text-info">Nome: </b><?php echo $_SESSION['UsuarioNome']; ?></span><span><b class="text text-info">  E-mail: </b><?php echo $_SESSION['UsuarioEmail']; ?></span><br> 
    <span><b class="text text-info">Departamento: </b><?php echo $_SESSION['UsuarioDepartamento']; ?></span><br>
    
    <div class="input-group">
		<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalSolicitacaoCadastro">Solicitar Novo Cadastro <span class="glyphicon glyphicon-plus"></span> </button>
	</div>    
	<div class="input-group">
    	 <input type="text" class="form-control campoBusca" style="width:250px;" class="form-control" placeholder="Digite o que deseja buscar">
    	 <span class="input-group-addon">
      	  <i class="glyphicon glyphicon-search"></i> 
    	</span>
   	</div>
   </form>

	<div class="legenda prioridades">
	<fieldset>
	<legend>Legenda de Prioridades</legend>
	<ul>
	   <li class="alert alert-info" id="prioridadeBaixa">Baixa</li>
	   <li class="alert alert-success" id="prioridadeNormal">Normal</li>
	   <li class="alert alert-warning" id="prioridadeAlta">Alta</li>
	   <li class="alert alert-danger" id="prioridadeBUrgente">Urgente</li>
	</ul>
	</fieldset>
   </div><br>
  </div>
</nav>