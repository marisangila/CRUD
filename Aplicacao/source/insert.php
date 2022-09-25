<?php
    include("conect.php");

    $nome = $_POST["name"];
    $email = $_POST["email"];

    $comando = $pdo -> prepare("INSERT INTO usuario(nome_usuario, email_usuario) VALUES(:nome,:email)");  // Prepara o Comando de inserção
    $comando->bindValue(":nome",$nome);                                     // Seleciona o dado que será inserido
    $comando->bindValue(":email",$email);                                     // Seleciona o dado que será inserido
    $comando->execute();                                                    // Executa o comando

    header("Location:/cadastrar.html");
?>