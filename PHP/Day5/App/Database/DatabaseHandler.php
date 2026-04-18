<?php
namespace App\Database;

use PDO;
use PDOException;

class DatabaseHandler {
    private $host = "localhost";
    private $db_name = "oop_Day_5";
    private $username = "root";
    private $password = "";
    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function RunDml($sql) {
        return $this->conn->query($sql);
    }
}