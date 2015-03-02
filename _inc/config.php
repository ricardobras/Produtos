<?php
include("var_databases.php");

$conexao = mysqli_connect($host, $user, $password, $database) or die ($this->mensagem(mysql_error()));