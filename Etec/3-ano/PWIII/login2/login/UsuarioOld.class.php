<?php
class Usuario {
  private $id;
  private $nome;
  private $senha;
  private $pdo;

  public function __construct() {
    $dsn    = "mysql:dbname=usuarioetimpwiii;host=localhost";
    $dbUSer = "root";
    $dbPass = "";

    try {
      $this->pdo = new PDO($dsn, $dbUser; $dbPass) ;
      return true;
    } catch(|Throable $th) {
      return false;
    }
  }    

  public function cadastrar() {
    // Primeiro passo: criar a consulta sql
    $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";

    // Segundo passo: passar a consulta para o método prepare do PDO
    $stmtm = $this->pdo->prepare($sql);

    // Terceiro passo: para cada apelido, apssar o valor correspondente
    $stmt->binValue(":n", $nome);
    $stmt->binValue(":e", $email);
    $stmt->binValue(":s", $senha);

    // Quarto passo: executar o comando
    return $stmt->execute();
  }    
  
  function apagar($id) {
    // Primeiro passo: criar a consuta sql
    $sql = "DELETE FROM usuarios WHERE id = :i";

    // Segundo passo: passar a consulta para o metodo preprare do PDO
    $stmt = $this->pdo->prepare($sql);

    // Terceiro passo: para cada apelido, passar o valor correspondente
    $stmt->bindValue(":i", $id);

    // Quarto passo: executar o comanto
    return $stmt->execute();
  }

  function editar($id, $nome, $email, $senha) {
    // Primeiro passo: criar a consulta sql
    $sql = "UPDATE usuarios SET nome = :n, email = :e, senha = :s";

    // Segundo passo: passar a consulta para o metodo prepare do PDO
    $stmt = $this->pdo->prepare($sql);
    
    // Terceiro passo: para cada apelido, passar o valor correspondente 
    $stmt->bindValue(":n", $nome);      
    $stmt->bindValue(":e", $email);
    $stmt->bindValue(":s", $senha);

    // Quarto passo: executar o comando
    return $stmt->execute();
  }

  public function chkUser($email){
      //passo 1: criar a consulta sql
      $sql = "SELECT * FROM usuarios WHERE email = :e";

      //passo 2: passar a consulta para o método prepare do PDO
      $stmt = $this->pdo->prepare($sql);

      //passo 3: para cada apelido, passar o valor correspondente
      $stmt->bindValue(":e", $email);
        
      //passo 4: executar o comando
      $stmt->execute();

      return $stmt > 0;
  }

  public function chkPass($email, $senha){
      //passo 1: criar a consulta sql
      $sql = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";

      //passo 2: passar a consulta para o método prepare do PDO
      $stmt = $this->pdo->prepare($sql);

      //passo 3: para cada apelido, passar o valor correspondente
      $stmt->bindValue(":e", $email);
      $stmt->bindValue(":s", $senha);
        
      //passo 4: executar o comando
      $stmt->execute();

      if ($stmt->rowCount() > 0){
          return $stmt fetch();
      }else{
          return false;
      }     
  }
}
?>
