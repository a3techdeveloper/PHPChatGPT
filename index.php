<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Sistema Utilizando PHP e ChatGPT</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
                height: 100vh;                
                align-items: center;
                justify-content: center;
            }
            .row{
                margin-top: 30px;
            }
            .login-container {
                background-color: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            .login-titulo img {
                display: block;
                width: 300px;
                margin-bottom: 20px;
            }
            #linha-titulo{
                margin-top: 60px;
            }
        </style>
    </head>
    <body>
        <div class="row" id="linha-titulo">
            <div class="offset-md-4 col-md-4 text-center">
                <div class="login-titulo">
                    <h3>Sistema Utilizando PHP e ChatGPT</h3>
                    <img class="mx-auto d-block" src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" alt="PHP Logo">
                </div>  
            </div>
        </div>
        <?php 
            session_start();
            
            include_once 'Usuario.class.php';
            include_once 'UsuarioDAO.class.php';
            
            $u    = new Usuario();
            $uDAO = new UsuarioDAO();
            
            if(filter_input(INPUT_POST, "entrar")){
                
                $usuario = filter_input(INPUT_POST, "usuario");
                $senha   = filter_input(INPUT_POST, "senha");
                
                $u->setUsuario($usuario);
                $u->setSenha($senha);
                
                if($uDAO->logar($u)){
                    echo "<script>alert('Login efetuado com sucesso!');
                                            location='principal.php'</script>";
                }else{
                    echo "<script>alert('Usuario e/ou Senha Incorretos');
                                            location='index.php'</script>";
                }                
            }        
        ?>

        <div class="row">
            <div class="offset-md-4 col-md-4">
                <div class="login-container">
                    <form method="post">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuário</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" 
                                   placeholder="Digite seu usuário">
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" 
                                   placeholder="Digite sua senha">
                        </div>
                        <input type="submit" class="btn btn-primary w-100" value="Entrar" name="entrar">
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS and Popper -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
</html>
