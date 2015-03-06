<?php require_once("variaveis.php");
 try {
$conexao =  new PDO("pgsql:host=10.30.10.2 dbname=rubi user=postgres password=odbcti@chb");

 } catch (PDOException  $e) {
    echo $e->getMessage();
 }
