<?php
    include("conect.php");

    $query = $pdo->prepare("SELECT pk_item, nome_item, descricao_item, tamanho_item, preco_item, imagem_item FROM item;");

    $query->execute();

    if($query->rowCount() >= 1)
    {
        $lst_product = $query->fetchAll();
    }else{
        echo("Não há produtos cadastrados.");
    }
    unset($query);
    unset($pdo);
?>