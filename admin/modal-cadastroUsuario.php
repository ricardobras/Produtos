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

      <div class="form-group">
        <label class="col-sm-2 control-label text-danger">Nivel de Acesso:</label>
          <div class="col-sm-10">
            <select class="form-control" name="nivelAcesso">
              <option value="Administrador">Administrador</option>
              <option value="Cadastro">Cadastro</option>
              <option value="Solicitante">Solicitante</option>
            </select>
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

<br>