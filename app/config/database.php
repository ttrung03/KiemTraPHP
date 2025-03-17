<?php
class Database {
    private $host = "localhost"; // Nếu dùng Laragon thì giữ nguyên
    private $db_name = "test1";  // Đảm bảo database 'test1' tồn tại
    private $username = "root";  // Mặc định của Laragon/XAMPP
    private $password = "";      // Mặc định của Laragon là rỗng (XAMPP cũng vậy)
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối: " . $e->getMessage()); // Hiển thị lỗi chi tiết
        }
        return $this->conn;
    }
}
?>
