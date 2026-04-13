<?php

class Usuario {

    private $pdo;
    private $id;
    private $email;
    private $senha;

    function __construct() {
        $bd    = "mysql:host=localhost:dbname=UsuarioAPI";
        $user  = "root";
        $senha = "";

        try {
            $this->pdo = new PDO($db, $user, $senha);
                return true;
        } catch ( \Throwable $th ) {
           return false;
        }
    }

    
    public function getId() {
        return $this->id;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setEmail( $email ) {
        $this->email = $email;
    } 
    public function setSenha( $senha ) {
        $this->senha = $senha;
    }

    public function checkUser( $email ) {
        $sql  = "SELECT * FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);

        $stmt->execute();

        return $stmt > 0;
    }

    public function checkPass( $email, $senha ) {
        $sql  = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue("s", $senha);

        $stmt->execute();

        if ( $stmt->rowCount() > 0 ) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }


}


?>