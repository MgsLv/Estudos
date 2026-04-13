<?php
require 'Usuario.class.php';

$usuario = new Usuario();

$nome  = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$usuario->cadastrar($nome, $email, $senha);

echo "Usuário cadastrado com sucesso, seja bem vindo(a)!<br>";
echo "+=======================+=======================+==================+<br>";
echo "| Nome: $nome | Email: $email | Senha: $senha |<br>";
echo "+=======================+=======================+==================+<br>";
?>