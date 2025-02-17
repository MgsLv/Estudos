<?php
class Produto{
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $fornecedor;
    private $pdo;

    public function getId(){
        return $this->id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getPreco(){
        return $this->preco;
    }   

    public function getFornecedor(){
        return $this->fornecedor;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function setFornecedor($fornecedor){
        $this->fornecedor = $fornecedor;
    }

    /**
     * Método para conectar ao banco
     * Retorna Verdadeiro se conectar ou Falso se não conseguir
     */
    public function conectar(){
        try {
            $dsn    = "mysql:dbname=etimprodutoms;host=localhost"; 
            $dbUser = "root";
            $dbPass = "";

            $this->pdo = new PDO($dsn, $dbUser, $dbPass);
            echo "<h2>Conectado ao banco com sucesso!</h2>";
            return true;

        } catch (\Throwable $th) {
            echo "<h2>Sem conexão. Tente novamente mais tarde!</h2>";
            return false;
        }
    }    

    public function inserirProduto($nome, $descricao, $preco, $fornecedor) {
        // Verifica se há conexão antes de tentar inserir
        if (!$this->pdo) {
            if (!$this->conectar()) {
                return false; // Se não conectar, retorna falso
            }
        }

        try {
            // Passo 1: criar uma variável com a consulta
            $sql = "INSERT INTO produto SET nome = :n, descricao = :d, preco = :p, fornecedor = :f";

            // Passo 2: usar o método prepare
            $stmt = $this->pdo->prepare($sql);

            // Passo 3: para cada apelido, usar o bindValue
            $stmt->bindValue(":n", $nome);
            $stmt->bindValue(":d", $descricao);
            $stmt->bindValue(":p", $preco);
            $stmt->bindValue(":f", $fornecedor);

            // Passo 4: executar
            $stmt->execute();

            echo "<h2>Produto inserido com sucesso!</h2>";
            return true;

        } catch (\Throwable $th) {
            echo "<h2>Erro ao inserir produto: " . $th->getMessage() . "</h2>";
            return false;
        }

        //passo 1 criar uma variavel com a consulta
        $sql = "INSERT INTO produto SET nome = :n, descricao = :d, preco = :p, fornecedor = :f";

        #passo 2 usar o metodo prepare
        $sql = $this->$pdo->prepare($sql);

        #passo 3 pra cada apelido usar o bindValue
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":d", $descricao);
        $sql->bindValue(":p", $preco);
        $sql->bindValue(":f", $fornecedor);

        #passo 4 executar
        $sql->execute();
    }
}
