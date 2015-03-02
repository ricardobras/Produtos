<?php
<<<<<<< HEAD
include("var_databases.php");

$conexao = mysqli_connect($host, $user, $password, $database) or die ($this->mensagem(mysql_error()));
=======
$host="localhost";
$user="root";
$database="produtos";
$password="cqto11";

$conexao = mysqli_connect($host, $user, $password, $database) or die ($this->mensagem(mysql_error()));
 
>>>>>>> origin/master
