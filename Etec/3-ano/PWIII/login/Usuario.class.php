<?php

class Usuario{
    
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    function __construct(){
        $dns    = "mysql:dbname:Usuario;host=localhost"; 
        $dbUser = "root";
        $dbPass = "";
        
        try{
            $this->pdo = new PDO($dns,$dbUser , $dbPass);
            echo "<script> alert('Conectado ao banco!')</script>";
            return true;
        } catch (Throwable $th){
            echo "<script> alert('Erro ao conectar ao banco! Tente mais tarde.')</script>";
            return false;
        }     
    }
    
    function cadastrar($nome, $email, $senha){
    
    }
    
    function apagar($id){
    
    }
    
    function editar($id, $nome, $email, $senha){
    
    }
    
    function chkUser($email){
    
    }
    
    function chkPass($email, $senha){
    
    }
}

?>