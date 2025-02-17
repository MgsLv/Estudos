
  <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inserir Usuários</title>
</head>
<body>
    <div class="container">
        <div class="centraliza">
            <form action="" method="post">

                
                <label for=""><b>Email:</label>
                <input type="text" name="email" placeholder="Informe seu email ...">

                <label for=""><b>Senha:</label>
                <input type="text" name="senha" placeholder="Informe sua senha ...">

                <br>

                <input type="submit" class="botao" value="Cadastrar">

                <br>

                <a href="cadastrar.php">Não sou cadastrado </a>

            </form>
        </div>
    </div>
</body>
</html>
<?php
if( isset($_POST['nome']) ){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // echo "Nome ....:" .$nome."<br>";
    // echo "Email ....:" .$email. "<br>";
    // echo "Senha ....:" .$senha. "<br>";

    include 'Contato.class.php';
    $contato = new Contato();
    $contato->usuarioExiste($email);
}
?>
