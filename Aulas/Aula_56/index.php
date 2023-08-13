<?php
    session_start();
    include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - Listar</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <h2>Listar Usuários</h2>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
        $query_usuarios = "SELECT id, nome, email FROM usuarios ORDER BY id DESC";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            extract ($row_usuario);
            echo "ID: $id <br>";
            echo "Nome: $nome <br>";
            echo "Email: $email<br>";
            echo "<a href='apagar.php?id=$id'>Apagar</a>";
            echo "<hr>";
        }
    ?>
</body>

</html>