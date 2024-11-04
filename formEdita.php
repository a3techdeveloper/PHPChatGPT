<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edição de Usuário</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
                height: 100vh;

                align-items: center;
                justify-content: center;
            }
            .form-container {
                margin: 100px auto;
                background-color: white;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 500px;
            }
            h2 {
                margin-bottom: 20px;
                text-align: center;
            }
            .btn-edit {
                background-color: #ff9900;
                color: white;
            }
            .btn-edit:hover {
                background-color: #ff9900;
            }
        </style>
    </head>
    <body>
        <?php
        include_once 'Usuario.class.php';
        include_once 'UsuarioDAO.class.php';

        $id = filter_input(INPUT_GET, "id");

        $u = new Usuario();
        $u->setId($id);

        $uDAO = new UsuarioDAO();
        $valor = $uDAO->seleciona($u);

        if (filter_input(INPUT_POST, "editar")) {

            $nomeCompleto = filter_input(INPUT_POST, "nomeCompleto");
            $email = filter_input(INPUT_POST, "email");
            $usuario = filter_input(INPUT_POST, "usuario");
            $senha = filter_input(INPUT_POST, "senha");

            $u->setNomeCompleto($nomeCompleto);
            $u->setEmail($email);
            $u->setUsuario($usuario);
            $u->setSenha($senha);

            if ($uDAO->edita($u)) {
                echo "<script>alert('Cadastro editado com sucesso');
                                            location='principal.php?link=3'</script>";
            }
        }
        ?>
        <div class="form-container">
            <h2>Edição de Usuário</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="nomeCompleto" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nomeCompleto" 
                           name="nomeCompleto" value="<?= $valor->nomecompleto ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" 
                           name="email" value="<?= $valor->email ?>">
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" class="form-control" id="usuario" 
                           name="usuario" value="<?= $valor->usuario ?>">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" 
                           name="senha" value="<?= $valor->senha ?>">
                </div>
                <input type="submit" class="btn btn-edit w-100" name="editar" 
                       value="Editar" onclick="return confirm('Deseja editar este cadastro?')">
            </form>
        </div>

        <!-- Bootstrap JS and Popper -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
</html>
