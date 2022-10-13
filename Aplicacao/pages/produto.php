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

<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary navbar-expand-md  mx-auto">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="cardapio.php">Inicio</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="meus_pedidos.php">Meus Pedidos</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="pedido.php">Pedidos</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="produto.php">Cadastrar Item </a>
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
                    <a href="item.php" class="btn btn-link" aria-current="page">
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
        <form action="../source/insert_item.php" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-2">
                    <img class="img-fluid  img-thumbnail m-2" src="../images/camera.png" style="height: 200px;width:200px">
                    <input type="file" name="image">
                </div>
                <div class="col-md-4">
                    <Label>Nome:</Label>
                    <input class="form-control" type="text" name="name">
                    <div class="form-group shadow-textarea">
                        <label>Descrição:</label>
                        <textarea class="form-control z-depth-1" rows="4" placeholder="Descreva o produto..." name="description"></textarea>
                    </div>
                </div>
                <div class="col-md-2">
                    <Label>Tamanho:</Label>
                    <input class="form-control" type="text" name="size">
                    <Label>Preço:</Label>
                    <input class="form-control" type="text" name="price">
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
                                    Imagem
                                </th>
                                <th class="text-center align-middle">
                                    Nome
                                </th>
                                <th class="text-center align-middle">
                                    Descrição
                                </th>
                                <th class="text-center align-middle">
                                    Tamanho
                                </th>
                                <th class="text-center align-middle">
                                    Preço
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
                            include("../source/select_item.php");
                            if (!empty($lst_product)) {
                                foreach ($lst_product as $row) { ?>
                                    <tr>
                                        <td class="text-center align-middle"> <?php echo '<img class="img-fluid" height="40px" width="40px" src="' . $row['imagem_item'] . '">'; ?> </td>
                                        <td class="text-center align-middle"> <?php echo $row['pk_item']; ?></td>
                                        <td class="text-center align-middle"> <?php echo $row['nome_item']; ?></td>
                                        <td class="text-center align-middle"> <?php echo $row['descricao_item']; ?></td>
                                        <td class="text-center align-middle"> <?php echo $row['tamanho_item']; ?></td>
                                        <td class="text-center align-middle"> <?php echo $row['preco_item']; ?></td>
                                        <td class="text-center align-middle"> <?php echo '<input class="btn btn-secondary" type="button" value="Editar">'; ?></td>
                                        <td class="text-center align-middle"> <?php echo '<input class="btn btn-danger" type="button" value="Excluir">'; ?></td>
                                    </tr>
                            <?php }
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