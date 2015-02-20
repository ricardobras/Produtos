<?php

$dbname="rubi";
$host="10.30.10.5";
$username="postgres";
$password="odbcti@chb";
 try {
$conn =  new PDO("pgsql:host=10.30.10.5 dbname=rubi user=postgres password=odbcti@chb");
 } catch (PDOException  $e) {
    print $e->getMessage();
 }
$sql=  "select * from co13t limit 100";

$stm = $conn->prepare($sql);
while($res=$stm->fetch()){
print_r($row);
}