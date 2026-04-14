<?php
    session_start();
    require_once('conexao.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $sql = "SELECT * FROM usuarios WHERE email_verificado AND id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC); #RETORNA EM ARRAY;

        if($user AND password_verify($senha, $user['senha'])){
            $_SESSION['verificado'] = $user['email_verificado'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['usuario'] = $user['nomeUsuario'];
            $_SESSION['nivel'] = NULL;

                if($_SESSION['verificado'] === 1){
                    $_SESSION['nivel'] = $user['nivel'];
                    header("Location: admin.php");
                    exit;
                }
                else{
                    header("Location: validaNaoVerificado.php");
                    exit;
                }
        }else{
            header("Location: login.php?erro=1");
            exit;
        }
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
                    <a class="navbar-brand" href="index.php"><img src="../../img/logo.png" height="50"/></a> <!--Adicionar a logo do site no canto esquerdo superior-->
                        <ul class="navbar-nav ms-auto"> 
                             <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="cadastro.php">Cadastre-se</a>
                            </li>
                        </ul>
                </div>
            </nav>
        </header>
        <section>
            <div class="container">
                <div id="fundo">
                    <div class="d-flex justify-content-center">
                        <div class="" id="form">
                            <div class="mb-4 bg">
                                <h1>Faça login...</h1>
                            </div>
                            <form method="POST">
                                <h5>Seu e-mail.</h5>
                                <input type="email" name="email" placeholder="Digite seu e-mail..." required>
                                <h5>Sua senha.</h5>
                                <input type="password" name="senha" placeholder="Digite uma senha..." required>
                                <button class="btn btn-dark" type="submit">Entrar</button>
                                <div>
                                    <?php
                                        if(isset($_GET['erro'])){
                                            echo "Usuario ou senha inválidos.";
                                       ?>
                                            <script>
                                                window.history.replaceState({}, document.title, "login.php");
                                            </script>
                                    <?php }?>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>