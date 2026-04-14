<?php
session_start();
require_once ('conexao.php');
require_once ('sendEmail.php');

if($_SESSION['verificado'] === 0){
    $email = $_SESSION['email'];
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && !$user['email_verificado']){
            $token = bin2hex(random_bytes(32));
            $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $stmt = $pdo->prepare("UPDATE usuarios SET verify_token = ?, token_expira = ? WHERE id = ?");
            $stmt->execute([$token, $expira, $user['id']]);
            enviaEmail($email, $token);
            header('Location: emailReenviado.php');
        }
}else{ 
    header('Location: index.php');
    exit;
}
