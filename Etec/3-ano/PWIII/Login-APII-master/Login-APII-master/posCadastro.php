<?php
require 'Usuario.class.php';

if (isset($_POST['nome'])) { 
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $con = $usuario = new Usuario();

    if (!$con) {
        echo "<script>
            confirm('Erro ao conectar. Tente novamente!')
        </script>";
    } else {
        $existe = $usuario->chkUser($email);
        
        if ($existe) {
            echo "<script>
                confirm('USUÁRIO já cadastrado.');
                window.location.href = 'cadastro.php';
            </script>";
            exit;
        } else {
            $exito = $usuario->cadastrar($nome, $email, $senha);
            
            if ($exito) {
                echo "<script>
                    confirm('Cadastro realizado com sucesso.');
                    window.location.href = 'posCadastro.php';
                </script>";
                exit;
            } else {
                echo "<script>
                    confirm('Erro ao CADASTRAR. Tente novamente mais tarde!')
                </script>";
                header("Location: cadastro.php");
                exit;
            }
        }   
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

