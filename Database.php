<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "fund";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        } catch (Exception $e) {
            echo "Lidhja me databazën dështoi: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
