<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastrar</title>
</head>
<body>
    <div class="container">
        <div class="centraliza2">
            <form action="" method="post">
                <label for="nome"><b>Nome:</b></label>
                <input type="text" name="nome" placeholder="Informe seu nome..." required>

                <label for="email"><b>Email:</b></label>
                <input type="text" name="email" placeholder="Informe seu email..." required>

                <label for="senha"><b>Senha:</b></label>
                <input type="password" name="senha" placeholder="Informe sua senha..." required>

                <br>

                <input type="submit" class="botao" value="Cadastrar">
            </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include 'Contato.class.php';
    $contato = new Contato();

    if (!$contato->checkUser($email)) { // Verifica se o usuário já existe
        $contato->insertUser($nome, $email, $senha);
    } else {
        echo "<script>alert('Esse usuário já existe!');</script>";
    }
}
?>
