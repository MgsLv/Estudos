<?php
include 'Contato.class.php';

$contato = new Contato();

$resultado = $contato->checkUser("fabioclaret@gmail.com");
if(!empty($resultado) ){
    echo "
    <script>
        alert('Usuario ja cadastrado')
    </script>";
}else{
    $contato->insertUser("nome" , "fabioclaret@gmail.com" , "senha");
}
