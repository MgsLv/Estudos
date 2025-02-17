>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Contato.class.php

<?php
class Contato{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){
        return $this->senha;
    }   

    public function setEmail($email){
        $this->email = $email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    /**
     * Método para conectar ao banco
     * Retorna Verdadeiro se conectar ou Falso se não conseguir
     */
    public function __construct(){

        $dsn    = "mysql:dbname=etimcontatoms2;host=localhost"; 
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass);
            echo "<script> alert('Conectado ao banco com sucesso!')</script>";
            return true;

        } catch (\Throwable $th) {
            echo "<script> alert('Sem conexão. Tente novamente mais tarde!')</script>";
            return false;
        }
    }    

    public function insertUser($nome, $email, $senha) {
        // Verifica se há conexão antes de tentar inserir
        if (!$this->pdo) {
            if (!$this->conectar()) {
                return false; // Se não conectar, retorna falso
            }
        }

        try {
            // Passo 1: criar uma variável com a consulta SQL
            $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";

            // Passo 2: usar o método prepare
            $stmt = $this->pdo->prepare($sql);

            // Passo 3: para cada apelido, usar o bindValue
            $stmt->bindValue(":n", $nome);
            $stmt->bindValue(":e", $email);
            $stmt->bindValue(":s", $senha);

            // Passo 4: executar
            $stmt->execute();

            echo "<script> alert('Contato inserido com sucesso!')</script>";
            return true;

        } catch (\Throwable $th) {
            echo "<script> alert('Erro ao inserir contato')</script>";
            return false;
        }

        //passo 1 criar uma variavel com a consulta
        $sql = "INSERT INTO produto SET nome = :n, descricao = :d, preco = :p, fornecedor = :f";

        #passo 2 usar o metodo prepare
        $sql = $this->$pdo->prepare($sql);

        #passo 3 pra cada apelido usar o bindValue
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        #passo 4 executar
        return $sql->execute();

        public function checkUser($email) {
           $sql = "SELECT COUNT(*) as total FROM usuarios WHERE emeil = :e";
           $sql = this->pdo->prepare($sql);
           $sql->bindValue(":e", $email);
           $sql->execute();
            
           if ($sql->rowCount() > 0) {
               echo "<script> alert('Esse usuário já existe!')</script>";
               return $sql->fletchColumn() > 0;
            } else {
                return array();
            }
        }

        public function checkUserPass($email, $senha) {
            $sql = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":e", $email);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $hashedPassword = $stmt->fetchColumn();
                if (password_verify($senha, $hashedPassword)) {
                    return true; // Senha correta
                } else {
                    echo "<script>alert('Email ou Senha inválidos!')</script>";
                    return false; // Senha incorreta
            } else {
                echo "<script>alert('Email ou Senha inválidos!')</script>";
                return false;
            }
    }
}
