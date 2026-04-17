<?php
namespace App\Database;
use App\Database\DatabaseHandler;
use PDO;

class Model extends DatabaseHandler {
    protected $table;

    public function get() {
        $sql = "SELECT * FROM " . $this->table;
        return $this->RunDml($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}