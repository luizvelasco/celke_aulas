<?php
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - Update</title>
</head>
<body>
    <h2>Editar Usuários</h2>
    <?php

        $id = 1;
        $nome = "Cesar 1";
        $email = "cesar1@celke.com.br";

        $query_usuario = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
        
        $up_usuario = $conn->prepare($query_usuario);
        $up_usuario->bindParam(":nome", $nome, PDO::PARAM_STR);
        $up_usuario->bindParam(":email", $email, PDO::PARAM_STR);
        $up_usuario->bindParam(":id", $id, PDO::PARAM_INT);

        if ($up_usuario->execute()){
            echo "Usuário editado com sucesso";
        } else {
            echo "Erro: usuário não editado";
        }
        
    ?>
    

</body>
</html>

