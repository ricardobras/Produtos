<?php require_once("verifica-login.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	
<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../css/normalize.css"> 
 <link rel="stylesheet" href="../css/botoes.css">

	<script src="../js/jquery-2.1.3.min.js"></script>

	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/moment.js"></script>
	<script src="../js/scripts-adm.js"></script>
	<script src="../js/jquery.inputmask.js"></script>
	<script src="../js/formatarInput.js"></script>

	
	
	

	<title>
		Sistema de integração de Produtos - Centralizado
	</title>
 
</head>
	
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">

    </div>
   <br>
   <a href="../logout.php" class="btn btn-danger navbar-right"  data-toggle="tooltip" data-placement="bottom" title="Sair do sistema">Sair <span class="glyphicon glyphicon-log-out"> </span></a>
   
   <form class="form-inline">
    <span><b class="text text-info">Nome: </b><?php echo $_SESSION['UsuarioNome']; ?></span><span><b class="text text-info">  E-mail: </b><?php echo $_SESSION['UsuarioEmail']; ?></span><br> 
    <span><b class="text text-info">Departamento: </b><?php echo $_SESSION['UsuarioDepartamento']; ?></span><br>
    
 
   </form>

	<div class="legenda prioridades">
 
 
   </div><br>
  </div>
</nav>