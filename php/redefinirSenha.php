<?php
    require_once('conexao.php');
    $email = $_SESSION['email'];

    if(isset($_POST['alteraSenha'])){
        $senha1 = $_POST['senha1'];
        $senha2 = $_POST['senha2'];

        if($senha1 != $senha2){
            echo 'Senhas não coincidem';
            exit;
        } else {
            $senha1 = $_POST['senha1'];
            $senhaHash = password_hash($senha1, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios 
                    SET senha = ?
                    WHERE email = ?
                    ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$senhaHash, $email]);
            header('Location: saindo.php');
            exit;
        }
    }


?>