<?php
session_start();
ob_start();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

require_once ("./Conn.php");
require_once ("./User.php");

// Verificar se possui valor no ID
if (!empty($id)){
    // Instaciar a classe e criar o objeto
    $deleteUser = new User();

    // Enviar o ID para o atributo da classe User
    $deleteUser->id = $id;

    // Instanciar o método delete
    $value = $deleteUser->delete();

    if ($value){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário não apagado</p>";
        header("Location: index.php");
    } else {
        $_SESSION['msg'] = "<p style='color:#f00;'>Usuário não apagado</p>";
        header("Location: index.php");
    }

} else {
    $_SESSION['msg'] = "<p style='color:#f00;'>Usuário não encotrado</p>";
    header("Location: index.php");
}