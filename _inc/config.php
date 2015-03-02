<?php include("variaveis_bd.php");
$conexao = mysqli_connect($host, $user, $password, $database) or die ($this->mensagem(mysql_error()));