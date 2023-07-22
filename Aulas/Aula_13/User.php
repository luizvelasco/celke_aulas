<?php

class User extends Conn
{
    public object $conn;
    public array $formData;

    public function list(): array
    {
        $this->conn = $this->connectDb();
        $result_users = $this->conn->prepare("SELECT id, nome, email FROM usuarios");
        $result_users->execute();
        $retorno = $result_users->fetchAll();
        return $retorno;
    }

    public function create(): bool
    {
        $this->conn = $this->connectDb();
        $query_user = "INSERT INTO usuarios (nome, email, created) VALUES (:name, :email, NOW())";
        $add_user = $this->conn->prepare($query_user);
        $add_user->bindParam(":name", $this->formData['name']);
        $add_user->bindParam(":email", $this->formData['email']);
        $add_user->execute();

        if ($add_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}