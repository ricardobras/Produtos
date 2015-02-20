<?php
/*
* Classe de conexão a banco de dados MySQL Orientado a Objetos
* Autor:  Ricardo Bras
*/
 
class connectBD {



   /*
   * Declaração dos atributos da classe de conexão
   */
 
   private $host="127.0.0.1"; // Endereço do servidor do banco de dados
   private $bd="produtos"; // Banco de dados utilizado na conexão
   private $usuario="root"; // Usuário do banco de dados que possua acesso ao schema
   private $senha="cqto11"; // Senha do usuário
   private $sql; // Consulta a ser executada
   private $conexao;
  function conectar(){
      /*
      * Método que conecta ao banco de dados passando
      * os valores necessários para que a conexão ocorra
      */
      $this->conexao = mysqli_connect($this->host,$this->usuario,$this->senha,$this->bd) or die($this->mensagem(mysql_error()));
      return $this->conexao;
   }
 
 
 
   function execute(){
     
      /*
      * Método que executa uma query no banco de dados
      */
      $query = mysqli_query($this->conexao,$this->sql) or die ($this->mensagem(mysql_error()));
      return $query;
   }
 
   function set($propriedade,$valor){
      /*
      * Método criado para atribuir os valores as variáveis de conexão,
      * muito melhor que criar set's para cada variável
      */
      $this->$propriedade = $valor;
   }

   function get($propriedade){
      return $this->$propriedade;
   }
 
   function mensagem($erro){
      /*
      * Função para exibir os possíveis erros
      * Separamos em um método, pois este pode ser estilizado,
      * sem alterar outros métodos
      */
      echo $erro;
   }
}
 
?>
