<?php
require_once __DIR__ . '/../config/database.php';

class SinhVien {
    private $conn;
    private $table = "SinhVien";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($maSV) {
        $stmt = $this->conn->prepare("SELECT sv.*, nh.TenNganh FROM " . $this->table . " sv 
                                      JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh 
                                      WHERE MaSV = :maSV");
        $stmt->execute(['maSV' => $maSV]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function themSinhVien($data) {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                                      VALUES (:maSV, :hoTen, :gioiTinh, :ngaySinh, :hinh, :maNganh)");
        return $stmt->execute($data);
    }


    
    //  Cập nhật thông tin sinh viên
    public function update($data) {
        try {
            $stmt = $this->conn->prepare("UPDATE " . $this->table . " 
                                          SET HoTen = :hoTen, GioiTinh = :gioiTinh, NgaySinh = :ngaySinh, Hinh = :hinh, MaNganh = :maNganh 
                                          WHERE MaSV = :maSV");
            return $stmt->execute($data);
        } catch (PDOException $e) {
            die(" Lỗi khi cập nhật sinh viên: " . $e->getMessage());
        }
    }

    public function delete($maSV) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE MaSV = :maSV");
            return $stmt->execute(['maSV' => $maSV]);
        } catch (PDOException $e) {
            die(" Lỗi khi xóa sinh viên: " . $e->getMessage());
        }
    }

    public function checkMSSV($maSV) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE MaSV = :maSV");
        $stmt->execute(['maSV' => $maSV]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
