<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Delivery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/icons/favicon.png">
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary navbar-expand-md  mx-auto">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="cardapio.php">Inicio</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="meus_pedidos.php">Meus Pedidos</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <a class="btn btn-outline-light" data-bs-toggle="offcanvas" href="#menu" role="button">
                Minha Conta
            </a>
        </ul>
    </nav>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="menu" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Minha Conta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a href="cartao.php" class="btn btn-link" aria-current="page">
                        <img src="../images/icons/location.png" height="20px" width="20px">
                        Endereço
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cartao.php" class="btn btn-link" aria-current="page">
                        <img src="../images/icons/credit-card.png" height="20px" width="20px">
                        Forma de Pagamento
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cadastrar.php" class="btn btn-link" aria-current="page">
                        <img src="../images/icons/user.png" height="20px" width="20px">
                        Perfil
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <form action="../source/insert_credcard.php" method="POST">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <Label>Nome:</Label>
                    <input class="form-control" type="text" name="name">
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <Label>Número do Cartão:</Label>
                    <input class="form-control" type="text" maxlength="16" name="number">
                </div>
                <div class="col-md-4">
                    <Label>Nome do Titular:</Label>
                    <input class="form-control" type="text" name="holder">
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4">
                    <Label>Data de Validade:</Label>
                    <input class="form-control" type="month" name="expiration">
                </div>
                <div class="col-md-4">
                    <Label>CVV:</Label>
                    <input class="form-control" type="int" maxlength="3" name="cvv">
                </div>
            </div>
            <div class="row justify-content-center align-items-centers mt-5">
                <div class="col-mx-auto text-center">
                    <input type="submit" value="Cadastar" class="btn btn-primary px-5">
                </div>
            </div>
        </form>
        <div class="row justify-content-center align-items-centers">
            <div class="col-md-8 mt-5">
                <div class="table-responsive-sm">
                    <table class="table table-striped table-hover table-bordered table-primary">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">
                                    Código
                                </th>
                                <th class="text-center align-middle">
                                    Nome
                                </th>
                                <th class="text-center align-middle">
                                    Número
                                </th>
                                <th class="text-center align-middle">
                                    Titular
                                </th>
                                <th class="text-center align-middle">
                                    Data de Validade
                                </th>
                                <th class="text-center align-middle">
                                    CVV
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
                        <?php
                            include("../source/select_credcard.php");

                            if (!empty($lst_credcard)) {
                                foreach ($lst_credcard as $row) { ?>
                                    <tr>
                                        <td class="text-center align-middle"> <?php echo $row['pk_cartao']; ?></td>
                                        <td class="text-center align-middle"> <?php echo $row['nome_cartao']; ?></td>
                                        <td class="text-center align-middle"> <?php echo $row['numero_cartao']; ?></td>
                                        <td class="text-center align-middle"> <?php echo $row['titular_cartao']; ?></td>
                                        <td class="text-center align-middle"> <?php echo $row['data_validade_cartao']; ?></td>
                                        <td class="text-center align-middle"> <?php echo $row['cvv_cartao']; ?></td>
                                        <td class="text-center align-middle"> <?php echo '<input class="btn btn-secondary" type="button" value="Editar">'; ?></td>
                                        <td class="text-center align-middle"> <?php echo '<input class="btn btn-danger" type="button" value="Excluir">'; ?></td>
                                    </tr>
                        <?php }
                            }else{
                                echo 'teste';
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>