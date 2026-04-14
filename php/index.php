<?php
    session_start();
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    require_once "conexao.php";

    try{
        $sql = "SELECT * FROM posts ORDER BY criado_em DESC";
        $stmt = $pdo->prepare($sql); 
        $stmt->execute(); 
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        # ”fetchAll” RETORNA TODOS OS RESULTADOS DE UMA SÓ VEZ. / ”PDO::FETCH_ASSOC” retorna em ARRAY. 
    } catch(PDOException $e){
        echo 'Erro encontrado, vejas os detalhes: ' .$e->getMessage();
    }
?>

<html lang="pt-br">
    <head>
        <link rel="icon" type="image/x-icon" href="../../img/logo.png">
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
                                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                                </li>
                                <li>
                                    <a id="conta" class="nav-link active" href="profile.php">Perfil</a>
                                </li>
                                <li>
                                    <a id="sair" class="nav-link active" href="saindo.php">Sair</a>
                                </li>
                                <li id="logado" class="nav-item">
                                    <a class="nav-link active" href="login.php">Login</a>
                                </li>
                                <li id="cadastrado" class="nav-item">
                                    <a class="nav-link active" href="cadastro.php">Cadastre-se</a>
                                </li>
                                
                            </ul>
                        </div>
                </div>
            </nav>
        </header>
        <section>
            <div class="container">
                <div class="row">
                    <?php foreach($posts as $post): ?>
                    <div class="col-4">
                        <div class="postSimples">
                            <h2><?=$post['titulo']?></h2>
                            <img class="postDesign" src="<?=$post['imagem']?>" class="img-fluid">
                            <p><?=$post['resumo']?></p>
                            <a href="loreExplicada.php?id=<?php echo $post['id'];?>"><button class="btn btn-dark">Ler mais...</button></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <hr>
        </section>
        <?php require_once('verificaLogin.php');?>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>