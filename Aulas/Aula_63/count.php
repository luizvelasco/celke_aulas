<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - COUNT</title>
</head>

<body>
    <h2>Contar a quantidade de usuários ativos</h2>

    <?php
        $query_qdt_usuarios = "SELECT COUNT(id) AS qtd_usuarios FROM usuarios WHERE sists_usuario_id = 1";
        $result_qtd_usuarios = $conn->prepare($query_qdt_usuarios);
        $result_qtd_usuarios->execute();

        $row_qtd_usuarios = $result_qtd_usuarios->fetch(PDO::FETCH_ASSOC);
        extract($row_qtd_usuarios);

        echo "Quantidade de usuários ativos: $qtd_usuarios <br>";
    ?>
   
</body>

</html>