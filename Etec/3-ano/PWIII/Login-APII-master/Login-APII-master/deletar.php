<?php
require 'Usuario.class.php';

$usuario = new Usuario();

if (isset($_POST['id'])) {
    $id  = $_POST['id'];

    $apagar = $usuario->apagar($id);
    if ($apagar) {
        echo "<script>
                confirm('Usuário deletado com sucesso.')
        </script>";
    } else {
        echo "<script>
                    confirm('Erro ao deletar usuário! Tente novamente.')
            </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/deletar.css" class="css">
    <title>Deletar Usuário</title>
</head>
<body>
    <form method="post" action="deletar.php">
        <h3 class="titulo">Deletar</h3>
        <h3 class="id"><b>ID</b></h3>
        <input type="text" name="id" placeholder="Digite um ID de usuário para ser deletado"> <br>
        <input type="submit" class="botaoDeletar" value = "Deletar">   
    </form>
    <form action="posCadastro.php">
        <button class="voltar">Voltar</button>
    </form> 
</body>
</html>