<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="centraliza">
            <form action="" method="post">
                <label for="email"><b>Email:</b></label>
                <input type="text" name="email" placeholder="Informe seu email..." required>

                <label for="senha"><b>Senha:</b></label>
                <input type="password" name="senha" placeholder="Informe sua senha..." required>

                <br>

                <input type="submit" class="botao" value="Entrar">
                <br>
                <a href="cadastrar.php">Não sou cadastrado</a>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include 'Contato.class.php';
    $contato = new Contato();

    if ($contato->checkUserPass($email, $senha)) {
        // Redirecionar ou fazer algo se o login for bem-sucedido
        echo "<script>alert('Login bem-sucedido!');</script>";
    }
}
?>
