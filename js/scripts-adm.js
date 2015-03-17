
$(function () {


$("#btModalCadastroUsuario").on("click",function(ev){
  $("#modalCadastro").modal("show");
});

$("#btModalCadastrarEmpresaUsuario").on("click",function(ev){
  $("#modalCadastrarEmpresaUsuario").modal("show");
});
//ação de cadastro
		  $('[data-toggle="tooltip"]').tooltip();
		  
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



      //acao listar empresas no listBox
 

         var option="";
           
           $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "../json-empresa.php",
            success: function(json){

                  var option="";
              
                  $.each(json, function(key, value){
                      option+="<option value='"+value.id+"'>"+value.nome+"</option>";
                      });$('.listboxEmpresa').html(option);
                  }
               
               });

//obtendo a lista de usuarios
          $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "json-usuario.php",
            success: function(json){

                  var option="";
              
                  $.each(json, function(key, value){
                      option+="<option value='"+value.id+"'>"+value.nome+"</option>";
                      });$('.listboxUsuario').html(option);
                  }
               
               });



  $("#btInserirEmpresaUsuario").on("click",function(){

var form = $("#formInserirEmpresaUsuario").serialize();
           $.ajax({
            type: 'POST',
            dataType: 'json',
            data: form,
            url: "acao-cadastrarUsuarioEmpresa.php",
            success: function(json){

                   if(json.success==true){
                    alert("Inserção ralizada!");
                    $("#modalCadastrarEmpresaUsuario").modal("hide");
                   }
               
               }});

  });

    });