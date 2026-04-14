<?php
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }

    if (isset($_SESSION['nivel']) && 
    ($_SESSION['nivel'] === 'user' || $_SESSION['nivel'] === 'admin')) {
    ?>
    <script>
        let logado = document.getElementById('logado');
        let cadastrado = document.getElementById('cadastrado');
        let conta = document.getElementById('conta');
        let sair = document.getElementById('sair');
        
        logado.style.display = 'none';
        cadastrado.style.display = 'none';
        conta.style.display = 'block';
        sair.style.display = 'block';
    </script>
    <?php } 
      if(!isset($_SESSION['nivel'])){
    ?>
    <script>
        sair.style.display = 'none';
        conta.style.display = 'none';
    </script>
    <?php } 
?>
