<?php
require "Contato.class.php";

// Checar se foi clicado no blotão enviar dados
if( isset($_POST['email'])) {
    //Copiar do post para variaveis locais 
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //Intanciar a classe em uma variavel $contato
    $contato = new Contato();

    //Acessar o metodo checkUser enviando o email que foi digitado no formulário
    $chkUser = $contato->checkUser($email);

    if( !empty($chkUser) ) {
        echo "<script>
            alert('Usuario já cadastrado!')
        </script>";
    } else {
        $contato->insertUser($nome, $email, $senha);
    }
} 

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="topo cor">
        <div class="data cor borda">
        
        </div>
        <spam class="fonte">
            Logomarca
        </spam> 
    </div>

    <div class="centraliza">
        <div class="formulario interna">
            <h3>Cadastro</h3>
            <form action="" method="post">
                
                Nome:
                <input type="text" name = "nome" required class="i1">
                Email:
                <input type="text" name = "email" required class="i1">
                Senha:
                <input type="password" name = "senha" required class="i1">

                <p><a href="forgotpass.html" class = "esqueceu" >Esqueceu a senha?</a></p>
                <a href="login.php" class = "esqueceu">Já possui conta? Faça login</a>
                <input type="submit" name = "botao" value = "Enviar Dados" class = "centralizaBotao">
            </form>
        </div>
    </div>    
</body>
</html>
