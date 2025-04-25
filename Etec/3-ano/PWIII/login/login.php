<?php
require 'Usuario.class.php';

$sucesso = $usuario = new Usuario();

if( $sucesso ){ 

}else{
    echo "<h1>Banco indisponivel. Tente mais tarde";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="estilo-container">
            <form action = "teste.php" method = "post">
                <h3 class="titulo">Login</h3>
                <h3><b>Nome</b></h3>
                <input type="text" name="nome" placeholder="Digite um Nome"> <br>
                <h3><b>Email</b></h3>
                <input type="text" name="email" placeholder="Digite um Email"> <br>
                <h3><b>Senha</b></h3>
                <input type="password" name="senha" placeholder="Digite um Senha"> <br>

                <input type="submit" class="botao" value = "Cadastrar">   
            </form>
        </div>
    </div>     
</body>
</html>