
$(function() {
//CONFIGURANDO MASCARA DOS CAMPOS

//ação de cadastro
		  $('[data-toggle="tooltip"]').tooltip();
      exibirSolicitacoesDoUsuario("");

      hideLoading(".msg");
      $(".btCancelar").on("click",function(){
          hideLoading(".msg");
      });

      $("#botaoPesquisaProduto").on("click",function(){
          alert("click");
          $("#modalPesquisaProduto").modal("show");

      });
//ação de login
      $("#formLogin").on("submit",function(event){
          event.preventDefault();
          var progressbar = "<img src='images/progressbar.gif'>";
          var dados = $('#formLogin').serialize();

           $.ajax({
            type: "POST",
            dataType: "json",
            url: "acao-login.php",
            async: true,
            data: dados,
            beforeSend:function(){
              var texto = "<center>enviando dados para login<br>";
              
              $(".msg").removeClass("alert-warning");
              $(".msg").removeClass("hide");
              $(".msg").addClass("alert-info");
              $(".msg").html(texto+progressbar);
            },
            success: function(msg){
               
                if(msg.resposta=="erro"){
                    $(".msg").html("Usuário ou senha Inválidos! tente novamente");
                    $(".msg").removeClass("hide");
                    $(".msg").addClass("alert-warning");
                    $(".msg").show();
                     
                }else if(msg.resposta=="sucesso"){
                    $(".msg").html("<center>Login Realizado.... redirecionando Aguarde!<br>"+progressbar);
                    $(".msg").removeClass("hide");
                    $(".msg").removeClass("alert-warning");
                    $(".msg").addClass("alert-success");
                    $(".msg").show();
                  
                    //redirecionando para a pagina index
                    window.location.assign("index.php");
                }
            } 

            });

      });


      //acao listar empresas no listBox
      var option="";
     
           $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "json-empresasUsuario.php",
            success: function(json){

                  var option="";
              
                  $.each(json, function(key, value){
                      option+="<option value='"+value.id+"'>"+value.nome+"</option>";
                      });
                  $('#empresaUsuario').html(option);
                  }
               
               });


function listarEmpresaPorId(id){
       
       var nome="";
           $.ajax({
            async:false,
            dataType: 'json',
            url: "json-empresa.php",
            success: function(json){
            var idjson = 0;
              for(var i=0;json[idjson].id != id; i++){
                idjson=i;
              }
           
              nome=json[idjson].nome+"";
              
              }
               });
       return nome;
     
}


function validarFormulario(form){
var campovazio=true;
  $(form+" input").each(function(){
      if($(this).val()==""){
         campovazio=false
         $(".msg").removeClass("hide");
         $(".msg").addClass("alert alert-danger");
         $(".msg").html("Por favor, preencha todos os campos do formulario");
         $(".msg").show();
      } 
  });

 
return campovazio;
}

 $("#btSolicitacao").on("click",function(ev){
      var formularioValido = validarFormulario("#formSolicitacao");

      if(formularioValido==true){
          var dados = $('#formSolicitacao').serialize();

         $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "acao-novaSolicitacao.php",
            async: true,
            data: dados,
            beforeSend:function(){
              var texto = "aguarde enquanto registramos sua Solicitação";
           
                    $(".msg").removeClass("alert-warning");
                    $(".msg").addClass("alert-info");
                    showLoading(".msg",texto);
                    $('#formSolicitacao').hide();
            },
            success: function(json){
               if(json[0].retorno=="true"){
                    $(".msg").removeClass("alert-warning");
                    $(".msg").addClass("alert-success");
                    showLoading(".msg",json[0].msg);
                    $('#formSolicitacao').hide();
                    $(".modal-footer").hide();
                    location.reload();
                }else{
                    showLoading(".msg",json[0].msg);
                    $(".msg").removeClass("alert-success");
                    $(".msg").removeClass("hide");
                    $(".msg").addClass("alert-warning");
                  }
            },
            error: function(msg){
                $(".msg").removeClass("hide");
                $(".msg").addClass("alert-warning");
                $(".msg").html("Erro ao efetuar o cadastro, Verifique todas as informações preenchidas");
                $('#formSolicitacao').show();
                $(".modal-footer").show();
            } 

            });
          }//validar formulario
      });


function exibirSolicitacoesDoUsuario(valorBusca){
var dados="";
        if(valorBusca=="" | valorBusca==null){
          dados="modoExibicao=todas&campoBusca="+valorBusca+""
        }else{
          dados="modoExibicao=busca&campoBusca="+valorBusca+""
        }

            $.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: "json-listarSolicitacoesDoUsuario.php",
                  data: dados,
                  async: true,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde.... Localizando dados da busca.");
                  },
                  success: function(json)
                  {
                        preencherTabela(json);
                  },
                  error: function(msg){
                      console.log(msg);
                  }

            }).done(function(){
                  $('[data-toggle="tooltip"]').tooltip();
                  hideLoading(".msg");
            });
}

function showLoading(div,texto){
      var progressbar = "<img src='images/progressbar.gif'>";
      $(div).removeClass("hide");
      $(div).addClass("alert alert-default");
      $(div).html("<center>"+texto+"<br>"+progressbar);   
      $(div).show();            
}

function hideLoading(div){
  $(div).addClass("hide");
  $(div).hide();
}

function preencherTabela(json){
  var linhasTable="";
  $.each(json,function(key,valor){
  
            //pintando a linha da tabela de acordo com a sua importancia

             if(valor.importancia==0){
                linhasTable+="<tr style='cursor:default' class='text text-info'>"; 
                linhasTable+="<td><span class='badge  btn-info statusCadastro ' data-toggle='tooltip' data-placement='right' title='Prioridade Baixa'> </span></td>";
             }else if(valor.importancia==1){
                linhasTable+="<tr style='cursor:default' class='text text-success'>"; 
                linhasTable+="<td><span class='badge  btn-success statusCadastro' data-toggle='tooltip' data-placement='right' title='Prioridade Normal'> </span></td>";
             }else if(valor.importancia==2){
                linhasTable+="<tr style='cursor:default' class='text text-warning'>"; 
                linhasTable+="<td><span class='badge  btn-warning statusCadastro' data-toggle='tooltip' data-placement='right' title='Prioridade Alta'> </span></td>";
             }else if(valor.importancia==3){
                linhasTable+="<tr style='cursor:default' class='text text-danger'>"; 
                linhasTable+="<td><span class='badge  btn-danger statusCadastro' data-toggle='tooltip' data-placement='right' title='Prioridade Urgente'> </span></td>";
             }

            if(valor.status==0){
                    linhasTable+="<td><span class='glyphicon glyphicon-hourglass' style='color:orange' data-toggle='tooltip' data-placement='right' title='Aguardando Cadastro'></span></td>";
                 }else if(valor.status==1){
                    linhasTable+="<td><span class='glyphicon glyphicon-pencil' style='color:blue' data-toggle='tooltip' data-placement='right' title='Em Andamento'></span></td>";
                 }else if(valor.status==2){
                     linhasTable+="<td><span class='glyphicon glyphicon-ok' style='color:green' data-toggle='tooltip' data-placement='right' title='Cadastro Realizado'></span></td>";
                 }

             var data=moment(valor.dt_solicitacao).format('DD/MM/YYYY hh:mm');
              
             var nomeEmpresa=listarEmpresaPorId(valor.empresa_id);

             linhasTable+= "<td>"+data+"</td>";
             linhasTable+= "<td>"+nomeEmpresa+"</td>";
             linhasTable+= "<td>"+valor.codigo+"</td>";
             linhasTable+= "<td>"+valor.descricao+"</td>";
             linhasTable+= "<td>"+valor.und+"</td>";
             linhasTable+="<td>"+valor.referencia+"</td>";
             linhasTable+="<td>"+valor.marca+"</td>";
             linhasTable+="<td>"+valor.ccusto+"</td>";
             linhasTable+="<td>"+valor.grupo+"</td>";
             linhasTable+="<td>"+valor.ordproducao+"</td>";
             linhasTable+="<td>"+valor.aplicacao+"</td>";
             linhasTable+="<td>"+valor.observacao+"</td>";
               
             linhasTable+="</tr>";
        });
         $(".corpoTabela").html(linhasTable);
}


//ação - campo de busca
var interval =0;
$(".campoBusca").keyup(function(){
  //clearInterval(); //faz executar a função somente se parar de digitar por 1,5 s
      var conteudoDoCampoBusca=$(".campoBusca").val();
      showLoading(".msg","Aguarde");
      clearInterval(interval);
      interval = window.setTimeout(function() {
        exibirSolicitacoesDoUsuario(conteudoDoCampoBusca);
      }, 600);
       
   
   });

$(".campoBusca").focusout(function(){
  //clearInterval(); //faz executar a função somente se parar de digitar por 1,5 s
      var conteudoDoCampoBusca=$(".campoBusca").val();
      showLoading(".msg","Aguarde");
      clearInterval(interval);
      interval = window.setTimeout(function() {
        exibirSolicitacoesDoUsuario(conteudoDoCampoBusca);
      }, 600);
       
   
   });
});//fim autoload

