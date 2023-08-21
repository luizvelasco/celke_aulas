<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - GROUP BY</title>
</head>

<body>
    <h2>Aulas Acessadas</h2>

    <?php
        $query_acesso_aulas = " SELECT aul.id, aul.nome, ace.usuario_id, count(ace.aula_id) as qtd_acesso
                                FROM aulas aul
                                INNER JOIN acessos_aulas ace
                                ON ace.aula_id = aul.id
                                WHERE ace.usuario_id = 1
                                GROUP BY ace.aula_id";
        $result_acesso_aulas = $conn->prepare($query_acesso_aulas);
        $result_acesso_aulas->execute();

        while($row_acesso_aula = $result_acesso_aulas->fetch(PDO::FETCH_ASSOC)){
            extract($row_acesso_aula);
            echo "Nome da aula: $nome<br>";
            echo "Quantidade de acesso: $qtd_acesso<hr>";
        }
    ?>
   
</body>

</html>