<?php

// fichier initial d'Ilham de connexion à sa bd, mais je ne sais pas comment il fonctionne, alors j'ai modifié sa strucutre pour faire comme la mienne - Sabrina

class Database {
    private string $host = 'localhost';
    private string $dbname = 'ilhamechemmakh_poo3';
    private string $username = 'root';
    private string $password = '';
    private PDO $connection;

    public function __construct() {
        $this->connection = new PDO(
            "mysql:host={$this->host};dbname={$this->dbname};charset=utf8", 
            $this->username, 
            $this->password
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection(): PDO {
        return $this->connection;
    }

    public function display(): void {
        var_dump($this);
    }
}