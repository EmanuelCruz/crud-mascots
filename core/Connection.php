<?php

class Connection
{
    private $driver = "mysql";
    private $host = 'localhost'; //IP del Servidor, cuando hagamos el deploy
    private $user = 'root'; //Puede ser distinto cuando hagamos el deploy
    private $password = '';
    private $dbName = 'pet_adoption';
    private $charset = 'utf8'; //Con esto evitamos problemas con caracteres en español

    public function conexion()
    {
        try {
            $pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};charset={$this->charset}", $this->user, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // ATTR_ERRMODE: Reporte de errores
            // ERRMODE_EXCEPTION: Lanza exceptions que las va a capturar PDOException
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

