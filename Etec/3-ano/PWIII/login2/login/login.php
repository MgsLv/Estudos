<?php
require 'Usuario.class.php';

$sucesso = $usuario = new Usuario();
if( $sucesso ) {
    $user = $usuario->chk;

    if ( $user ) {
        echo "<h1>Cadastrado com sucesso!</h1>";
    } else {
        echo "<h1>Erro ao cadastrar</h1>";
    }
    
} else {
    echo "<h1>Não deu</h1>";
}

?>