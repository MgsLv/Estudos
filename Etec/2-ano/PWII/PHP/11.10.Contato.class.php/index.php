<?php
session_start();

if( isset($SESSION['nome']) ){
    $nome = $_SESSION['nome'];
    echo "Bem vindo à nossa página $nome";
} else {
    header("location:login.php");
}
