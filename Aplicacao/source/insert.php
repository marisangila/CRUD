<?php
    include("conect.php");

    $nome = $_POST["name"];
    $sobrenome = $_POST["lastname"];
    $email = $_POST["email"];
    $telefone = $_POST["phone"];
    $senha = $_POST["password"];
    
    $comando = $pdo -> prepare("INSERT INTO USUARIO (nome_usuario, sobrenome_usuario, email_usuario, telefone_usuario, senha_usuario) VALUES(:nome,:sobrenome,:email,:telefone,:senha})");
    $comando->bindValue(":nome",$nome);                                   
    $comando->bindValue(":sobrenome",$sobrenome);       
    $comando->bindValue(":email",$email);
    $comando->bindValue(":telefone",$telefone);                           
    $comando->bindValue(":senha",$senha);

    $comando->execute();                                                   

    echo("sucesso");
    //header("../pages/cadastrar.php");
?>