<?php 
$conexao="";
 try {
 include("variaveis.php");
$conexao =  new PDO("pgsql:host='{$host}' dbname='{$dbname}' user='{$user}' password='{$password}'");

 } catch (PDOException  $e) {
    echo $e->getMessage();
 }
