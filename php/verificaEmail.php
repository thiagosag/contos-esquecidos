<?php
    session_start();
    require_once('conexao.php');

    $token = $_GET['token'] ?? NULL;
    if(!$token){
        die('Token inválido');
    }
    else{
        $sql = "SELECT * FROM usuarios 
                WHERE verify_token = ?
                AND token_expira > NOW();";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "UPDATE usuarios
                SET email_verificado = 1, verify_token = NULL
                WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user['id']]);

        echo "<h2>Email verificado com sucesso!</h2>";
        echo "<p>Agora você pode fazer login normalmente.</p>";
        echo '<a href="login.php">Ir para login</a>';
    }
?>