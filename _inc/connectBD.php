<?php 
class connectBD {
<<<<<<< HEAD


   private $sql; 
=======
   /*
   * Declaração dos atributos da classe de conexão
   */
 
   private $host="localhost"; // Endereço do servidor do banco de dados
   private $bd="produtos"; // Banco de dados utilizado na conexão
   private $usuario="root"; // Usuário do banco de dados que possua acesso ao schema
   private $senha="cqto11"; // Senha do usuário
   private $sql; // Consulta a ser executada
>>>>>>> origin/master
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
 