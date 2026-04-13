<?php
require 'Usuario.class.php';

$usuario = new Usuario();

$usuarios = [];

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $con = $usuario;

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

// Agora a variável $usuario foi corretamente instanciada e pode ser utilizada aqui
if (isset($_POST['botao'])) {
    $usuarios = $usuario->listarUsuarios();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Index</title>
</head>
<body>
    <div class="topo">
        <h2>Tela de Comando</h2>
    </div>

    <div class="centraliza">
        <div class="botoes">
            <form id="formListar" method="post" onsubmit="mostrar('listar'); return false;">   
                <button type="submit" name="botao">Listar Usuários</button>
            </form>

            <form method="post" action="editar.php">
                <button type="submit" name="botao">Editar Usuários</button>
            </form>

            <form method="post" action="inserir.php">
                <button type="submit" name="botao">Inserir Usuário</button>
            </form>

            <form method="post" action="deletar.php">
                <button type="submit" name="botao">Deletar Usuário</button>
            </form>
        </div>  
    </div>

    <div id="listar" style="display: none;">
        <h3 class="titulo">Listar Usuários</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
            <?php foreach ($usuarios as $user): ?>
                <tr>
                    <th><?php echo (htmlspecialchars($user['id'])); ?></th>
                    <th><?php echo (htmlspecialchars($user['nome'])); ?></th>
                </tr>
            <?php endforeach; ?>        
        </table>
    </div>
    
    <script>
        function mostrar(id) {
            const div = document.getElementById(id);
            if (div.style.display === "none" || div.style.display === "") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
    </script>
</body>
</html>