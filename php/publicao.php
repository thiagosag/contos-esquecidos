<?php
    session_start();
    if(!isset($_SESSION['email']) || $_SESSION['nivel'] != 'admin'){
        header("Location:index.php");
        exit;
    }
    
    require_once('conexao.php');
    if(isset($_POST['enviarPost'])){
        $titulo = $_POST['titulo'];
        $resumo = $_POST['resumo'];
        $conteudo = $_POST['conteudoFinal'];
        $imagem = $_POST['imagem'];
        
        $sql = "INSERT INTO posts (titulo, resumo, conteudo, imagem, criado_em)
                VALUES (?, ?, ?, ?, NOW())";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titulo, $resumo, $conteudo, $imagem]);
        echo "<p>Post criado com sucesso!</p>";
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
                    <ul class="navbar nav-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="admin.php">Inicio Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Index</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <section>
            <div class="container">
                <div id="fundo">
                    <div class="d-flex justify-content-center">
                        <div class="" id="formPost">
                            <div class="mb-4 bg">
                                <h1>Configurar nova postagem.</h1>
                            </div>
                            <form method="POST">
                                <h5>Título da postagem.</h5>
                                    <input name="titulo" type="text" placeholder="Digite algo criativo..." required>
                                <h5>Resumo da publicação.</h5>
                                    <textarea name="resumo" placeholder="Adicione um resumo." required></textarea>
                                <h5>Faça o upload da imagem.</h5>
                                    <input name="imagem" type="text" placeholder="Link da imagem..." required>
                                <h5>Digite o conteúdo da publicação.</h5>
                                    <textarea id="conteudo" name="conteudoFinal" placeholder="Todo conteúdo para publicação."></textarea>
                                <div class="mt-3">
                                    <button class="btn btn-dark" type="submit" name="enviarPost">Enviar publicação.</button>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once('verificaLogin.php');?>
    </body>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        tinymce.init({
        selector: '#conteudo',
        height: 400,
        menubar: false,
        plugins: [
            'lists link image preview code'
        ],
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code'
        });
    </script>
</html>