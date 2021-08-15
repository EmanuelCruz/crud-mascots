<?php


class Connection
{
    private string $driver;
    private string $host;
    private string $user;
    private string $password;
    private string $dbName;
    private string $charset = 'utf8';

    public function conexion()
    {
        try {
            require_once 'vendor/autoload.php';
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();

            $this->driver = $_ENV["DB_DRIVER"];
            $this->host = $_ENV["DB_HOST"];
            $this->user = $_ENV["DB_USER"];
            $this->password = $_ENV["DB_PASSWORD"];
            $this->dbName = $_ENV["DB_NAME"];

            $pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};charset={$this->charset}", $this->user, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // ATTR_ERRMODE: Reporte de errores
            // ERRMODE_EXCEPTION: Lanza exceptions que las va a capturar PDOException
            return $pdo;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

