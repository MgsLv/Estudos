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
    <link rel="stylesheet" href="css/posCadastro.css">
    <title>Index</title>
</head>
<body>
    <form method="post" action="listar.php">
        <button type="submit" name="botao">Listar Usuários</button><br>
    </form>

    <form method="post" action="editar.php">
        <button type="submit" name="botao">Editar Usuários</button><br>
    </form>

    <form method="post" action="inserir.php">
        <button type="submit" name="botao">Inserir Usuário</button><br>
    </form>

    <form method="post" action="deletar.php">
        <button type="submit" name="botao">Deletar Usuário</button><br>
    </form>
</body>
</html>
