<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>
    <?php
        require_once ("./Conn.php");
        require_once ("./ListUsers.php");

        $listUsers = new ListUsers();

        $result_users = $listUsers->list();

        foreach ($result_users as $usuario) {
            echo "ID:".  $usuario['id'] . "<br>";
            echo "Nome:".  $usuario['nome'] . "<br>";
            echo "E-mail:".  $usuario['email'] . "<hr>";
        }

    ?>
</body>
</html>