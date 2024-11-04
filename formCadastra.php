<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
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
    </style>
</head>
<body>
    <?php 
        if(filter_input(INPUT_POST, "cadastrar")){
            
            include_once 'Usuario.class.php';
            include_once 'UsuarioDAO.class.php';
            
            $nomeCompleto = filter_input(INPUT_POST, "nomeCompleto");
            $email = filter_input(INPUT_POST, "email");
            $usuario = filter_input(INPUT_POST, "usuario");
            $senha = filter_input(INPUT_POST, "senha");
            
            $u = new Usuario();
            $u->setNomeCompleto($nomeCompleto);
            $u->setEmail($email);
            $u->setUsuario($usuario);
            $u->setSenha($senha);
            
            $uDAO = new UsuarioDAO();
            
            if($uDAO->cadastra($u)){
                echo "<script>alert('Cadastro realizado com sucesso');
                                            location='principal.php?link=2'</script>";
            }            
        }
    ?>
    <div class="form-container">
        <h2>Cadastro de Usuário</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nomeCompleto" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto"
                       placeholder="Digite seu nome completo">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email"
                       placeholder="Digite seu e-mail">
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="usuario" name="usuario" 
                       placeholder="Digite seu nome de usuário">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" 
                       placeholder="Digite sua senha">
            </div>
            <input type="submit" class="btn btn-primary w-100" name="cadastrar" 
                   value="Cadastrar">
        </form>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
