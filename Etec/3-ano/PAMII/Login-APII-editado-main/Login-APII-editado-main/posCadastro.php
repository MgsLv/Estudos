<?php
require 'Usuario.class.php';

// Instanciando o objeto Usuario fora do bloco condicional
$usuario = new Usuario();

if (isset($_POST['nome'])) { 
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $con = $usuario;  // O $con pode ser removido, pois já é uma instância de Usuario

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

$usuarios = [];

// Agora a variável $usuario foi corretamente instanciada e pode ser utilizada aqui
$usuarios = $usuario->listarUsuarios();


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
            <button type="submit" onClick="mostrar('listar')">Listar Usuários</button>


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
                    <td><?php echo (htmlspecialchars($user['id'])); ?></td>
                    <td><?php echo (htmlspecialchars($user['nome'])); ?></td>
                </tr>
            <?php endforeach; ?>        
        </table>
    </div>
    
    <script>
        function mostrar(id) {
            const div = document.getElementById('listar');
            if (div.style.display === "none" || div.style.display === "") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
    </script>
</body>
</html>

