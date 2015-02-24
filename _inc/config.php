<?php
$host="localhost";
$user="root";
$database="produtos";
$password="cqto11";

$conexao = mysqli_connect($host, $user, $password, $database) or die ($this->mensagem(mysql_error()));
 