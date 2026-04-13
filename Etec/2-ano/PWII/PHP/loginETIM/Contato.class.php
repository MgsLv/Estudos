<?php

/**
 * @author Fabio Claret
 * data abril/2024
 * Classe com conexao a banco de dados
 * @return boolean 
 */

class Contato{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    function getId(){
        return $this->id;
    }
    function getNome(){
        return $this->nome;
    }
    function getEmail(){
        return $this->email;
    }
    function getSenha(){
        return $this->senha;
    }

    function setNome($nome){
        $this->nome = $nome;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }

    function __construct(){
        #o PDO precisa de 3 parametros
        $dsn    = "mysql:dbname=etimcontato;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass);
           /* echo "<script>
                    alert('Conectado ao banco')
                 </script>";
           */               
        } catch (\Throwable $problema) {
            echo "<script>
                    alert('Banco indisponivel. Tente mais Tarde!!')
                 </script>";
            //echo $problema;     
        } 
    }

   
    function insertUser($nome, $email, $senha){
        // passo 1 - criar uma variavel com a consulta SQL
        
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";

        // passo 2 - Quando tem apelidos, temos que usar o metodo prepare
        $sql = $this->pdo->prepare($sql);
        
        // passo 3 - depois do prepare, usar o bindValue, um pra cada apelido
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", $senha);

        // passo 4 - executar o comando
        return $sql->execute();
    }

    function checkUserPass($email, $senha){
        $sql = "SELECT *FROM usuarios WHERE email = :e AND senha =:s";
        $sql = $this->pdo->prepare($sql);
        
        $sql-> bindValue(":e", $email);
        $sql-> bindValue(":s", $senha);
        $sql->execute();
        
        if( $sql->rowCount() > 0 ){
            $dados = $sql->fetch();            
        }else{
            $dados = array();
        }
        
        return $dados;
    }

    
    function checkUser($email){
        $sql = "SELECT *FROM usuarios WHERE email = :e";
        $sql = $this->pdo->prepare($sql);

        $sql-> bindValue(":e", $email);
        $sql->execute();

        if( $sql->rowCount() > 0 ){
            $dados = $sql->fetch();            
        }else{
            $dados = array();
        }

        return $dados;
    }
    
}
