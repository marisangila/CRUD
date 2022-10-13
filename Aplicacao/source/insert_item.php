<?php
    include("conect.php");

    $name = $_POST["name"];
    $description = $_POST["description"];
    $size = $_POST["size"];
    $price = $_POST["price"];

    $image = $_FILES["image"];
    $ext = $image['type'];
    $content = file_get_contents($image["tmp_name"]);
    $base64 = "data:".$ext.";base64,".base64_encode($content);

    $query = $pdo->prepare("INSERT INTO ITEM (nome_item, descricao_item, tamanho_item, preco_item, imagem_item) VALUES(:name_item,:description_item,:size_item,:price_item,:image_item)");
    $query->bindValue(":name_item",$name);                                   
    $query->bindValue(":description_item",$description);       
    $query->bindValue(":size_item",$size);
    $query->bindValue(":price_item",$price);                           
    $query->bindValue(":image_item",$base64);

    $query->execute();                                                   

    header("Location:../pages/produto.php");

    unset($query);
    unset($pdo);
?>