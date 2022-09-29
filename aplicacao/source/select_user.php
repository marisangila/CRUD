<?php
    include("conect.php");

    $query = $pdo->prepare("SELECT nome_usuario, sobrenome_usuario, email_usuario, celular_usuario, senha_usuario FROM usuario");
    $query->execute();
    $data = $query->fetch();

    print_r($data);
    //while($row = $data[])
                                              

?>
