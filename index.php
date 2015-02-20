
<?php require_once("cabecalho.php") ?>
 
<div class="msg loading  hide"></div>
 
		<table class="table table-stripped table-responsive table-condensed table-hover" >
			<thead>
				<tr>
          <th></th>
          <th></th>
          <th >Dt.Solicitação</th>
					<th >Emp.</th>
          <th >Cod.CHB</th>
					<th >Descrição</th>
					<th >UND</th>
					<th>Referência</th>
					<th>Marca</th>
					<th>C.Custo</th>
					<th>Grupo</th>
					<th>Ord.Prod</th>
					<th>Aplicação</th>
					<th>Obs</th>
	    
				</tr>
			</thead>
			<tbody class="corpoTabela">

			</tbody>
		</table>
 




<!-- Modal Solicitação -->

	

<!-- Modal cadastro de usuario -->
<div class="modal fade" id="modalSolicitacaoCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">NOVA SOLICITAÇÃO | Cadastro de Produto</h4>
      </div>
      <div class="modal-body">
    
  <form id="formSolicitacao" class="form-horizontal">
 
      	<table>
      	<thead>
	      	<tr>
		      	<th></th>
		      	<th></th>
		      	<th></th>
		      	<th></th>
		      	<th></th>
	      	</tr>
      	</thead><tbody>
      	<tr><td><label for="empresa">Empresa:</label></td></tr>
      	<tr>
      	<td colspan="5">
    
	      
		      <Select class="form-control" name="empresa" id="empresaUsuario">
		
		      </Select>
		 
      	</td>
      		<tr>
      		
      			<td colspan="3" style="width:350px">
      				<label for="descricao">Descrição </label>
      			</td>

      			<td>
      				<label for="und">UND</label>
      			</td>
      		</tr>
      		<tr>
     
      			<td colspan="3">
		      		<input type="text" id="descricao" name="descricao" placeHolder="ex: CANETA BIC AZUL, ETC..." class="form-control input-sm" >      		 
      			<td>
	      			<input type="text" id="und" name="und" placeHolder="ex: PC" class="form-control input-sm" >
	      		</td>
  
      		</tr>
      		<tr>
      			<td><label for="referencia">Referência</label></td><td colspan="2"><label for="marca">Marca </label></td>
      		</tr>
      		<tr>
      			<td>
		      		<input type="text" id="referencia" name="referencia" placeHolder="" class="form-control input-sm" >
      			</td>
      			<td colspan="2" >
		      		<input type="text" style="width:100%" id="marca" name="marca" placeHolder="" class="form-control input-sm" >
      			</td>
      		</tr>
      		      		<tr>
      			<td><label for="ccusto">C.Custo</label></td><td><label for="grupo">Grupo</label></td>
      		</tr>
      		<tr>
      			<td>
		      		<input type="text" id="ccusto" name="ccusto" placeHolder="" class="form-control input-sm">
      			</td>
      			<td>
		      		<input type="text" id="grupo" name="grupo" placeHolder="" class="form-control input-sm" >
      			</td>
      		</tr>
      		<tr>
      			<td><label for="ordproducao">Ord. Produção</label></td><td><label for="aplicacao">Aplicação</label></td>
      		</tr>
      		<tr>
      		<td>
				<input type="text" id="ordproducao" name="ordproducao" placeHolder="" class="form-control input-sm" >
		 	</td>
      		<td >
	      		<input type="text" id="aplicacao" name="aplicacao" placeHolder="" class="form-control input-sm" >
	 		</td>
      		</tr>
      		<tr>
      			<td>
      				<label for="observacao">Observação</label>
      			</td> 
      		</tr>
      		<tr>
      			<td colspan="4">
		      		<textArea id="observacao" name="observacao" placeHolder="" class="form-control"></textArea>
      			</td>
      		</tr>
          <tr><td><label for="importancia">IMPORTÂNCIA</label></td></tr>
        <tr>
        <td colspan="5">
    
        
        
            <label class="alert alert-info" style="cursor:pointer"><input type="radio" name="importancia" value="0" checked="true"> Baixa </label>
            <label class="alert alert-success" style="cursor:pointer"><input type="radio" name="importancia" value="1" > Normal </label>
            <label class="alert alert-warning" style="cursor:pointer"><input type="radio" name="importancia" value="2" > Alta </label>
            <label class="alert alert-danger" style="cursor:pointer"><input type="radio" name="importancia" value="3" > Urgente </label>
        
     
        </td>
      		<tbody>
      	</table>
 
 </form>
      <div class="alert msg hide" ></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btCancelar"  data-dismiss="modal" >Cancelar</button>
        <button type="button" type="submit" class="btn btn-primary" id="btSolicitacao">Solicitar Cadastro</button>
      </div>
    </div>
  </div>
</div>

	</body>
</html>