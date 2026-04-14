<?php
    session_start();
    require_once('conexao.php');
    if(!isset($_SESSION['email']) || $_SESSION['nivel'] != 'admin'){
        header("Location:index.php");
        exit;
    }
    
    $id = $_GET['id'];

    try{
    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    header('Location: admin.php');
    exit;
    } catch(PDOException $e){
        echo 'Erro ao excluir: ' .$e->getMessage();
    }
?>