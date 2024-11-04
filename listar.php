<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-edit, .btn-delete {
            padding: 5px 10px;
        }
        .btn-edit {
            background-color: #ff9900;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-edit:hover {
            background-color: #ff9900;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <?php 
        include_once 'Usuario.class.php';
        include_once 'UsuarioDAO.class.php';
        
        $u = new Usuario();
        $uDAO = new UsuarioDAO();
        
        if(filter_input(INPUT_GET, "acao") == "excluir"){
            $id = filter_input(INPUT_GET, "id");
            $u->setId($id);
            if($uDAO->exclui($u)){
                echo "<script>alert('Cadastro excluido com sucesso');
                                            location='principal.php?link=3'</script>";
            }
        }
    
    ?>
    <div class="container">
        <h2 class="mb-4 text-center">Lista de Usuários</h2>
        <table class="table table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Nome Completo</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($uDAO->selecionaTudo() as $valor){
                ?>
                <tr>
                    <td><?= $valor->nomecompleto ?></td>
                    <td><?= $valor->email ?></td>
                    <td><?= $valor->usuario ?></td>
                    <td>
                        <a href="?link=4&id=<?= $valor->id ?>">
                                <button class="btn btn-edit">Editar</button></a>
                        <a href="?link=3&id=<?= $valor->id ?>&acao=excluir" 
                           onclick="return confirm('Deseja excluir este cadastro?')">
                                <button class="btn btn-delete">Excluir</button></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
