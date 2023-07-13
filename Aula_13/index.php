<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>

    <a href="index.php">Listar</a>
    <a href="create.php">Cadastrar</a>

    <h1>Listar Usuários</h1>
    <?php

    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
    }
    
        require_once ("./Conn.php");
        require_once ("./User.php");

        $listUsers = new User();

        $result_users = $listUsers->list();

        foreach ($result_users as $usuario) {
            echo "ID:".  $usuario['id'] . "<br>";
            echo "Nome:".  $usuario['nome'] . "<br>";
            echo "E-mail:".  $usuario['email'] . "<hr>";
        }

    ?>
</body>
</html>