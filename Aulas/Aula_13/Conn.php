<?php

abstract class Conn 
{
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "";
    public string $dbName = "celke";
    public object $connect;

    public function connectDb()
    {
        try {
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';dbname=' . $this->dbName, $this->user, $this->pass);
            return $this->connect;
        } catch (Exception $err) {
            echo "Erro: $err";
        }
    }
}