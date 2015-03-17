<!-- Modal Informações Particular dos produtos -->
<div class="modal fade modalCadastroProdutoDetalhes" id="modalCadastroProdutoDetalhes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-md ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
          <div>


<div id="formCadastroProdutosDetalhes">
	<form id="formProdutoDetalhes">

	<!-- CAMPOS OCULTOS REQUERIDOS-->
	<input type="text" id="acao" class="hide" value="insertProdutoDetalhes" name="acao">
	<input type="text" id="codProdutoDetalhes" class="hide"   name="codProdutoDetalhes">
	<input type="text" id="codEmpresaDetalhes" class="hide"   name="codEmpresaDetalhes">

	<!-- FORM PARA O USUARIO PREENCHER-->
		<table class="table table-striped ">
			<tr>
				<td width="115px"><label>Unid. Compras</label></td>
				<td><input type="text" id="detUnidCompras" name="unidComprasDetalhes" class="form-control input-sm "></td>
				<td width="125px"><label>Unid. Consumo</label></td>
				<td><input type="text" id="detUnidConsumo" name="unidConsumoDetalhes" class="form-control input-sm "></td>
			</tr>
			<tr>
			<!--	<td><label>Grade</label></td>
				<td><input type="text" name="detgrade" class="form-control input-small "></td>-->
				<td><label>C.Custo</label></td>
				<td><input type="numeric" id="ccusto" name="ccustoDetalhes" class="form-control input-sm"></td>
			</tr>

			<tr>
				<td><label>Grupo</label></td>
				<td><input type="numeric" id="grupo" name="grupoDetalhes" class="form-control input-sm "></td>
				<td><label>Ord. Producao</label></td>
				<td><input type="numeric" id="ordproducao" name="ordProducaoDetalhes" class="form-control input-sm" data-mask="9.9.99.99"></td>
			</tr>
		<tr>
				<td><label>OP. ENTRADA</label></td>
				<td><input type="numeric" id="opEntrada" name="opEntradaDetalhes"  class="form-control input-sm "></td>
				<!--<td><label>OP. SAÍDA</label></td>
				<td><input type="text" name="detcusto" class="form-control input-small"></td> -->
			</tr><!--
			<tr>
				<td><label>OP. ENTREGA</label></td>
				<td><input type="text" name="detcusto" class="form-control input-small "></td>
				<td><label>OP. CONSUMO</label></td>
				<td><input type="text" name="detcusto" class="form-control input-small"></td>
			</tr>
				<tr>
				<td><label>Documento</label></td>
				<td><input type="text" name="detcusto" class="form-control input-small "></td>
				<td><label>Frota</label></td>
				<td><input type="text" name="detcusto" class="form-control input-small"></td>
			</tr>-->
		</table>
	</form>
</div>



          </div>
        <div class="msg"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</button>
        <button type="button" class="btn btn-success" id="btSalvarDetalhes"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
      </div>
    </div>
  </div>
</div>