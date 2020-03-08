<?php
namespace App\Models;

use database\DB;

class User
{
    private $table = "users";
    private $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->connect();
    }

    public function create($data)
    {
        try {
            $this->pdo->beginTransaction();
            $result = $this->pdo
                ->prepare("INSERT into $this->table (name, password) VALUES (:name, :password)")
                ->execute($data);
            $this->pdo->commit();

            return $result;
        } catch (\Exception $e) {
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function findAll()
    {
        try {
            return $this->pdo->query("SELECT * FROM $this->table")->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function findByID($id)
    {
        try {
            return $this->pdo->query("SELECT * FROM $this->table WHERE id=$id")->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function edit($id, $data)
    {
        try {
            $this->pdo->beginTransaction();
            $result = $this->pdo
                ->prepare("UPDATE $this->table SET name=:name, password=:password where id = $id")
                ->execute($data);
            $this->pdo->commit();
    
            return $result;
        } catch (\Exception $e) {
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function remove($id)
    {
        try {
            $this->pdo->beginTransaction();
            $result = $this->pdo
                ->prepare("DELETE FROM $this->table WHERE id=$id")
                ->execute();
            $this->pdo->commit();
            
            return $result;
        } catch (\Exception $e) {
            $this->pdo->rollback();
            throw $e;
        }
    }
}
