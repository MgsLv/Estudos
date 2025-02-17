<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Usuarios</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <section>
        <div class="container">
            <div class="centraliza">
                <h3 style="text-align: center;">Cadastrar</h3>
                <form action="" method = "post">
                    <label for="nome"><b>Nome:</b></label>
                    <input type="text" name="nome" placeholder="Informe seu nome..." required>

                    <label for="email"><b>Email:</b></label>
                    <input type="text" name="email" placeholder="Informe seu email..." required>

                    <label for="senha"><b>Senha:</b></label>
                    <input type="password" name="senha" placeholder="Informe sua senha..." required><br><br>
                    
                    <input class="botao" type="submit" name="login" value="Fazer Login">
                    <input class="botao" type="submit" name="cadastrar" value="Cadastrar">
                </form>
            </div>
        </div>
    </section>   
</body>
</html>

<?php
session_start();

include 'Contato.class.php';
$contato = new Contato();

if( isset($_POST['cadastrar'])){

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dados = $contato->checkUser($_POST['email']);

    if( !empty($dados)){
        echo "
        <script>
            alert('Usuario ja cadastrado')
        </script>";
    } else {
        $contato->insertUser($nome, $email, $senha);
        echo "
        <script>
            alert('Usuário cadastrado com sucesso!')
        </script>";
    }

} else if( isset($_POST['login']) ){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dados = $contato->checkUserPass($email, $senha);

    if( !empty( $dados ) ){
        $_SESSIION['nome'] = $dados['nome'];
        header("location:index.php");
    }

}
