<!DOCTYPE html>
<html lang="en">

<head>
	
<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	

	<!-- Optional theme -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="../js/jquery-2.1.3.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/scripts-admin.js"></script>

	<link rel="stylesheet" href="../css/login.css">

	<title>
		Sistema de integração de Produtos - Centralizado
	</title>
		
</head>
	
<body>
 
<div class="panel panel-success" style="width:50%; padding:0px; display:block; margin:auto;">
<div class="panel-heading">
    <h3 class="panel-title">PAINEL - ADMINISTRATIVO</h3>
  </div>
  <div class="panel-body">
  


<div id="login" class="login">
<form  id="formLogin">
	<div class="text text-danger" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span class="sr-only">Error:</span>
   		Informe Seus dados para acesso 
	</div>

	<div>
		 
	</div>
     		<label>Nome de Usuario </label> <input type="text" name="login" id="login" class="form-control" placeholder="ex: Ricardo.Bras">
 		  	<Label>Senha </label> <input type="password" name="senha" id="senha" class="form-control" placeholder="senha">
   		  <br>
   			<div class="input-group">
    			<button type="submit" id="btLogin"  class="btn btn-success btn-lg right"><span class="glyphicon glyphicon-lock"></span> Entrar  </button> 
    		</div>

	 	</form>
    <div class="alert msg hide "></div><!-- Alert de login -->
	 </div>
  </div>
</div>

<!-- Modal cadastro de usuario -->
<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadastro de usuário</h4>
      </div>
      <div class="modal-body">
    
<form class="form-horizontal" id="cadUsuario">
		<label for="empresa" class="col-sm-2 control-label">Empresa</label>
    	<div class="col-sm-10">
	      <div class="form-group">
		      <Select class="form-control listboxEmpresa" id="empresa" name="empresa">
		     	  
		      </Select>
		  </div>
  	  </div>
  		<div class="form-group">
  			<label for="nome" class="col-sm-2 control-label">Nome</label>
    		<div class="col-sm-10">
      			<input type="text" id="nome" name="nome" placeHolder="ex: Ricardo Bras da Silva Neves" class="form-control">
      		</div>
      	</div>
  
      	<div class="form-group">
      		<label for="setor" class="col-sm-2 control-label">Setor</label>
    		<div class="col-sm-10">
      			<input type="text" id="setor" name="setor" placeHolder="ex: Tecnologia da Informação" class="form-control">
      		</div>
      	</div>

 		<div class="form-group">
 			<label for="ramal" class="col-sm-2 control-label">Ramal:</label>
    		<div class="col-sm-10">
 				<input type="text" id="ramal" name="ramal" placeHolder="ex: 6014" class="form-control">
 			</div>
 	    </div>
 	    <div class="form-group">
 	    	<label for="email" class="col-sm-2 control-label">E-mail:</label>
    		<div class="col-sm-10">
 	   			<input type="email" id="email" name="email" placeHolder="ex: ricardo@cooper-rubi.com.br" class="form-control">
 	   		</div>
    	</div>
        <div class="form-group">
          <label for="login" class="col-sm-2 control-label">Usuário</label>
          <div class="col-sm-10">
            <input type="text" id="login" name="login" placeHolder="Usuário de acesso ao sistema" class="form-control">
          </div>
        </div>
    	<div class="form-group">
    		<label for="senha" class="col-sm-2 control-label">Senha:</label>
    		<div class="col-sm-10">
    			<input type="password" id="senha" name="senha" placeHolder="Informe sua senha" class="form-control">
    		</div>
    	</div>
 <div class="alert alert-danger hide" id="error" role="alert">...</div>
  </form>

   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btSalvar">Salvar</button>
      </div>
    </div>
  </div>
</div>
 
	</body>
</html>