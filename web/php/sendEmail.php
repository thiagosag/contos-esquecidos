<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once('conexao.php');
    require '../../vendor/autoload.php';
    require_once 'code.php';

    function enviaEmail($email, $token){

    // Email desabilitado;
    // Confirguração ativa em: http://www.contosesquecidos.great-site.net/

    return true; // ou false dependendo do modo debug
}
        
?>