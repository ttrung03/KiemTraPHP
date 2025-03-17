<?php
require_once __DIR__ . '/../config/database.php';

class HocPhan {
    private $conn;
    private $table = "HocPhan";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // 📌 Lấy danh sách tất cả học phần
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 📌 Thêm học phần mới
    public function themHocPhan($data) {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (MaHP, TenHP, SoTinChi) 
                                      VALUES (:maHP, :tenHP, :soTinChi)");
        return $stmt->execute($data);
    }
}
?>
