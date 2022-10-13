<?php
    include("conect.php");

    $query = $pdo->prepare("SELECT pk_cartao, nome_cartao, numero_cartao, titular_cartao, data_validade_cartao, cvv_cartao FROM cartao WHERE fk_usuario = :pk_user;");

    $query->bindValue(":pk_user",$_SESSION['pk_usuario']);
    
    $query->execute();


    if($query->rowCount() >= 1)
    {
        $lst_credcard = $query->fetchAll();
    }else{
        echo("Não há endereços cadastrados.");
    }
    unset($query);
    unset($pdo);
?>