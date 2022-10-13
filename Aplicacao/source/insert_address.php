<?php
    include("conect.php");

    $name = $_POST["name"];
    $address = $_POST["address"];
    $number = $_POST["number"];
    $district = $_POST["district"];
    $cep = $_POST["cep"];
    $complement = $_POST["complement"];

    $query = $pdo->prepare("INSERT INTO ENDERECO (nome_endereco, rua_endereco, numero_endereco, bairro_endereco, cep_endereco, complemento_endereco, fk_usuario) VALUES(:name_address,:address_address,:number_address,:district_address,:cep_address,:complement_address, :pk_user)");
    $query->bindValue(":name_address",$name);                                   
    $query->bindValue(":address_address",$address);       
    $query->bindValue(":number_address",$number);
    $query->bindValue(":district_address",$district);                           
    $query->bindValue(":cep_address",$cep);
    $query->bindValue(":complement_address",$complement);
    session_start();
    $query->bindValue(":pk_user", $_SESSION['pk_usuario']);

    $query->execute();                                                   

    header("Location:../pages/endereco.php");

    unset($query);
    unset($pdo);
?>