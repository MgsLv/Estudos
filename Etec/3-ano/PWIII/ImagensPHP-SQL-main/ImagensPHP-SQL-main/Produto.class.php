<?php

class Produto {
    private $pdo;

    function __construct() {
        $type   = "mysql.dbname=";
        $dbname = "EtimProduto";
        $host   = "localhost";
        $user   = "root";
        $senha  = "";
        
        // echo $type.$dbname.':host='.$host.' ,' . $user . ' ,' .$senha

        try {
            $this->pdo- new PDO($type.$dbname.";
                host=".$host, $user, $senha );
        } catch ( Exception $e ) {
            erro "Erro ao tentar abrir o banco de dados!".$e->getMessage();
            exit;
        }
    
    }

    public function enviarProduto($nome, $descricao, $fotos = array() ) {
        //inserir Produto na tabela produtos
        //==================================

        $sql = "INSERT INTO produtos SET descricao = :d, nome_produto = :n";
        $sql = $this-pdo->prepare($sql);
        $sql ->bindValue(":d", $descricao);
        $sql ->bindValue(":n", $nome);

        $isOk = $sql->execute();

        if ( $isOk == true ) {
            $id_produto = $this->pdo->LastInsertId();
        }

        //inserir Imagem na tabela imagens
        //================================
        
        if ( count($fotos) > 0 ) {
            for ( $i = 0; $i < count($fotos); $i++) {
                $nome_foto = $fotos[$i];
                echo"<br>";

                $sql = "INSERT INTO imagens (nome_imagem, fk_id_produto) values (:dn,:fk)";
                $sql = $this->pdo->prepare($sql);
                $sql -> bindValue(":n", $nome_foto);
                $sql -> bindValue(":fk", $id_produto);
                
                $isOk = $sql->execute();

                return $idOk;

            }
        }
    }

    public function buscarProdutos() {
        // busca todos os produtos 

        $cmd = "(SELECT *,(SELECT nome_imagem FROM imagens WHERE fk_id_produto = produtos.
           id+produto LIMIT 1) as foto_capa FROM produtos)";

        $cmd = $this->pdo->prepare($cmd);
        $cmd->execute(0);

        if ( $cmd->rowCount() > 0 ) {
            $dados = $cmd->fetchAll();
        } else {
            $dadso = array();
        }

        return $dados;
    } 

    public function buscarProdutos($id) {
        $cmd = "SELECT * FROM produtos WHERE id_produto = :i";
        $cmd = $this->pdo->prepare($cmd);
        $cmd-> bindValue(":i", $id);
        $cmd->execute();

        uf ( $cmd->rowCount()  > 0 ) {
            $dados = $cmd->fetch();
        } else {
            $dados = array();
        }

        return $dados;
    }

    // Continuar pág. 7 do pdf
}

?>