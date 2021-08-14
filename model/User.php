<?php
require_once 'core/Crud.php';

class User extends Crud
{
    private $id;
    private $name;
    private $lastName;
    private $sex;
    private $address;
    private $phone;
    private $age;
    private $pdo;

    const TABLE = "user";

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
            $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (name, lastName, sex, address, phone, age) VALUES (?,?,?,?,?,?)");
            $statement->execute(array($this->name, $this->lastName, $this->sex, $this->address, $this->phone, $this->age));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function update()
    {
        try {
            $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name = ?, lastName = ?, sex = ?, address = ?, phone = ?, age = ? WHERE id = ? ");
            $statement->execute(array($this->name, $this->lastName, $this->sex, $this->address, $this->phone, $this->age, $this->id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}