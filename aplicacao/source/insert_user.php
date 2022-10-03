<?php
    include("conect.php");

    $nome = $_POST["name"];
    $sobrenome = $_POST["lastname"];
    $email = $_POST["email"];
    $celular = $_POST["phone"];
    $senha = MD5($_POST["password"]);
    
    $comando = $pdo -> prepare("INSERT INTO USUARIO (nome_usuario, sobrenome_usuario, email_usuario, celular_usuario, senha_usuario) VALUES(:nome,:sobrenome,:email,:celular,:senha)");
    $comando->bindValue(":nome",$nome);                                   
    $comando->bindValue(":sobrenome",$sobrenome);       
    $comando->bindValue(":email",$email);
    $comando->bindValue(":celular",$celular);                           
    $comando->bindValue(":senha",$senha);

    $comando->execute();                                                   

    header("Location:../pages/cadastrar.html");
?>