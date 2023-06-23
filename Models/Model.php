<?php

namespace Models;

use Source\Constant;

class Model
{
    protected static \PDO $pdo;
    protected string $table;

    public function __construct()
    {
        try {
            static::$pdo = new \PDO(
                'mysql:dbname=' . Constant::DB_NAME . ';host=' . Constant::DB_HOST,
                Constant::DB_USERNAME,
                Constant::DB_PASSWORD,
                [
                    // DONNEES RECUPEREES SOUS FORME D'OBJET
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                    // AFFICHER LES ERREURS DE FACON CLAIRE
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        }

        $this->table = strtolower(explode("\\", get_class($this))[1]) . 's';
    }

    private function getPDO(): \PDO
    {
        return static::$pdo;
    }

    public function all(): array
    {
        $statement = $this->getPDO()->query("SELECT * FROM {$this->table}");
        return $statement->fetchAll();
    }
}
