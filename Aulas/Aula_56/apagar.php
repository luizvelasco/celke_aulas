<?php
    include_once "conexao.php";
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    $query_usuario = "DELETE FROM usuarios WHERE id=:id LIMIT 1";
    $apagar_usuario = $conn->prepare($query_usuario);
    $apagar_usuario->bindParam(":id", $id, PDO::PARAM_INT);
    if ($apagar_usuario->execute()){
        $_SESSION['msg'] = "Usuário apagado com sucesso";
        header("Location: index.php");
    } else {
        $_SESSION['msg'] = "Erro: Usuário não apagado com sucesso";
    }