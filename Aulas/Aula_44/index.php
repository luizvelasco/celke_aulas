<?php
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - LIMIT e OFFSET</title>
</head>
<body>
    <h2>Listar Usuários com limite</h2>
    <?php
        $query_usuarios = "SELECT id, nome, email FROM usuarios LIMIT 5 OFFSET 10";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            // var_dump($row_usuario);
            extract($row_usuario);
            echo "ID: " . $id . "<br>";
            echo "Nome: " . $nome . "<br>";
            echo "E-mail: " . $email . "<br>";
            echo "<hr>";
        }
    ?>
</body>
</html>

