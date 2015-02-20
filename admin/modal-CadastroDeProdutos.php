

<!-- Modal Novo Produto -->
<div class="modal fade" id="modalNovoProduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadastrar | NOVO PRODUTO</h4>
      </div>
      <div class="modal-body">
    

<div id="divFormCadastroDeProduto"  class="form">

	<form class="form" id="formCadastroPadraoDeProduto">
  <input type="text" class="hidden" id="codSolicitacao" name="codSolicitacao">
  <input type="text" class="hidden" id="acao" name="acao" value="update"> <!-- campo usado para passar como parametro o filtro informando que é para fazer o update
                                                    -->
  <input type="text" class="digitoVerificador hidden" id="digitoVerificador" name="digitoVerificador" value="update">
 		<table  class="table table-striped table-responsive"   >
 			<tbody>
 				<tr>
 					<td width="20%"><label>Código</label></td>
 					<td width="25%">
 						<div class="input-group input-codigo">
 							<input id="codigo" name="codigo" type="text" class="form-control input-sm" autofocus> 							 
 							<div class="input-group-addon digitoVerificador"></span>

 						</div>
 					</td>
 					<td width="10%"><label>Descrição</label></td>
 					<th colspan="2"><input id="descricao" name="descricao" type="text" class="form-control input-sm input-descricao" placeholder=""></th>
 				 
 				</tr>

				<tr>
 					<td><label>Complemento 1</label></td>
 					<th colspan=4><input id="complemento1" name="complemento1" type="text" class="form-control input-sm input-descricao" placeholder=""></th>
 			 
 				</tr>
				<tr>
 					<td><label>Complemento 2</label></td>
 					<th colspan=4><input id="complemento2" name="complemento2" type="text" class="form-control input-sm input-descricao" placeholder=""></th>
 					 
 				</tr> 
 				<tr>
 					<td><label>NCM</label></td>
 					<td>
 						<div class="input-group input-codigo">
 							<input id="codigoNcm" name="codigoNcm"  type="text" class="form-control input-sm ncm">
							<div class="input-group-btn">
 								<button type="button" id="btBuscarNcm" data-toggle="tooltip" class="btn btn-sm alert-info"   title="Buscar NCM"><span class="glyphicon glyphicon-search"></span></button>
 								<!-- <button type="button" id="cadastrarBuscarNcm" data-toggle="tooltip"  class="btn btn-sm alert-success"  title="Cadastrar ncm" ><span class="glyphicon glyphicon-file"></span></button> -->
 							</div>
 						</div>
 					</td>
 					<th colspan=2>
 						<input id="descricaoNcm" name="descricaoNcm"  type="text" class="form-control  input-descricao input-sm" disabled="true" placeholder="">
 					</th>
 				
 				</tr> 	

 	
<!--
 				<tr>
 					<td><label>Principio Ativo</label></td>
 					<td>
 						<div class="input-group">
 							<input type="text" class="form-control input-sm ">
 							<div class="input-group-btn" >
 								<a href="#" class="btn btn-group btn-link btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar Princ. Ativo"><span class="glyphicon glyphicon-search"></span></a>
 							</div>
 						</div>

 					</td>
 					<td colspan="4"><input type="text" class="form-control input-sm input-descricao" disabled="true" placeholder=""></td>
 				</tr> 	-->

 				<tr>
 					<td><label>Tipo de Produto</label></td>
 					<td colspan="4">
 					 <select class="form-control" name="tipoProduto" id="tipoProduto">
 					 	<option value="00">00 - Merc. P/ Revenda</option>
 					 	<option value="01">01 - Materia Prima</option>
 					 	<option value="02">02 - Embalagem </option>
 					 	<option value="03">03 - Prod. em Processo </option>
 					 	<option value="04">04 - Produto Acabado</option>
 					 	<option value="05">05 - SubProduto</option>
 					 	<option value="06">06 - Prod. Intermediário</option>
 					 	<option value="07">07 - Mat. Uso e consumo</option>
 					 	<option value="08">08 - Ativo Imobilizado</option>
 					 	<option value="09">09 - Serviços</option>
 					 	<option value="10">10 - Outros Insumos</option>
 					 	<option value="99">99 - Outros</option>
 					 </select>

 					</td>
 			 
 				</tr>		
			</tbody>
 		</table>
	</form>

</div>	


  <center><button id="botaoExibirEmpresasReplicacao" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span> <br>Exibir Empresas para replicação </button>


<div id="botaoIndividualDeEmpresas"></div>

  <div class="msg"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-chevron-left"></span> Cancelar</button>
        <button type="button" class="btn btn-success" id="btSalvarProduto"><span class="glyphicon glyphicon-floppy-disk"></span> Finalizar cadastro</button>
      </div>
    </div>
  </div>
</div>