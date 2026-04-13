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
        return $this->Id;
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
        $this->email-> $email;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }

    function __construct() {
        #o pdo precisa de 3 parametros
        $dsn    = "mysql:dbname=etimmscontato;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass);
            echo "<script>
                    alert('Conectar ao banco')
                 </script>"; 

        } catch (\Throwable $th) {
            echo "<script>
                    alert('Banco indisponivel. Tente mais tarde!!')
                 </script>"; 

        }
    }

    /**
     * @author Fabio Claret
     * data abril/2024
     * Metodo de conexao ao banco de dados
     * testar se conectou
     * @return boolean 
     */
}   
