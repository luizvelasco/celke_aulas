<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - Like</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <h2>Listar Usuários</h2>
    <?php
        $nome = "%Cesar%";
        $query_usuarios = "SELECT id, nome, email FROM usuarios WHERE nome LIKE :nome ORDER BY id DESC";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->bindParam(":nome", $nome, PDO::PARAM_STR);
        $result_usuarios->execute();

        while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            extract($row_usuarios);
            echo "ID: $id <br>";
            echo "Nome: $nome <br>";
            echo "Email: $email <br>";
            echo "<hr>";
        }
    ?>
</body>

</html>