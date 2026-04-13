<?php
require 'Usuario.class.php';

if (isset($_POST['nome'])) { 

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $con = $usuario = new Usuario();

    if (!$con) {
        echo "<script>
            confirm('Erro aoi conectar. Tente novamente!')
        </script>";
    } else {
        $existe = $usuario->chkUser($email);
        if (!$existe) {
                $exito = $usuario->cadastrar($nome, $email, $senha);
                if ($exito) {
                    echo "<script>
                        confirm('Usário inserido com sucesso.')
                    </script>";
                } else {
                    echo "<script>
                        confirm('Erro ao INSERIR. Tente novamente mais tarde!')
                    </script>";
                }
        } else {
            echo "<script>
                        confirm('USUÁRIO já cadastrado.')
            </script>";
        }   
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inserir.css">
    <title>Inserir Usuário</title>
</head>
<body>
    <form action = "inserir.php" method = "post">
        <h3 class="titulo">Inserir Usuário</h3>
        <h3><b>Nome</b></h3>
        <input type="text" name="nome" placeholder="Digite um Nome"> <br>
        <h3><b>Email</b></h3>
        <input type="text" name="email" placeholder="Digite um Email"> <br>
        <h3><b>Senha</b></h3>
        <input type="password" name="senha" placeholder="Digite um Senha"> <br>

        <input type="submit" class="botao" value = "Inserir usuário"><br> 
        </form>
    <form action="posCadastro.php">
        <button class="voltar">Voltar</button>
    </form> 
</body>
</html>