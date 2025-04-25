<?php
require 'Usuario.class.php';

$usuario = new Usuario();

$email = $_POST['email'];
$senha = $_POST['senha'];
$usuario->chkUser($email, $senha);
$usuario->chkPass

echo "Nome: $nome | Email: $email | Senha: $senha";
