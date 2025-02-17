<?php
session_start();

if( isset( $_SESSION['nome'])){
    $nome = $_SESSION['nome'];
    echo "Bem vindo a nossa pagina"; 
    echo "<h3>".$nome."</h3>";
}else{
    
}

?>
