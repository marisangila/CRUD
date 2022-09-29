<?php
include("conect.php");

$email = $_POST["email"];
$set_password = MD5($_POST["password"]);

$query = $pdo->prepare("SELECT senha_usuario FROM usuario WHERE email_usuario = :email");
$query->bindValue(":email", $email);
$query->execute();
$get_password = $query->fetchColumn();

if ($get_password == $set_password) {
    header("Location:../pages/cardapio.html");
} else {
    header("Location:../pages/login.html");
}
?>