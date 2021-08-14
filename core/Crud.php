<?php
require_once 'core/Connection.php';

abstract class Crud extends Connection
{
    private $table;
    private $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = parent::conexion();

    }

    // Leer todos los registros de una tabla en especial
    public function getAll()
    {
        try {
            // Etapa de Preparación
            // Creación de la plantilla
            // Llamamos a la conexión pdo y preparamos nuestra sentencia SQL
            $stm = $this->pdo->prepare("SELECT * FROM {$this->table}");
            // Etapa de Ejecución
            $stm->execute();
            // Obtener la respuesta de nuestra consulta
            // El método fetchAll() retorna un array, pero como nosotros
            // estamos trabajando con objetos debemos retornar uno. Por
            // eso agregamos el parámetro PDO::FETCH_OBJ
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    // Leer un registro en especial, de una tabla en especia
    public function getById($id)
    {
        // Para agregar el $id a nuestra sentencia SQL, vamos a utilizar parámetros de sustitución posicionales anónimos (`?`)
        try {
            // Etapa de Preparación
            // Creación de la plantilla
            // Llamamos a la conexión pdo y preparamos nuestra sentencia SQL
            $stm = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id=?");
            // Etapa de Ejecución
            // Debemos pasarle el `$id`, a través de un array, en el momento de ejecutar la sentencia
            $stm->execute(array($id));
            // Obtener la respuesta de nuestra consulta
            // El método fetchAll() retorna un array, pero como nosotros
            // estamos trabajando con objetos debemos retornar uno. Por
            // eso agregamos el parámetro PDO::FETCH_OBJ
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    // Eliminar un registro en especial, de una tabla en especia
    public function delete($id)
    {
        // Para agregar el $id a nuestra sentencia SQL, vamos a utilizar parámetros de sustitución posicionales anónimos (`?`)
        try {
            // Etapa de Preparación
            // Creación de la plantilla
            // Llamamos a la conexión pdo y preparamos nuestra sentencia SQL
            $stm = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id=?");
            // Etapa de Ejecución
            // Debemos pasarle el `$id`, a través de un array, en el momento de ejecutar la sentencia
            $stm->execute(array($id));

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    // Como nuestra clase Crud es general, para que lo podamos usar en diferentes clases,
    // no vamos a implementar los métodos de modificación o creación, porque podrían ser
    // datos diferentes y es mejor tratarlos de forma especial.
    // Por eso vamos a declararlas como métodos abstractos, para que forzosamente se implementen
    // en las subclases.

    abstract function create();

    abstract function update();
}