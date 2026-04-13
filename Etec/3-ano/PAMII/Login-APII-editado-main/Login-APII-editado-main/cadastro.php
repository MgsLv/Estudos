<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="estilo-container">
            <form action = "posCadastro.php" method = "post">
                <h3 class="titulo">Cadastro</h3>
                <h3><b>Nome</b></h3>
                <input type="text" name="nome" placeholder="Digite um Nome"> <br>
                <h3><b>Email</b></h3>
                <input type="text" name="email" placeholder="Digite um Email"> <br>
                <h3><b>Senha</b></h3>
                <input type="password" name="senha" placeholder="Digite um Senha"> <br>
                <div class="link-conta">
                    <a href="login.php" class="conta">Já tenho conta</a>
                </div>

                <input type="submit" class="botao" value = "Cadastrar">   
            </form>
        </div>
    </div>     
</body>
</html>