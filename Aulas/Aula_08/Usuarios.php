<?php

require_once ("./Conn.php");

class Usuarios 
{

    public $connect;
    public function listar() {
        $conn = new Conn();
        $this->connect =  $conn->conectar();

        $query_usuarios = "SELECT id, nome, email FROM usuarios";

        $result_usuarios = $this->connect->prepare($query_usuarios);
        $result_usuarios->execute();
        return $result_usuarios->fetchAll();

        //return "Listar Usuários<br>";
    }
}