<?php
class Usuario{
    
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    public function __construct(){
        $dns    = "mysql:dbname=Usuario;host=localhost"; 
        $dbUser = "root";
        $dbPass = "";
        
        try{
            $this->pdo = new PDO($dns, $dbUser , $dbPass); 
            return true;
        } catch (Throwable $th){
            return false;
        }     
    }
    
    function cadastrar($nome, $email, $senha){
        // Primeiro passo: criar a consulta sql 
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";
        
        // Segundo passo: passar a consulta para o método preprare PDO
        $stmt = $this->pdo->prepare($sql); 

        // Terceiro passo: para cada apelido, passar o valor correspondente
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        // Quarto passo: executar o comando
        return $stmt->execute();
    }
    
    function apagar($id){
        
    }
    
    function editar($id, $nome, $email, $senha){
    
    }
    
    function chkUser($email){
        // Passo 1: criar a consulta sql
        $sql  = "SELECT * FROM usuarios WHERE email = :e";

        // Passo 2: passar a consulta para o método prepare PDO
        $stmt = $this->pdo->prepare($sql);

        // Passe 3: para cada apelido, passar o valor correspondente
        $stmt->bindValue(":e", $email);

        // Passo 4: executar o comando
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }


    }
    
    function chkPass($email, $senha){
    
    }
}
?>