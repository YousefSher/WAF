<?php
require_once __DIR__ . '/../Database/db.php';

class Course {
    private $conn;
    private $table = 'course';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function search($term) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE title LIKE :term';
        
        $stmt = $this->conn->prepare($query);

        $searchTerm = "%" . $term . "%";
        $stmt->bindParam(':term', $searchTerm);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}