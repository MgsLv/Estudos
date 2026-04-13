<?php
require 'Usuario.class.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $con = $usuario = new Usuario();

    if (!$con) {
        echo "<script>
            confirm('Erro ao conectar. Tente novamente!')
        </script>";
    }

    $existe = $usuario->chkUser($email);

    if ($existe) {
        $senhaCorreta = $usuario->chkPass($email, $senha);
        
        if ($senhaCorreta) {
            echo "<script>
                confirm('Login efetuado com sucesso, bem vindo(a)!');
                window.location.href = 'posLogin.php';
            </script>";
            exit;
        } else {
            echo "<script>
                confirm('USUÁRIO ou SENHA incorretos. Tente novamente!');
                window.location.href = 'login.php';
            </script>";
        }
    } else {
        echo "<script> 
            alert('Usuário não encontrado!');
        </script>";
        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="estilo-container">
            <form action="login.php" method="post">
                <h3 class="titulo">Login</h3>
                <h3><b>Email</b></h3>
                <input type="text" name="email" placeholder="Digite um Email" required> <br>
                <h3><b>Senha</b></h3>
                <input type="password" name="senha" placeholder="Digite uma Senha" required><br>
                <div class="link-conta">
                    <a href="cadastro.php" class="conta">Não tenho conta</a>
                </div>
                
                <input type="submit" class="botao" value="Entrar">   
            </form>
        </div>
    </div>     
</body>
</html>