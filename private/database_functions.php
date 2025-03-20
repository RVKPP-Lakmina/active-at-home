<?php
require_once('credentials.php');

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS);
            if ($this->connection->connect_errno) {
                throw new Exception("Connection failed: " . $this->connection->connect_error);
            }

            // Create database if it doesn't exist
            $this->connection->query("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
            $this->connection->select_db(DB_NAME);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection->close();
    }
}
