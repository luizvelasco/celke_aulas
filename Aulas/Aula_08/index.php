<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - Listar</title>
</head>
<body>
    <?php

        require_once("Usuarios.php");

        $listarUsuario = new Usuarios();
        $result_usuarios = $listarUsuario->listar();

        foreach ($result_usuarios as $usuario) {
            echo "ID do usuário:" . $usuario['id'] . "<br>";
            echo "Nome do usuário:" . $usuario['nome'] . "<br>";
            echo "E-mail do usuário:" . $usuario['email'] . "<br><hr>";
        }
    ?>
</body>
</html>