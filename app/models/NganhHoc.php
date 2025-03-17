<?php
require_once __DIR__ . '/../config/database.php';

class NganhHoc {
    private $conn;
    private $table = "NganhHoc";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // 📌 Lấy toàn bộ danh sách ngành học
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 📌 Kiểm tra xem mã ngành có tồn tại không
    public function isExist($maNganh) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM " . $this->table . " WHERE MaNganh = :maNganh");
        $stmt->execute(['maNganh' => $maNganh]);
        return $stmt->fetchColumn() > 0;
    }
}
?>
