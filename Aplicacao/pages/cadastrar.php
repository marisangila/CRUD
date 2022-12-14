<!DOCTYPE html>
<html>

<head>
    <title>Delivery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/icons/favicon.png">

<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary navbar-expand-md  mx-auto">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">Inicio</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="login.html">Acessar</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid mt-5">
        <div class="card shadow-lg p-3 mx-5 bg-body rounded">
            <div class="card-body">
                <form action="../source/insert_user.php" method="POST" class="form-group">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-4">
                            <Label>Nome:</Label>
                            <input class="form-control" type="text" name="name">
                            <br>
                            <Label>E-mail:</Label>
                            <input class="form-control" type="email" name="email">
                            <br>
                            <Label>Crie uma senha:</Label>
                            <input class="form-control" type="password" name="password">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <Label>Sobrenome:</Label>
                            <input class="form-control" type="text" name="lastname">
                            <br>
                            <Label>Celular:</Label>
                            <input class="form-control" type="text" name="phone">
                            <br>
                            <Label>Confirme sua senha:</Label>
                            <input class="form-control" type="password">
                            <br>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-centers">
                        <div class="col-mx-auto text-center">
                            <input type="submit" value="Cadastar" class="btn btn-primary px-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        session_start();
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            if ($_SESSION['is_adm_usuario'] == 1) { ?>
                <div class="row justify-content-center align-items-centers">
                    <div class="col-md-8 mt-5">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-hover table-bordered table-primary">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">
                                            Nome
                                        </th>
                                        <th class="text-center align-middle">
                                            Sobrenome
                                        </th>
                                        <th class="text-center align-middle">
                                            E-mail
                                        </th>
                                        <th class="text-center align-middle">
                                            Celular
                                        </th>
                                        <th class="text-center align-middle">
                                            <input class="btn btn-secondary" type="button" value="Editar">
                                        </th>
                                        <th class="text-center align-middle">
                                            <input class="btn btn-danger" type="button" value="Excluir">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
<?php }
}
?>
</body>

</html>