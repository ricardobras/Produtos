$(function() {
//DESABILITANDO FUNÇÃO DO ENTER



      //ação de cadastro
		  //$('[data-toggle="tooltip"]').tooltip();
      //mostrar todas as solicitações em uma tabela e ocultar  a  tabela ao carregar
      //usado para preencher somente o contador

      
     exibirSolicitacoesDoUsuario(0);

    

      hideLoading(".msg");
      $(".btCancelar").on("click",function(){
        hideLoading(".msg");
      });
		  

      $("#btPesquisarProduto").on("click",function(ev){
   
          $("#modalPesquisaProduto").modal("show");
      });

      $("#btSalvar").on("click",function(){

           var dados = $('#cadUsuario').serialize();

           $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "acao-cadastrarUsuario.php",
            async: true,
            data: dados,
            success: function(msg)
            {
             if(msg.erro!=null){
                  $("#error").html(msg.erro);
                  $("#error").removeClass("hide");
              }else{
                  alert("Cadastro realizado com sucesso!\nFaça o login")
                  location.reload();
                }
              } 
            });
      });



var statusSolicitacaoTimeOut=0; //usado para definir qual status o usuario selecionou, para
                                //atualizar automaticamente e permanecer na mesma tela
                                //função para atualizar o status da pagina atual

function atualizarTabelaAutomaticamente(){
  exibirSolicitacoesDoUsuario(statusSolicitacaoTimeOut);

 }

setInterval(function(){atualizarTabelaAutomaticamente();},600000);
//fim funcao atualiza status
$(".tituloPainel").html("<h5><span class='label label-warning'>SOLICITAÇÕES: PENDENTES</span></h5>");

$("#btAtualizar").on("click",function(){
  exibirSolicitacoesDoUsuario(statusSolicitacaoTimeOut);
   
 
});

$("#btSolicitacoesPendentes").on("click",function(){
  exibirSolicitacoesDoUsuario(0);
  statusSolicitacaoTimeOut=0;
 
  $(".tituloPainel").html("<h5><span class='label label-warning'>SOLICITAÇÕES: PENDENTES</span></h5>");
});

$("#btSolicitacoesEmAndamento").on("click",function(){
  exibirSolicitacoesDoUsuario(1);
  statusSolicitacaoTimeOut=1;

  $(".tituloPainel").html("<h5><span class='label label-info'>SOLICITAÇÕES: EM ANDAMENTO</b></h5>");
});

$("#btSolicitacoesFinalizadas").on("click",function(){
  exibirSolicitacoesDoUsuario(2);
  statusSolicitacaoTimeOut=2;
 
  $(".tituloPainel").html("<h5><span class='label label-success'>SOLICITAÇÕES: FINALIZADAS</b></h5>");
  
});

$("#btSolicitacoesRecusadas").on("click",function(){
  exibirSolicitacoesDoUsuario(3);
  statusSolicitacaoTimeOut=3;
 
  $(".tituloPainel").html("<h5><span class='label label-default'>SOLICITAÇÕES: RECUSADAS</span></h5>");
});





//ação de login
      $("#formLogin").on("submit",function(event){
        var progressbar = "<img src='../images/progressbar.gif'>";
        event.preventDefault();

           var dados = $('#formLogin').serialize();

           $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "../acao-login.php",
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

//AÇÕES DO BOTÃO SALVAR NO MODAL CADASTRO DO PRODUTO
$("#btSalvarProduto").on("click",function(ev){
     var retorno = confirm("Deseja realmente Finalizar esse cadastro? ");
     if(retorno==true){
         $("#modalNovoProduto").modal("hide");
         atualizarDadosDoProduto();
         alterarStatus("statusSolicitacao",$("#codSolicitacao").val(),2);
         alterarStatus("statusProduto",$("#codigo").val(),1);

         exibirSolicitacoesDoUsuario(statusSolicitacaoTimeOut);

    }else{return;}
});

//AÇÕES BOTÃO PESQUISAR PRODUTO
$("#campoPesquisaProduto").on("keyup",function(){
  var tabela=$("#corpoTabelaPesquisaProduto");
 
   $.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: "acao-Produto.php",
                  data:"acao=localizarProduto&valorBusca="+$("#campoPesquisaProduto").val(),
                  async: true,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde...");
                  },
                  success: function(json1){ 
                    var html="";
                    
                    $.each(json1,function(id,val){
                      console.log(val);
                        html+="<tr>";
                        html+="<td>"+val.codigo+ val.dv+"</td>";                  
                        html+="<td>"+val.descricao+"</td>";
                        html+="<td>"+val.compl1+"</td>"; 
                        html+="<td>"+val.compl2+"</td>";       
                        html+="</tr>";                                      

                    });

                     tabela.html(html);
                     hideLoading(".msg");
                  },
                  error: function(msg){
                      console.log("Erro no metodo: filtrarSolicitacao();");
                  }
            });
    


});
//LISTAR EMPRESAS DENTRO DO LISTBOX
 
         var option="";
           
           $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "../json-empresasUsuario.php",
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
            url: "../json-empresa.php",
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


function listarUsuarioPorId(id){
       
       var jsonReturn="";
          $.ajax({
            async:false,
            dataType: 'json',
            url: "json-buscarUsuario.php?usuarioId="+id,
            success: function(json){
           
                jsonReturn=json[0];
              }
          });
       return jsonReturn;
}
function listarTodasEmpresas(){
       var json1="";
           $.ajax({
                async:false,
                dataType: 'json',
                url: "../json-empresa.php",
                success: function(json){
                  json1=json;
                }
            });
       return json1;
}


function validarFormulario(form){
var campovazio=true;
  $(form+" input").each(function(){
      if($(this).val()==""){
         campovazio=false;
         $(".msg").removeClass("hide");
         $(".msg").addClass("alert alert-danger");
         $(".msg").html("Por favor, preencha todos os campos do formulario");
         $(".msg").show();
      } 
  });
return campovazio;
}

function exibirSolicitacoesDoUsuario(status){
 
            $.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: "json-listarSolicitacoesAdm.php",
                  data: "status="+status,//status 0 = Aguardando, 1=Realizando Cadastro, 2=Recusado, 3=Cadastro finalizado,
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
                 // hideLoading(".msg");

                 //após preencher a tabela, realiza a contagem de todas as solicitações
            
            }); 
           
}


function preencherTabela(json){
 //  showLoading(".msg","Aguarde.... Localizando dados da busca.");
  var linhasTable="";
  //var contadorSolicitacoes=0;
  $(".corpoTabela").html(linhasTable);
  $.each(json,function(key,valor){
           // contadorSolicitacoes+=1;
            //pintando a linha da tabela de acordo com a sua importancia

             if(valor.importancia==0){
               linhasTable+="<tr style='cursor:default' class='text text-info'>"; 
               linhasTable+="<td style='cursor:default'><span class='badge btn-sm btn-info acaoTabela' data-toggle='tooltip' data-placement='right' title='Baixa'> </span></td>"; 
             }else if(valor.importancia==1){
               linhasTable+="<tr style='cursor:default' class='text text-success'>"; 
               linhasTable+="<td style='cursor:default'><span class='badge btn-success acaoTabela' data-toggle='tooltip' data-placement='right' title='Normal'> </span></span></td>"; 
             }else if(valor.importancia==2){
               linhasTable+="<tr style='cursor:default' class='text text-warning'>"; 
               linhasTable+="<td style='cursor:default'><span class='badge  btn-warning acaoTabela' data-toggle='tooltip' data-placement='right' title='Alta'> </span></td>"; 
             }else if(valor.importancia==3){
               linhasTable+="<tr style='cursor:default' class='text text-danger'>"; 
               linhasTable+="<td style='cursor:default'><span class='badge  btn-danger acaoTabela' data-toggle='tooltip' data-placement='right' title='Urgente'> </span></td>"; 
             }

            
             var data=moment(valor.dt_solicitacao).format('DD/MM/YYYY hh:mm');
           //  var nomeEmpresa=listarEmpresaPorId(valor.empresa_id);
             //var jsonSolicitante=listarUsuarioPorId(valor.usuario_id);
             
             linhasTable+= "<td><span class='glyphicon glyphicon-user' data-toggle='tooltip' title='"+valor.nomeSolicitante+"' data-placement='right'></span></td>";
             linhasTable+= "<td>"+data+"</td>";
             linhasTable+= "<td>"+valor.codigo+"</td>";
             linhasTable+= "<td>"+valor.nomeEmpresa+"</td>";
             linhasTable+= "<td>"+valor.descricao+"</td>";
             linhasTable+= "<td>"+valor.und+"</td>";
             linhasTable+="<td>"+valor.referencia+"</td>";
             linhasTable+="<td>"+valor.marca+"</td>";
             linhasTable+="<td>"+valor.ccusto+"</td>";
             linhasTable+="<td>"+valor.grupo+"</td>";
             linhasTable+="<td>"+valor.ordproducao+"</td>";
             linhasTable+="<td>"+valor.aplicacao+"</td>";
             linhasTable+="<td>"+valor.observacao+"</td>";
             if(valor.status==0 | valor.status==1){
             
                if(valor.status==0){

                  linhasTable+="<td><div class='btn-group btn-group-addon '><a href='#' class='btn  btn-sm alert-info btCadastrarSolicitacao  ' data-toggle='tooltip' title='Cadastrar' data-placement='left' idSolicitacao='"+valor.idsolicitacao+"'><span class='glyphicon glyphicon-check'></a>";
                  linhasTable+="<a href='#' class='btn  btn-sm alert-danger btDesativarSolicitacao ' data-toggle='tooltip' title='Recusar' data-placement='left' idSolicitacao='"+valor.idsolicitacao+"'><span class='glyphicon glyphicon-thumbs-down'></a></div></td>";
                } else{
                  linhasTable+="<td><div class='btn-group btn-group-addon '><a href='#' class='btn  btn-sm alert-info btEditarSolicitacao ' data-toggle='tooltip' title='Cadastrar' data-placement='left' idSolicitacao='"+valor.idsolicitacao+"'><span class='glyphicon glyphicon-check'></a>";
                }
              }else{
                if(valor.status==2){
                  linhasTable+="<td><div class='btn-group btn-group-addon '><a href='#' class='btn btn-sm alert-info btEditarSolicitacao'  data-toggle='tooltip' title='Editar' data-placement='left' idSolicitacao='"+valor.idsolicitacao+"'><span class='glyphicon glyphicon-pencil'></a></td>";
                } else if(valor.status==3){
                  linhasTable+="<td><a href='#' class='btn btn-sm alert-danger btOcultarSolicitacao' data-toggle='tooltip' title='Ocultar' data-placement='left' idSolicitacao='"+valor.idsolicitacao+"'><span class='glyphicon glyphicon-eye-open'></a></div></td>";
                }
              }
             linhasTable+="</tr>";
        
        });

        $(".corpoTabela").html(linhasTable);
         ativarBotaoCadastrar();
         ativarBotaoEditar();
         ativarBotaoDesativarSolicitacao();
         ativarBotaoOcultarSolicitacao();
    //    $('[data-toggle="tooltip"]').tooltip();
        // $("").html(linhasTable);
         $("#tabelaCadastroDeProduto").fadeIn();
         $("#formCadastroDeProduto").hide();

         contarSolicitacoes(); 

}

function contarSolicitacoes(){

            $.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: "json-contarSolicitacoes.php",
               //   data:"status="+status,
                  async: false,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde.... Localizando dados da busca.");
                  },
                  success: function(json)
                  {
                   $.each(json,function(key,val){
                   
                   var status = val.status;
                      if(status==0){ //pendentes
               
                        $("#contadorSolicitacoesPendentes").html(val.total);
                      }else if(status==1){
                  
                         $("#contadorSolicitacoesEmAndamento").html(val.total);
                      }else if(status==2){
                   
                         $("#contadorSolicitacoesFinalizadas").html(val.total);
                      }else if(status==3){
              
                         $("#contadorSolicitacoesRecusadas").html(val.total);
                      }
                   });
                  },
                  error: function(msg){
                      console.log(msg);
                  }
            }).done(function(){
                  hideLoading(".msg");
            });

}

//buscar uma solicitação com base no seu id
function filtrarSolicitacao(idFiltro){
 var result=[];

            $.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: "json-listarSolicitacoesAdm.php",
                  data:"status=todos&id="+idFiltro+"",
                  async: false,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde...");
                  },
                  success: function(json)
                  {
                    result=json;
                    hideLoading(".msg");
                  },
                  error: function(msg){
  
                      console.log("Erro no metodo: filtrarSolicitacao();");
                  }
            });

  //fazer a varredura no arquivo json para verificar a existencia do id passado via parametro
  return result; //retorna o json com o id correspondente
}

function buscarProduto(codigo){
 var result=[];

            $.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: "acao-Produto.php",
                  data:"acao=buscar&idsolicitacao="+codigo+"",
                  async: false,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde...");
                  },
                  success: function(json)
                  {
                    result=json;
                  },
                  error: function(msg){
                      console.log("Erro no metodo: filtrarSolicitacao();");
                  }
            }).done(function(){ hideLoading(".msg")});
  
 
  
  //fazer a varredura no arquivo json para verificar a existencia do id passado via parametro
  return result; //retorna o json com o id correspondente
}

function preencherFormProdutoPadrao(json){
    var codigo = $("#codigo");
    var descricao = $("#descricao");
    var complemento1 = $("#complemento1");
    var complemento2 = $("#complemento2");
    var codigoNcm = $("#codigoNcm");
    var grupo = $("#grupo");
    var ccusto = $("#ccusto");
    var ordproducao = $("#ordproducao");
    var codigoSolicitacao=0;

       //PERCORRE O JSON RECEBIDO VIA PARAMETRO E PREENCHE O FORM PADRAO
$.each(json,function(id,produto){
    codigoSolicitacao=produto.idsolicitacao;
    descricao.val(produto.descricao+" "+produto.referencia+" "+produto.marca);
    complemento1.val(produto.complemento1);
    complemento2.val(produto.complemento2);
    codigoNcm.val(produto.ncm);
    grupo.val(produto.grupo);
    ccusto.val(produto.ccusto);
    ordproducao.val(produto.ordproducao);
});

//gera um id e grava na tabela principal de produto, para que nenhum usuario pegue o registro enquanto
//está sendo digitado por outro.
$.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: "acao-Produto.php",
                  data:"acao=gerarId&idsolicitacao="+codigoSolicitacao+"",
                  async: true,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde...");
                  },
                  success: function(json)
                  {      var codigoProd = json[0].codigo;     // var json = $.parseJSON(data); 
                         codigo.val(codigoProd);              //converte em json o objeto recebido
                                                              //pega o codigo dentro do array
                                                              //percorre o array com o novo id gerado e preenche o campo do codigo
                                                             //gera um novo codigo de produto no sistema
                       
                       //calcula o digito verificador atraves do codigo gerado do produto
                        $(".digitoVerificador").html(calcularDv(codigoProd));    //CALCULAR O DV PARA EXIBIR NO ADDON - MODAL
                        $(".digitoVerificador:text").val(calcularDv(codigoProd));//CALCULAR O DV E JOGAR NO INPUT TEXT HIDDEN

                  },
                  error: function(msg){
                      console.log("Erro no metodo: filtrarSolicitacao();");
                  }
            });
 
}


//preenche a tela padrão de cadastro de produto
//é realizado ao clicar no botão para editar um produto cadastrado
function preencherFormProdutoPadraoBuscar(produto){
      var codigo = $("#codigo");
      var descricao = $("#descricao");
      var complemento1 = $("#complemento1");
      var complemento2 = $("#complemento2");
      var codigoNcm = $("#codigoNcm");
      var tipoProduto = $("#tipoProduto");
      var codigoSolicitacao=0;

       //PERCORRE O JSON RECEBIDO VIA PARAMETRO E PREENCHE O FORM PADRAO

      descricao.val(produto.descricao);
      complemento1.val(produto.compl1);
      complemento2.val(produto.compl2);
      codigoNcm.val(produto.ncm_codigo);
      preencherCampoAoDigitarNcm(produto.ncm_codigo);//preenche a descrição do ncm com base no cadastro
      codigo.val(produto.codigo); 
    //calcula o digito verificador atraves do codigo gerado do produto
      $(".digitoVerificador").html(calcularDv(produto.codigo));    //CALCULAR O DV PARA EXIBIR NO ADDON - MODAL
      $(".digitoVerificador:text").val(calcularDv(produto.codigo));//CALCULAR O DV E JOGAR NO INPUT TEXT HIDDEN
     
     //selecionar dentro do option o tipo do produto atual no banco dados
      $('#tipoProduto option[value="'+produto.tp_prod+'"]').attr({ selected:"selected" });
 
}


//ativar o click na tabela do modal, ( selecionar a solicitação para criar um novo produto)
function ativarBotaoCadastrar(ev){
          
           $(".btCadastrarSolicitacao").on("click",function(){
           var idSol=$(this).attr("idSolicitacao");

           var produto =  filtrarSolicitacao(idSol);

              preencherFormProdutoPadrao(produto);     //oculta  a tabela após clicar
              $('#labelDigitoVerificador').html();     //mostrao form para cadastrar os dados do novo produto
              $("#formCadastroDeProduto").slideDown(); //criar os botões individuais de cada empresa no form
              criarBotaoIndividualEmpresas();
              $("#modalNovoProduto").modal();
              $("#codSolicitacao").val(idSol);
              contarSolicitacoes();
              removerLinhaTabela($(this));
            });
}
 
function ativarBotaoEditar(){
  $(".btEditarSolicitacao").on("click",function(){
        var idSolicitacao=$(this).attr("idSolicitacao");
        var produto = buscarProduto(idSolicitacao);
        if(produto.descricao==""){
          produto = filtrarSolicitacao(idSolicitacao);
          preencherFormProdutoPadrao(produto);
        }else{
          preencherFormProdutoPadraoBuscar(produto);
        }
        criarBotaoIndividualEmpresas();
        
        $("#modalNovoProduto").modal();
        $("#codSolicitacao").val(idSolicitacao);
        hideLoading(".msg");
  });
}
 
function ativarBotaoDesativarSolicitacao(){
    $(".btDesativarSolicitacao").on("click",function(){
          var id = $(this).attr("idSolicitacao");
          $("#idsolicitacao").val(id); //definindo o id da solicitacao no modal
          $("#modalRecusarSolicitacao").modal();
    });
}

function ativarBotaoOcultarSolicitacao(){
  $(".btOcultarSolicitacao").on("click",function(){
    alterarStatus("statusSolicitacao",$(this).attr("idSolicitacao"),4);
    exibirSolicitacoesDoUsuario(statusSolicitacaoTimeOut);
  });
}
$("#btRecusarSolicitacao").on("click",function(){

  var dadosFormsol = $("#formRecusarSolicitacao").serialize();
 
  $.ajax({
                  type:"POST",
                  dataType:"json",
                  url:"acao-Produto.php",
                  data:dadosFormsol,
                  async: true,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde...");
                  },
                  success:function(json)
                  {               


                  },
                  error: function(msg){
                    $.each(msg,function(id,val){
                      console.log("ERRO:");
                      console.log(val);
                    });
                    
                  }
            }).done(function(){
                hideLoading(".msg");
                $('#modalRecusarSolicitacao').modal("hide");
                exibirSolicitacoesDoUsuario(0);

            });
    
});

$("#botaoExibirEmpresasReplicacao").on("click",function(){
          atualizarDadosDoProduto();
});

function atualizarDadosDoProduto(){
   var dadosForm = $("#formCadastroPadraoDeProduto").serialize();
  $.ajax({
                  type:"POST",
                  dataType:"json",
                  url:"acao-Produto.php",
                  data:dadosForm,
                  async: true,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde...");
                  },
                  success:function(json)
                  {               
                    $("#botaoExibirEmpresasReplicacao").fadeOut();
                    $("#botaoIndividualDeEmpresas").fadeIn(2000);
                  },
                  error: function(msg){
                    $.each(msg,function(id,val){
                      console.log("ERRO:");
                      console.log(val);
                    });
                    
                  }
            }).done(function(){
                hideLoading(".msg");
            });
}

//buscar os detalhes do produto caso ele exista
function buscarDetalhesProdutoExistente(codEmpresa,codProduto)
{
  $.ajax({
                  type:"POST",
                  dataType:"json",
                  url:"acao-Produto.php",
                  data:"acao=buscarProdutoDetalhes&codEmpresa="+codEmpresa+"&codProduto="+codProduto,
                  async: true,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde...");
                  },
                  success:function(json)
                  {   
                      preencherDetalhesProdutoExistente(json); //preencher o produto caso exista
                  },
                  error: function(msg){
                    $.each(msg,function(id,val){
                        console.log("ERRO:");
                        console.log(val); });
                      
                      hideLoading(".msg");
                  }
            }).done(function(){
                hideLoading(".msg");
            });
}

function preencherDetalhesProdutoExistente(json){
      $("#codPropdutoDetalhes").val(json.produto_codigo);
      $("#codPropdutoDetalhes").val(json.empresa_id);
      $("#detUnidCompras").val(json.unidCompras);
      $("#detUnidConsumo").val(json.unidConsumo);
      $("#ccusto").val(json.ccusto);
      $("#grupo").val(json.grupo);
      $("#ordproducao").val(json.ordproducao);
      $("#opEntrada").val(json.opentrada);
}

 //tela de novo produto ( criar os botões das empresas)
function criarBotaoIndividualEmpresas(){
    var html="<div class='btn-group'>";
    $.each(listarTodasEmpresas(),function(key,valor){
      html+="<button type='button' empresa-id="+valor.id+" class='btn btn-info btIndividualEmpresa' nomeEmpresa="+valor.nome+"><center><span class='glyphicon glyphicon-exclamation-sign'></span><br>"+valor.nome+"</center></button>";
    });
    html+="</div>";
    $("#botaoIndividualDeEmpresas").html(html);
    $("#botaoIndividualDeEmpresas").hide();
    acaoBotaoIndividual();
$("#botaoExibirEmpresasReplicacao").show();
}

//abre modal com as informações individuais de cada produto da empresa empresa a ser preenchida
 function acaoBotaoIndividual(){
    $(".btIndividualEmpresa").on("click",function(){
        var modal = $("#modalCadastroProdutoDetalhes");
        modal.modal('show');
        modal.find('.modal-title').html("<span class='glyphicon glyphicon-list-alt'></span> Informações Adicionais <i class='text-success'>   ( "+$(this).attr("nomeEmpresa")+" ) <span class='glyphicon glyphicon-menu-down'></span> </i>");

        //$("#codigoEmpresa").val($(this).attr("empresa-id"));
        var empresa = $(this).attr("empresa-id");
        var produto = $("#codigo").val();
        $("#codEmpresaDetalhes").val(empresa);
        $("#codProdutoDetalhes").val(produto);
        buscarDetalhesProdutoExistente(empresa,produto);
      });
 }

$("#btSalvarDetalhes").on("click",function(){
 var modal = $("#modalCadastroProdutoDetalhes");
 var dadosForm = $("#formProdutoDetalhes").serialize();
        $.ajax({
                  type:"POST",
                  dataType:"json",
                  url:"acao-Produto.php",
                  data:dadosForm,
                  async: true,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde...");
                  },
                  success:function(json)
                  {    
                  $.each(json,function(id,val){
                  if(val.retorno=="ok"){     
                        modal.modal('hide'); //se funcionar, fechar o modal
                        alterarIconeBotaoEmpresa($("#codEmpresaDetalhes").val());
                        hideLoading(".msg");
                      }else{
                           erro();
                          alert("erro success");
                      }
                    });
                  },
                  error: function(msg){
                    erro();
                    alert("erro");
                  }
            });

                var erro = function(){
                   hideLoading(".msg");
                   $(".msg").html("Erro ao cadastrar:\n1- verifique os dados digitados\n 2- Verifique a existência deste cadastro");
                   $(".msg").show();
                }
      });

function alterarIconeBotaoEmpresa(idEmpresa){
  var botao = $(".btIndividualEmpresa[empresa-id="+idEmpresa+"]");
  var botaoSpan = $(".btIndividualEmpresa[empresa-id="+idEmpresa+"] span");
  botaoSpan.removeClass("glyphicon-exclamation-sign");
  botaoSpan.addClass("glyphicon glyphicon-ok");
  botao.removeClass("btn-info");
  botao.addClass("btn-success");
}
function removerLinhaTabela(escopo){//função utilizada para apagar uma linha especifica da tabela
     var tr =  escopo.closest('tr');
      tr.fadeOut(400, function(){ 
          tr.remove(); 
      }); 
}

$("#btBuscarNcm").click(function(){
       var modal=$("#modalNcm");
       modal.modal('show');
       var jsonNcm = buscarNcm("todos");
       preencherTabelaNcm(jsonNcm);
       ativarCampoPesquisaNcm();
});


//FORMULARIO CAD. PRODUTOS
//preencher o campo descrição ao digitar algo no campo de ncm
$('#codigoNcm').on("keyup",function(){

   var valorBusca = $(this).val();
        if(valorBusca==""){return};
      clearInterval(interval);
      interval = window.setTimeout(function() {
        preencherCampoAoDigitarNcm(valorBusca);
      }, 600);
       
 });


// função usada para preencher o campo descrição de ncm automaticamente ao digitar algo
function preencherCampoAoDigitarNcm(codNcm){
  var ncmBuscado = buscarNcm(codNcm);
        $.each(ncmBuscado,function(id,val){
          $('#descricaoNcm').val(val.descricao);
          $('#detUnidCompras').val(val.unidconsumo);
          $('#detUnidConsumo').val(val.unidconsumo);
        });
}

//ativar o campo dentro da tela de pesquisa do ncm
function ativarCampoPesquisaNcm(){
  $("#inputPesquisaNcm").on("keyup",function(ev){
    showLoading(".ncm.msg","aguarde...");
    clearInterval(interval);
    interval = window.setTimeout(function() {
    var jsonNcm = buscarNcm($("#inputPesquisaNcm").val());
         preencherTabelaNcm(jsonNcm);
      }, 600);
  });
}

function preencherTabelaNcm(json){
  var tabelaNcm = $(".corpoTabelaNcm");
  var html="";

  $.each(json,function(id,val){
    html+="<tr style='cursor:pointer' codigoNcm='"+val.codigo+"'>";
    html+="<td>"+val.codigo+"</td><td>"+val.descricao+"</td><td>"+val.unidconsumo+"</td>"
    html+="</tr>";
  });

  tabelaNcm.html(html);
  hideLoading(".ncm.msg");
  ativarClickNaLinha();
}

function ativarClickNaLinha(){
  $("table .corpoTabelaNcm>tr").click(function(ev){
       var codigoNcm=$(this).attr("codigoNcm");
       var ncmBuscado = buscarNcm(codigoNcm);
       preencherCamposNcm(ncmBuscado);
       $('#modalNcm').modal('hide');$('#codigoNcm').focus();
  });
}


//USADO PARA PREENCHER OS CAMPOS AUTOMATICAMENTE DO NCM A PARTIR DE UM JSON BUSCADO PELO USUARIO OU CLICADO NA TABELA
function preencherCamposNcm(jsonBuscado){
$.each(jsonBuscado,function(id,val){
         $('#codigoNcm').val(val.codigo);
         $('#descricaoNcm').val(val.descricao);
         $('#detUnidCompras').val(val.unidconsumo);
         $('#detUnidConsumo').val(val.unidconsumo);
  });
}

function buscarNcm(valorBusca){
 var result=[];

            $.ajax({
                  type: 'POST',
                  dataType: 'json',
                  url: "json-pesquisa-ncm.php",
                  data:"busca="+valorBusca,
                  async: false,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde.... Localizando dados da busca.");
                  },
                  success: function(json){
                    result=json;
                  },
                  error: function(msg){
                      console.log(msg);
                  }

            }).done(function(){
                  hideLoading(".msg");
            });
 return result;
}


//EXIBIR E OCULTAR BARRA DE PROGRESSO COM MENSAGEM
function showLoading(div,texto){
      var progressbar = "<img src='../images/progressbar.gif'>";
      $(div).removeClass("hide");
      $(div).addClass("alert alert-default");
      $(div).html("<center>"+texto+"<br>"+progressbar);   
      $(div).show();            
}

function hideLoading(div){
  $(div).addClass("hide");
  $(div).hide();
}

function alterarStatus(acao,id,status){ 
$.ajax({
                  type:"POST", dataType:"json",
                  url:"acao-Status.php",
                  data:"acao="+acao+"&codigo="+id+"&status="+status+"",
                  async: false,
                  beforeSend:function(){
                    showLoading(".msg","Aguarde...");
                  },
                  success:function(json)
                  {   
                 
                  },
                  error: function(msg){
                    $.each(msg,function(id,val){
                    console.log("ERRO: aletarStatus");
                    console.log(val);
                    });
                    
                  }
            }).done(function(){
                hideLoading(".msg");
            });
}

 

//GERAR DIGITO VERIFICADOR PARA CHB, COM BASE NO CALCULO DE RG DE SÃO PAULO

function calcularDv(codigo)
{
var cispNum;

if(codigo.length>8){
  return "Erro";
}

cispNum="0000000" + codigo;
cispNum=cispNum.slice(cispNum.length-8);

cispDig1=cispNum.slice(7);   b1=eval(cispDig1);
cispDig2=cispNum.slice(6,7); b2=eval(cispDig2);
cispDig3=cispNum.slice(5,6); b3=eval(cispDig3);
cispDig4=cispNum.slice(4,5); b4=eval(cispDig4);
cispDig5=cispNum.slice(3,4); b5=eval(cispDig5);
cispDig6=cispNum.slice(2,3); b6=eval(cispDig6);
cispDig7=cispNum.slice(1,2); b7=eval(cispDig7);
cispDig8=cispNum.slice(0,1); b8=eval(cispDig8);

cispDig=(b1*2+b2*3+b3*4+b4*5+b5*6+b6*7+b7*8+b8*9)%11;
if(cispDig==10){cispDig="0";}
cispDV=cispDig;

return cispDV;
}
}); //FIM DA FUNCAO AUTOLOAD DO JQUERY