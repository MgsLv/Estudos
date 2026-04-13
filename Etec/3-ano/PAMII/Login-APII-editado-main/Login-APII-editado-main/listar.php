<?php
require 'Usuario.class.php';

$con = $usuario = new Usuario();

$usuarios = [];

if (!$con) {
    echo "<script>
            confirm('Erro ao conectar. Tente novamente!')
        </script>";
        return false;
} else {
    if (isset($_POST['botao'])) {
        $usuarios = $usuario->listarUsuarios();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listar.css">
    <title>Listar Usuários</title>
</head>
<body>
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

    <form method="post" action="inserir.php">
        <button class="ied" type="submit" >Inserir</button>
    </form>

    <form method="post" action="editar.php">
        <button class="ied" type="submit" >Alterar</button>
    </form>

    <form method="post" action="deletar.php">
        <button class="ied" type="submit" >Apagar</button>
    </form>

    <form action="posCadastro.php">
        <button class="voltar">Voltar</button>
    </form>        
</body>
</html>