<?php

class Model {
    private PDO $pdo;

    public function __construct() {

        require_once __DIR__ . '/../env.php';

        $this->pdo = new PDO(
            "mysql:host=" . $_ENV['dbhost'] . ";dbname=" . $_ENV['dbname'] . ";charset=utf8",
            $_ENV['dblogin'],
            $_ENV['dbpassword']
        );
    }

    /**
     * Get the value of pdo
     */
    public function getPdo(): PDO {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     */
    public function setPdo(PDO $pdo): self {
        $this->pdo = $pdo;
        return $this;
    }
}
