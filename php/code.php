<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (session_status() === PHP_SESSION_NONE) {
    session_start();

    require_once('conexao.php');
    require_once('sendEmail.php');
    
    }
    if(isset($_POST['register_button'])){
        var_dump('Entrou no code.');
        $email = $_POST['email'];
        $usuarioName = $_POST['usuarioName'];
        $senha = $_POST['senha'];
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT); 
        $confirmaSenha = $_POST['confirmaSenha'];
        $token = bin2hex(random_bytes(32));
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $_SESSION['email_token'] = $token;

        if(!($senha === $confirmaSenha)){
            header('Location: cadastro.php');
            #NÃO EXIBE FEEDBACK;
            exit;
        };

        $sql = "SELECT email FROM usuarios WHERE email = ? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $checkEmail = $stmt->fetch(); #retorna todos os dados conforme for verdadeiro.
        if($checkEmail){
            $_SESSION['status'] = 'Email ID alredy Exists';
            #NÃO EXIBO FEEDBACK;
            header('Location: cadastro.php');
            exit;
        }else{
            $stmt = $pdo->prepare("
                INSERT INTO usuarios 
                (nomeUsuario, email, senha, verify_token, token_expira)
                VALUES 
                (:nome, :email, :senha, :token, :expira)
            ");

            $stmt->execute([
                ':nome' => $usuarioName,
                ':email' => $email,
                ':senha' => $senhaHash,
                ':token' => $token,
                ':expira' => $expira
            ]);
            var_dump('Inseriu no banco');
            
            if (enviaEmail($email,$token)) {
            echo "email enviado";
            header('Location: cadastroFeito.php');
            exit;
            } else {
                echo "erro ao enviar email";
            }
            header('Location: cadastroFeito.php');
        };
    }
?>