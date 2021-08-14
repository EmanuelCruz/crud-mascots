<?php
require_once 'core/Crud.php';

class Animal extends Crud
{
    private $id;
    private $name;
    private $specie;
    private $breed;
    private $gender;
    private $color;
    private $age;
    private $pdo;

    const TABLE = "animal";

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
            $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (name, specie, breed, gender, color, age) VALUES (?,?,?,?,?,?)");
            $statement->execute(array($this->name, $this->specie, $this->breed, $this->gender, $this->color, $this->age));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function update()
    {
        try {
            $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name = ?, specie = ?, breed = ?, gender = ?, color = ?, age = ? WHERE id = ? ");
            $statement->execute(array($this->name, $this->specie, $this->breed, $this->gender, $this->color, $this->age, $this->id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}