<?php
require 'Usuario.class.php';

$sucesso = $usuario = new Usuario();
if( $sucesso ) {
    echo "Show de bola";
} else {
    echo "Não deu";
}

?>