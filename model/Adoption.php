<?php
require_once 'core/Crud.php';

class Adoption extends Crud
{
    private $id;
    private $idAnimal;
    private $idUser;
    private $date;
    private $reason;
    private $pdo;

    const TABLE = "adoption";

    public function __construct()
    {
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();

    }

    public function __set(string $key, $value): void
    {
        $this->$key = $value;
    }

    public function __get(string $key)
    {
        return $this->$key;
    }

    public function create()
    {
        try {
            $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (idAnimal, idUser, date, reason) VALUES (?,?,?,?)");
            $statement->execute(array($this->idAnimal, $this->idUser, $this->date, $this->reason));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function update()
    {
        try {
            $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET idAnimal = ?, idUser = ?, date = ?, reason = ? WHERE id = ? ");
            $statement->execute(array($this->idAnimal, $this->idUser, $this->date, $this->reason, $this->id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}