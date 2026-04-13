<?php
require 'Produto.class.php';
if( isset($_POST['nome']) ){
    $nome = $_POST['nome'];
    $descricao = $_POST['desc'];
    $preco = $_POST['preco'];
    $fornecedor = $_POST['forn'];

    // echo "Produto ....:" .$nome."<br>";
    // echo "Descrição ....:" .$descricao. "<br>";
    // echo "Preço ....:" .$preco. "<br>";
    // echo "Fornecedor ....:" .$fornecedor."<br>";

    $produto = new Produto();
    $produto->inserirProduto($nome, $descricao, $preco, $fornecedor);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="centraliza">
            <form action="" method="post">
                Nome:<br>
                <input type="text" name="nome">
                Descrição:<br>
                <input type="text" name="desc">
                Preço:<br>
                <input type="text" name="preco">
                Fornecedor:<br>
                <input type="text" name="forn">
                <input type="submit" class="botao" value="Cadastrar">
            </form>
        </div>
    </div>
</body>
</html>
