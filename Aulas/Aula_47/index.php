<?php
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - ORDER BY</title>
</head>
<body>
    <h2>Listar Usuários</h2>
    <?php
        $query = "SELECT id, nome, email FROM usuarios ORDER BY id DESC";
        $result = $conn->prepare($query);
        $result->execute();

        while ($row_result = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row_result);
            echo "ID: " . $id . "<br>";
            echo "Nome: " . $nome . "<br>";
            echo "E-mail: " . $email . "<br>";
            echo "<hr>";
        }
    ?>

</body>
</html>

