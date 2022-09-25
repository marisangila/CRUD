<?php
include("conect.php");

$email = $_POST["email"];
$password_set = $_POST["password"];

$password_saved = $pdo->query("SELECT senha_usuario FROM usuario WHERE email_usuario = $email")->fetch();

if ($password_set == $password_saved) {
    header("Location:/cardapio.html");
} else {
    echo("<script>alert('Login ou Senha Incorreto!')</script>");
}
