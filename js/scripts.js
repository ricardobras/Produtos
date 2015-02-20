
$(function () {

//ação de cadastro
		  $('[data-toggle="tooltip"]').tooltip();
		  
      $("#btSalvar").on("click",function(){

           var dados = $('#cadUsuario').serialize();

           $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "../acao-cadastrarUsuario.php",
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


//ação de login
      $("#btLogin").on("click",function(){

           var dados = $('#formLogin').serialize();

           $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "acao-login.php",
            async: true,
            data: dados,
            success: function(msg)
            {
           
            if(msg.resposta=="erro"){
                $("#msg").html("Usuário ou senha Inválidos! tente novamente");
                $("#msg").removeClass("hide");
                $("#msg").addClass("alert-warning");
            }else if(msg.resposta="sucesso"){
                $("#msg").html("Login Realizado.... redirecionando Aguarde!");
                $("#msg").removeClass("hide");
                $("#msg").removeClass("alert-warning");
                $("#msg").addClass("alert-success");
               
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
            url: "../json-empresa.php",
            success: function(json){

                  var option="";
              
                  $.each(json, function(key, value){
                      option+="<option value='"+value.id+"'>"+value.nome+"</option>";
                      });$('#empresa').html(option);
                  }
               
               });

    });