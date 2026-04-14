<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();}
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    require_once('conexao.php');

    if(!isset($_SESSION['email']) || $_SESSION['nivel'] != 'admin'){
        header("Location:index.php");
        exit;
    }

    try{
        $sql = "SELECT * FROM posts ORDER BY criado_em DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        echo 'Erro encontrado, veja os detalhes: ' .$e->getMessage();
    }
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
        <script src="../js/script.js"></script>
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
                                <a class="nav-link active" href="publicao.php">Publicar</a>
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
                <div class="">
                    <h1>Posts</h1>
                    <div class="d-flex justify-content-center">
                        <?php foreach($posts as $post):?>
                            <div class="postSimples redefiniLargura" style="border: solid gray 1px;">
                                <span style="color: black; font-size: 15px;"><strong>Data:</strong> <?= $post['criado_em']?>. <strong>ID:</strong> <?= $post['id']?></span>
                                <h2><?=$post['titulo']?></h2>
                                <img class="postDesign img-fluid" src="<?= $post['imagem']?>">
                                <p><?= $post['resumo']?></p>
                                <div id="ajustes" class="d-flex justify-content-center">
                                    <a href="loreExplicada.php?id=<?php echo $post['id'];?>"><button type="submite" class="botaoAjuste"><span name="edit" style="padding: 3px; border: solid 1px #51128C; color: #51128C;" class="material-icons">visibility</span></button></a>
                                    <a href="editar.php?id=<?php echo $post['id'];?>"><button type="submite" class="botaoAjuste"><span name="edit" style="padding: 3px; border: solid 1px #127A8C; color: #127A8C;" class="material-icons">edit</span></button></a>
                                    <button type="submite" class="botaoAjuste"><span name="pause" style="padding: 3px; border: solid 1px green; color:green;" class="material-icons">pause</span></button>
                                    <a href="delete.php?id=<?=$post['id']?>" onclick="return confirm('Tem certeza que deseja deletar a publicão?');"><button type="submite" class="botaoAjuste"><span name="delete" style="padding: 3px; border: solid 1px red; color:red;" class="material-icons">delete</span></button></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
<?php require_once('verificaLogin.php');?>
