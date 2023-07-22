<?php

class ListUsers extends Conn
{
    public object $conn;

    public function list(): array
    {
        $this->conn = $this->conectar();
        $result_users = $this->conn->prepare("SELECT id, nome, email FROM usuarios");
        $result_users->execute();
        $retorno = $result_users->fetchAll();
        return $retorno;
    }
}