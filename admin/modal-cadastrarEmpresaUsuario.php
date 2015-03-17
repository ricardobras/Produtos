
<!-- Modal cadastro de empresas do usuário -->
<div class="modal fade " id="modalCadastrarEmpresaUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadastrar empresa para o usuário</h4>
      </div>
      <div class="modal-body">
  <form id="formInserirEmpresaUsuario">

   <label for="usuario" class="control-label">Usuário</label>
   <Select class="form-control listboxUsuario" id="usuario" name="idUsuario"></Select>

<br>
		<label for="empresa" class="control-label">Empresa</label>
    <Select class="form-control listboxEmpresa" name="idEmpresa"></Select>

   
 <div class="alert alert-danger hide" id="error" role="alert">...</div>
  </form>

   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btInserirEmpresaUsuario">Inserir</button>
      </div>
    </div>
  </div>
</div>