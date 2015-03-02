<?php 
class connectBD {


   private $sql; 
   private $conexao;

  function conectar(){
   include("var_databases.php"); //variaveis do banco de dados
      $this->conexao = mysqli_connect($host,$user,$password,$database) or die($this->mensagem(mysql_error()));
      return $this->conexao;
   }

   function execute(){
      $query = mysqli_query($this->conexao,$this->sql) or die ($this->mensagem(mysql_error()));
      return $query;
   }
 
   function set($propriedade,$valor){
      $this->$propriedade = $valor;
   }

   function get($propriedade){
      return $this->$propriedade;
   }
 
   function mensagem($erro){
      echo $erro;
   }
}
 