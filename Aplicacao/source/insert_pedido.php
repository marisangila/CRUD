<?php
    include("conect.php");
    define("EDITANDO","1");
    session_start();

    $qtd = $_POST["qtd"];
    $obs = $_POST["obs"];
    $pk_item = 1;//$_POST["pk_item"];

    $query = $pdo->prepare("SELECT pk_pedido FROM PEDIDO WHERE fk_usuario = :user AND fk_estado = 1");
    $query->bindValue(":user",$_SESSION['pk_usuario']); 
    $query->execute();  

    
    if($query->rowCount() >= 1 ){
        
        $result = $query->fetchColumn();
        unset($query);

        $query = $pdo->prepare("INSERT INTO PEDIDO_ITEM (quantidade_item, observacao_item, fk_pedido, fk_item) VALUES(:qtd,:obs,:order,:user)");
        $query->bindValue(":qtd",$qtd);                                   
        $query->bindValue(":obs",$obs);       
        $query->bindValue(":order", $result);
        $query->bindValue(":user",$pk_item); 
        $query->execute();                           

    }else{
    
        $query = $pdo->prepare("INSERT INTO PEDIDO (fk_usuario, fk_estado) VALUES(:user,:order_status)");
        $query->bindValue(":user",$_SESSION['pk_usuario']);
        $query->bindValue(":order_status", EDITANDO);
        $query->execute();
        $pk_order = $pdo->lastInsertId();

        unset($query);

        $query = $pdo->prepare("INSERT INTO PEDIDO_ITEM (quantidade_item, observacao_item, fk_pedido, fk_usuatio) VALUES(:qtd,:obs,:order,:user)");
        $query->bindValue(":qtd",$qtd);                                   
        $query->bindValue(":obs",$obs);       
        $query->bindValue(":order",$pk_order);
        $query->bindValue(":user",$_SESSION['pk_usuario']);  
        $query->execute();                          

    }
                                                     
    header("Location:../pages/cardapio.php");

    unset($query);
    unset($pdo);
?>