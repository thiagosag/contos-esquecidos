<?php
    session_start();
    session_destroy();
    require_once "conexao.php";
    #REDIRECIONAMENTO
    header('Location: index.php');
    echo 'Saindo.'
?>