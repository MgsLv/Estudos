<?php
class Pessoa{
    private $id;
    private $nome;
    private $email;
    private $telefone;

    function getId(){
        return $this->id;
    }
    function getNome(){
        return $this->nome;
    }
    function getEmail(){
        return $this->email;
    }
    function getTelefone(){
        return $this->telefone;
    }

    function setNome(){
        $this->nome = $nome;
    }
    function setEmail(){
        $this->email = $email;
    }
    function setTelefone(){
        $this->telefone = $telefone;
    }

    function __construct(){
        $dsn = "mysql:dbname=pessoaetim;host=localhost";
        $dbuser = "root";
        $dbpass = "";

        try {
            $this->pdo = new PDO($dsn, $dbuser, $dbpass);
        } catch(\Throwable $problema){
            echo "<script> alert('banco indisponivel, tente mais tarde.')</script>";
        }
    }

    function inserirPessoa($nome, $email, $telefone){
        $sql = "INSERT INTO pessoa SET nome=:n, email=:e, telefone=:t";

        $sql = $this->pdo->prepare($sql);

        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":t", $telefone);

        return $sql->execute();
    } 

    function listarPessoas($nome = "", $email = "", $telefone = ""){
        $sql = "SELECT * FROM pessoa WHERE nome LIKE :n AND email LIKE :e AND telefone LIKE :t";
        $list = $this->pdo->prepare($sql);
    
        // Vincula os valores aos parâmetros, usando LIKE para permitir que campos sejam vazios ou parciais
        $list->bindValue(":n", "%$nome%");
        $list->bindValue(":e", "%$email%");
        $list->bindValue(":t", "%$telefone%");
    
        // Executa a consulta
        $list->execute();
    
        // Exibe os resultados
        while ($linha = $list->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: {$linha['nome']} - Email: {$linha['email']} - Telefone: {$linha['telefone']}<br>";
        }
    }

    function apagarPessoa($nome, $email, $telefone) {
        $sql = "DELETE FROM pessoaq WHERE "
    }
}
    
?>   
