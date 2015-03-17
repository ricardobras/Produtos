<!-- Modal cadastro de usuario -->
<div class="modal fade" id="modalRecusarSolicitacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Recusar solicitação</h4>
      </div>
      <div class="modal-body">
        <form class="form" id="formRecusarSolicitacao">
        <h3><span class="label label-danger label-lg">POR QUE ESTA SOLICITAÇÃO SERÁ RECUSADA?</span></h3>
          <input type="text" id="acao" class="hidden" name="acao" value="recusarSolicitacao"></input>
          <input type="text" id="idsolicitacao" class="hidden" name="idsolicitacao" ></input>
          <textarea class="form-control" id="comentario" name="comentario"></textarea>
        </form>

        <div class="msg"></div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btRecusarSolicitacao">Recusar</button>
      </div>
    </div>
  </div>
</div>