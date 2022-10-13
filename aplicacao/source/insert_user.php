<?php
    include("conect.php");

    $nome = $_POST["name"];
    $sobrenome = $_POST["lastname"];
    $email = $_POST["email"];
    $celular = $_POST["phone"];
    $senha = MD5($_POST["password"]);
    
    $query = $pdo -> prepare("INSERT INTO USUARIO (nome_usuario, sobrenome_usuario, email_usuario, celular_usuario, senha_usuario) VALUES(:nome,:sobrenome,:email,:celular,:senha)");
    $query->bindValue(":nome",$nome);                                   
    $query->bindValue(":sobrenome",$sobrenome);       
    $query->bindValue(":email",$email);
    $query->bindValue(":celular",$celular);                           
    $query->bindValue(":senha",$senha);

    $query->execute();                                                   

    header("Location:../pages/cadastrar.html");

    unset($query);
    unset($pdo);
?>