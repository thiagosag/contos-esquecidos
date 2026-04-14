<?php 
    session_start();
    require_once('conexao.php');
    if (!isset($_SESSION['email_token'])) { #Verifica
        die("Acesso inválido.");
    };
    $token = $_SESSION['email_token'];
    $link = "http://localhost/..."; // apenas para desenvolvimento local .$token;
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
                    <a class="navbar-brand" href="#"><img src="../../img/logo.png" height="50"/></a> <!--Adicionar a logo do site no canto esquerdo superior-->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">  <!--Adiciona botão hamburguer-->
                        <span class="navbar-toggler-icon"></span> <!--Icone de Hamburguer padrão!-->
                    </button>
                        <div class="collapse navbar-collapse"  id="navbarNav">
                            <ul class="navbar-nav ms-auto"> 
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                                </li>
                                <li>
                                    <a id="sair" class="nav-link active" href="saindo.php">Sair</a>
                                </li>
                                <li id="logado" class="nav-item">
                                    <a class="nav-link active" href="login.php">Login</a>
                                </li>
                            </ul>
                        </div>
                </div>
            </nav>
        </header>
        <section>
            <div id="fundo">
                <div class="d-flex justify-content-center">
                    <div id="form">
                        <div class="mb-4 bg">
                            <h1>Email reenviado</h1>
                            </div>
                                <p> Reenviamos um link para ativação da sua conta.
                                    Por favor, acesse sua caixa de entrada e clique no link para ativar sua conta.
                                    <br/>
                                    <a href="againEmail.php">Enviar novamente.</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once('verificaLogin.php');?>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>