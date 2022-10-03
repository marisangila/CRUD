<?php
    include("conect.php");

    $email = $_POST["email"];
    $set_senha = $_POST["password"];

    $query = $pdo->prepare("SELECT pk_usuario, is_adm_usuario, senha_usuario FROM usuario WHERE email_usuario = :email");
    $query->bindValue(":email", $email);
    $query->execute();

    if ($query->rowCount() == 1) {
        $result = $query->fetch();

        if ($result['senha_usuario'] == MD5($set_senha)) {
            session_start();

            $_SESSION['pk_usuario'] = $result['pk_usuario'];
            $_SESSION['senha_usuario'] = $result['senha_usuario'];
            $_SESSION['is_adm_usuario'] = $result['is_adm_usuario'];
            $_SESSION['loggedin'] = true;

            header("Location:../pages/cardapio.php");
        } else {
            echo ("Email ou Senha Inválida!");
        }
    } else {
        echo ("Email ou Senha Inválida!");
    }

    unset($query);
    unset($pdo);
?>