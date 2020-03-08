<?php
namespace database;

class DB
{
    private $dsn;
    private $user;
    private $password;

    public function __construct()
    {
        $this->dsn = 'mysql:dbname=phpapi;host=127.0.0.1';
        $this->user = 'root';
        $this->password = 'root';
    }

    public function connect()
    {
        try {
            return new \PDO($this->dsn, $this->user, $this->password, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
