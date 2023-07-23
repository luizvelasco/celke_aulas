<?php

namespace Sts\Models;

use PDO;
use PDOException;

abstract class Conn
{
    private string $db = "mysql";
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $dbName = "celke";
    private object $connect;

    public function connectDb()
    {
        try {
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';dbname=' . $this->dbName, $this->user, $this->pass);
            return $this->connect;
        } catch (PDOException $err) {
            die('Por favor tente novamente. Caso o erro persista, entre em contato com o Administrador luizvelasco@gmail.com');
        }
    }
}