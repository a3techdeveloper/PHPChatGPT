<!DOCTYPE html>
<?php
session_start();

include_once 'UsuarioDAO.class.php';

if(@!$_SESSION['autenticado']) {
    echo "<script>alert('Acesso negado, favor efetuar o login'); location='index.php'</script>";
}

if (filter_input(INPUT_GET, "sair") == "ok") {
    UsuarioDAO::deslogar();
}
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema Web</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .navbar {
                background-color: #007bff; /* Cor de destaque para a barra de navegação */
            }
            .navbar-brand, .nav-link {
                color: #fff !important; /* Cor branca para o texto na barra */
            }
            .navbar-brand:hover, .nav-link:hover {
                color: #f8f9fa !important; /* Cor mais clara ao passar o mouse */
            }

            .jumbotron {
                margin-top: 100px;
                background-color: #f8f9fa;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .jumbotron h1 {
                font-size: 2.5rem;
            }
            .jumbotron p {
                font-size: 1.2rem;
            }
        </style>
    </head>
    <body>

        <!-- Barra de navegação -->
        <nav class="navbar navbar-expand-lg navbar fixed-top navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="?link=1">Sistema Web</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="?link=2">Cadastrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?link=3">Listar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?sair=ok" 
                               onclick="return confirm('Deseja sair do sistema?')">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Conteúdo principal -->
        <?php
        $link = filter_input(INPUT_GET, "link") ?
                filter_input(INPUT_GET, "link") : 1;

        $pag[1] = "inicio.php";
        $pag[2] = "formCadastra.php";
        $pag[3] = "listar.php";
        $pag[4] = "formEdita.php";

        if (file_exists($pag[$link])) {
            include_once $pag[$link];
        }
        ?>

        <!-- Bootstrap JS and Popper -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
</html>
