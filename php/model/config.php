<?php
session_start();
class Config {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'repository';
    private $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die('Connection failed: ' . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

// $check = new Config();
