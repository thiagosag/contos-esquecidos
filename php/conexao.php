<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=blog", "root", "");
    #$pdo = new PDO -> Objeto de Conexao.
    #("mysql:host=localhost;dbname=blog", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #$pdo->setAttribute | selencionado um método do objeto PDO. 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Erro na conexão: " . $e->getMessage());
}
?>