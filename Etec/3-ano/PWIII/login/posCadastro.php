<?php
require 'Usuario.class.php';

if (isset($_POST['nome'])) { 

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //echo "Nome: $nome | Email: $email | Senha: $senha";

    $con = $usuario = new Usuario();

    if (!$con) {
        echo "<script>
            confirm('Erro aoi conectar. Tente novamente!')
        </script>";
    } else {
        $exito = $usuario->cadastrar($nome, $email, $senha);
        if ($exito) {
            echo "<script>
                confirm('Cadastrto realizado com sucesso.')
            </script>";
        } else {
            echo "<script>
                confirm('Erro ao CADASTRAR. Tente novamente mais tarde!')
            </script>";
        }

    }

} 


