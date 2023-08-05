<?php
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - DISTINCT</title>
</head>
<body>
    <h2>Listar as aualas acessadas</h2>
    <?php
        $query = "SELECT DISTINCT nome_aula, usuario_id FROM acessos WHERE usuario_id = 5";
        $result = $conn->prepare($query);
        $result->execute();

        while ($row_result = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row_result);
            echo "Nome da Aula: " . $nome_aula . "<br>";
            echo "Usuário ID: " . $usuario_id . "<br>";
            echo "<hr>";
        }
    ?>

</body>
</html>

