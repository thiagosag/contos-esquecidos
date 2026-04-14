<?php
    session_start();
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    require_once "conexao.php";

    try{
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $editarPost = $stmt->fetchAll(PDO:: FETCH_ASSOC);
    } catch (PDOException $e){
        'Ocorreu um erro, tal és: ' .$e->getMessage();
    }

    if(isset($_POST['salvar'])){
        $titulo = $_POST['titulo'];
        $imagem = $_POST['imagem'];
        $resumo = $_POST['resumo'];
        $conteudo = $_POST['conteudo'];
        
        $sql = "UPDATE posts
                SET titulo = ?, imagem = ?, resumo = ?, conteudo = ?
                WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titulo, $imagem, $resumo, $conteudo, $id]);
        header('Refresh: 0');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
        <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Contos esquecidos.</title>
    </head>
    <body>
        <header>
            <!--Criar navbar padrão de navegação--> 
            <nav id="header" class="navbar navbar-expand-md"> 
                <div class="container"> <!--FLUID OUCUPA 100% DA PÁGINA-->
                    <a class="navbar-brand" href="index.php"><img src="../../img/logo.png" height="50"/></a> <!--Adicionar a logo do site no canto esquerdo superior-->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">  <!--Adiciona botão hamburguer-->
                        <span class="navbar-toggler-icon"></span> <!--Icone de Hamburguer padrão!-->
                    </button>
                        <div class="collapse navbar-collapse"  id="navbarNav">
                            <div id="containerPesquisa" class="d-flex" >
                                <input type="text" placeholder="Ex: histórias de terror...">
                                <button type="submite" id="botaoSearch"><span class="material-icons">search</span></button>
                            </div>
                            <ul class="navbar-nav ms-auto"> 
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                                </li>
                                <li>
                                    <a id ="conta" class="nav-link active" href="saindo.php">Perfil</a>
                                </li>
                                <li>
                                    <a id ="sair" class="nav-link active" href="saindo.php">Sair</a>
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
        <seaction>
            <div class="container" style="margin-top: 50px">
                <div class="row">
                    <?php foreach($editarPost as $postRenderiza):?>
                    <div class="col-8">
                        <div id="ajuste" class="">
                            <form method="POST">
                                <h3>Titulo</h3>
                                    <textarea name="titulo" required><?= $postRenderiza['titulo']?></textarea>
                                <h3>Imagem</h3>
                                    <textarea name="imagem" required><?= $postRenderiza['imagem']?></textarea>
                                <h3>Resumo</h3>
                                    <textarea name="resumo" required><?= $postRenderiza['resumo']?></textarea>
                                <h3>Conteudo</h3>
                                    <textarea name="conteudo" id="conteudoEdit" required><?= $postRenderiza['conteudo']?></textarea>
                                <?php endforeach;?>
                            <button class="btn btn-dark" type="submit" name="salvar">Salvar</button> 
                            </form>
                        </div>                 
                    </div>
                    <div class="col-4">
                        <?php foreach($editarPost as $visualizazPost): ?>
                        <div class="postSimples">
                            <h2><?=$visualizazPost['titulo']?></h2>
                            <img class="postDesign" src="<?=$visualizazPost['imagem']?>" class="img-fluid">
                            <p><?=$visualizazPost['resumo']?></p>
                            <a style="margin: 0px;" href="loreExplicada.php?id=<?php echo $visualizazPost['id'];?>"><button class="btn btn-dark">Ler mais...</button></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </seaction>
</html>
<?php require_once('verificaLogin.php');?>
<script>
    tinymce.init({
    selector: '#conteudoEdit',
    height: 300,
    menubar: false,
    plugins: [
        'lists link image preview code'
    ],
    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code'
    });
</script>