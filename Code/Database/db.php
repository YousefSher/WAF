<?php 
class Database {
    // DB Parameters
    // CHANGE THESE to match your local database credentials
    private $host = 'localhost';
    private $db_name = 'courses_db'; // Replace with your actual database name
    private $username = 'root';          // Default for XAMPP/WAMP is often 'root'
    private $password = '';              // Default for XAMPP is empty, MAMP is 'root'
    private $conn;

    // DB Connect
    public function connect() {
        $this->conn = null;

        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
            
            // Create PDO instance
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            // Set Error Mode to Exception
            // This is useful for development. In a real secure app, you might disable this 
            // to prevent "Information Disclosure" vulnerabilities, but for WAF testing, 
            // seeing the errors helps you know if your SQL injection worked.
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}