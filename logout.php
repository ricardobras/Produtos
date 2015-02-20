     <?php 
     // Destrói a sessão por segurança
     session_unset($_SESSION);
     session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: login.php"); exit;