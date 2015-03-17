<?php require_once("../verifica-login.php");
      

      
    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();
      
    // Verifica se não há a variável da sessão que identifica o usuário
    if (!($_SESSION['UsuarioNivel']=="Cadastro") & !($_SESSION['UsuarioNivel']=="Administrador")) {
       
        //session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: login.php"); exit;
    }
 