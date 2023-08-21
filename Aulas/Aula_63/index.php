<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - SUM</title>
</head>

<body>
    <h2>Somar a quantidade de usuários ativos</h2>

    <?php
        $query_soma = "SELECT SUM(preco) AS total_venda FROM inscricoes_cursos";
        $result_soma = $conn->prepare($query_soma);
        $result_soma->execute();

        $row_soma = $result_soma->fetch(PDO::FETCH_ASSOC);
        extract($row_soma);
        echo "Total da venda: " . number_format($total_venda, 2, ",", ".");
    ?>
   
</body>

</html>