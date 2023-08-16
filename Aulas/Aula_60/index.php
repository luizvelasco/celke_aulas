<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - ALIASES</title>
</head>

<body>
    <h2>Listar Usuários</h2>

    <?php
        $query_usuarios = "SELECT id AS id_usuario, nome AS nome_usuario, email FROM usuarios ORDER BY id DESC";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            extract($row_usuario);
            echo "ID: $id_usuario <br>";
            echo "Nome: $nome_usuario <br>";
            echo "Email: $email <br>";
            echo "<hr>";
        }
    ?>
   
</body>

</html>