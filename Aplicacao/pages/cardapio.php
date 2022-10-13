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
  <meta name="viewport" content="wfaviconidth=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/x-icon" href="../images/icons/favicon.png">
</head>

<body class="bg-light">
  <nav class="navbar navbar-dark bg-primary navbar-expand-md  mx-auto">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="meus_pedidos.php">Meus Pedidos</a>
      </li>
      <?php
      if ($_SESSION['is_adm_usuario'] == 1) {
        echo
        '<li class="nav-item active">
            <a class="nav-link" href="pedido.php">Pedidos</a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="produto.php">Cadastrar Item</a>
        </li>';
      };
      ?>
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
          <a href="endereco.php" class="btn btn-link" aria-current="page">
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

  <?php
  include("../source/select_item.php");

  if (!empty($lst_product)) {
    foreach ($lst_product as $row) { ?>
      <div class="row justify-content-center align-items-center">
        <div class="col-md-2">
          <?php echo '<img height="200px" width="200px" src="' . $row['imagem_item'] . '">'; ?>
        </div>
        <div class="col-md-4">
          <?php echo '<p class="text-justify fw-bold"> Nome: ' . $row['nome_item'] . '</p>'; ?>

          <?php echo '<p class="text-justify">' . $row['descricao_item'] .  '</p>'; ?>

        </div>
        <div class="col-md-2">
          <?php echo '<p class="text-justify fw-bold">' . $row['tamanho_item'] . '</p>'; ?>
          <?php echo '<p class="text-justify fw-bold">' . $row['preco_item'] . '</p>'; ?>
        </div>
      </div>
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
          <div class="form-group shadow-textarea">
            <Label>Obervações:</Label>
            <textarea class="form-control z-depth-1" rows="4" placeholder="Exemplo: remover cebola, alface..."></textarea>
          </div>
        </div>
        <div class="col-md-1 ">
          <Label>Quantidade:</Label>
          <input class="form-control w-25" type="number">
        </div>
        <div class="col-md-1 ">
          <input class="btn btn-primary m-5" type="button" value="Adicionar">
        </div>
      </div>
  <?php }
  }
  ?>

  <div class="container-fluid" style="position:fixed; bottom: 0;height: 100px; width:100%;background-color: #A9A9A9;">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8">
        <img class="mb-4" src="../images/icons/shopping-cart.png">
      </div>
      <div class="col-md-1">
        <p class="text-write">R$: 00,00</p>

      </div>
      <div class="col-md-1">
        <input class="btn btn-primary m-5" type="button" value="Concluir Pedido">
      </div>
    </div>
  </div>

</body>

</html>