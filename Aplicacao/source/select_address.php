<?php
    include("conect.php");

    $query = $pdo->prepare("SELECT pk_endereco, nome_endereco, rua_endereco, numero_endereco, bairro_endereco, cep_endereco, complemento_endereco FROM endereco WHERE fk_usuario = :pk_user;");

    $query->bindValue(":pk_user",$_SESSION['pk_usuario']);

    $query->execute();

    if($query->rowCount() >= 1)
    {
        $lst_address = $query->fetchAll();

    }else{
        echo("Não há endereços cadastrados.");
    }
    unset($query);
    unset($pdo);
?>