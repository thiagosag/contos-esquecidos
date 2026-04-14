<?php
    session_start();
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    require_once "conexao.php";
    require_once "redefinirSenha.php";
    try{
        $sql = "SELECT nomeUsuario FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql); 
        $stmt->execute([$_SESSION['email']]);  
        $nomeUsuario = $stmt->fetch(PDO::FETCH_ASSOC);  
        # ”fetchAll” RETORNA TODOS OS RESULTADOS DE UMA SÓ VEZ. / ”PDO::FETCH_ASSOC” retorna em ARRAY. 
        $_SESSION['usuario'] = $nomeUsuario;
    } catch(PDOException $e){
        echo 'Erro encontrado, vejas os detalhes: ' .$e->getMessage();
    }

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
                            <div id="containerPesquisa" class="d-flex" >
                                <input type="text" id="buscaTerrorCaixa" placeholder="Ex: histórias de terror...">
                                <button type="submite" id="botaoSearch"><span class="material-icons">search</span></button>
                            </div>
                            <ul class="navbar-nav ms-auto"> 
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                                </li>
                                <li>
                                    <a id="sair" class="nav-link active" href="saindo.php">Sair</a>
                                </li>
                            </ul>
                        </div>
                </div>
            </nav>
        </header>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-6" style="margin-top: 60px">
                        <div class="d-flex " >
                            <div id="divPerfil" style="margin-right: 30px">
                                <img src="../../img/anime.jpg" class="img-fluid" id="iconPerfil">
                            </div>
                            <div class="align-self-center">
                                <h1><?php echo $nomeUsuario['nomeUsuario'];?></h1>
                                <p>Olá! Gosto de histórias...</p>
                                <div>
                                    <form method="POST" name="senhaNova">
                                        <input type="password" placeholder="Nova senha..." name="senha1" required>
                                        <input type="password" placeholder="Digite novamente..." name="senha2" required>
                                        <button type="submit" class="btn btn-dark" name="alteraSenha">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                            <div clas="comentários">
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