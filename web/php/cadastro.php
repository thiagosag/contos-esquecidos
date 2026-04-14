<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();}
    require_once('conexao.php');
    require('code.php')
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Contos esquecidos.</title>
    </head>
    <body>
        <header>
            <!--Criar navbar padrão de navegação--> 
            <nav id="header" class="navbar navbar-expand-md"> 
                <div class="container"> <!--FLUID OUCUPA 100% DA PÁGINA-->
                    <a class="navbar-brand" href="index.php"><img src="../../img/logo.png" height="50"/></a> <!--Adicionar a logo do site no canto esquerdo superior-->
                        <ul class="navbar-nav ms-auto"> 
                             <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="login.php">Login</a>
                            </li>
                        </ul>
                </div>
            </nav>
        </header>
        <section>
            <div class="container">
                <div id="fundo">
                    <div id="form">
                        <div class="mb-4 bg">
                            <h1>Cadastre-se, é rápido</h1>
                        </div>
                        <form action="code.php" method="POST">
                            <h5>Seu e-mail.</h5>
                            <input type="email" name="email" placeholder="Digite seu e-mail..." required>
                                <h5>Nome de usuario.</h5>
                            <input type="text" name="usuarioName" placeholder="Seja criativo..." required>
                            <h5>Sua senha.</h5>
                            <input type="password" name="senha" placeholder="Digite uma senha..." required>
                            <h5>Repita a senha.</h5>
                            <input type="password" name="confirmaSenha" placeholder="Digite uma senha..." required>
                            <button class="btn btn-dark" type="submit" name="register_button">Cadastre-se</button>
                        </form> 
                    </div>
                </div>
            </div>
        </section>
</body>