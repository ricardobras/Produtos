<?php include("cabecalho.php"); ?>
<div class="panel panel-default">
<div class="panel-heading">Opções do administrador</div>

  <div class="panel-body">
      <a href="#" id="btModalCadastroUsuario" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span><br>CADASTRAR USUÁRIO</a>
      <a href="#" id="btModalCadastrarEmpresaUsuario" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span><br>CADASTRAR EMPRESA DO USUÁRIO</a>
      <hr><a href="../cadastro" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span><br>CADASTRAR PRODUTO</a>
      <a href="../" class="btn btn-info"><span class="glyphicon glyphicon-share-alt"></span><br>SOLICITAR CADASTRO DE PRODUTO</a>
  </div>


<?php require_once("modal-cadastroUsuario.php") ?>
<?php require_once("modal-cadastrarEmpresaUsuario.php") ?>
</div>