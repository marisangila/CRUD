<?php
    include("conect.php");

    $name = $_POST["name"];
    $number = $_POST["number"];
    $holder = $_POST["holder"];
    $expiration = $_POST["expiration"];
    $cvv = $_POST["cvv"];
    
    $query = $pdo -> prepare("INSERT INTO CARTAO (nome_cartao, numero_cartao, titular_cartao, data_validade_cartao, cvv_cartao, fk_usuario) VALUES(:name_credcard,:number_credcard,:holder_credcard,:expiration_credcard,:cvv_credcard, :pk_user)");
    $query->bindValue(":name_credcard",$name);                                   
    $query->bindValue(":number_credcard",$number);       
    $query->bindValue(":holder_credcard",$holder);
    $query->bindValue(":expiration_credcard",$expiration);                           
    $query->bindValue(":cvv_credcard",$cvv);
    session_start();
    $query->bindValue(":pk_user", $_SESSION['pk_usuario']);

    $query->execute();                                                   

    header("Location:../pages/cartao.php");

    unset($query);
    unset($pdo);
?>