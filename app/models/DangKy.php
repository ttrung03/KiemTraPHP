<?php
require_once __DIR__ . '/../config/database.php';

class DangKy {
    private $conn;
    private $table = "DangKy";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    //  Lấy danh sách học phần mà sinh viên đã đăng ký
    public function getHocPhanBySinhVien($maSV) {
        $stmt = $this->conn->prepare("SELECT dk.MaHP, hp.TenHP, hp.SoTinChi 
                                      FROM ChiTietDangKy dk
                                      JOIN HocPhan hp ON dk.MaHP = hp.MaHP
                                      WHERE dk.MaSV = :maSV");
        $stmt->execute(['maSV' => $maSV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //  Đăng ký học phần mới
    public function dangKyHocPhan($maSV, $maHP) {
        $stmt = $this->conn->prepare("INSERT INTO ChiTietDangKy (MaSV, MaHP) VALUES (:maSV, :maHP)");
        return $stmt->execute(['maSV' => $maSV, 'maHP' => $maHP]);
    }
    
    

    // Xóa một học phần khỏi danh sách đăng ký
    public function xoaHocPhan($maSV, $maHP) {
        $stmt = $this->conn->prepare("DELETE FROM ChiTietDangKy WHERE MaSV = :maSV AND MaHP = :maHP");
        return $stmt->execute(['maSV' => $maSV, 'maHP' => $maHP]);
    }

    //  Xóa toàn bộ học phần của sinh viên
    public function xoaTatCaHocPhan($maSV) {
        $stmt = $this->conn->prepare("DELETE FROM ChiTietDangKy WHERE MaSV = :maSV");
        return $stmt->execute(['maSV' => $maSV]);
    }

    public function kiemTraHocPhan($maSV, $maHP) {
        $stmt = $this->conn->prepare("SELECT * FROM ChiTietDangKy WHERE MaSV = :maSV AND MaHP = :maHP");
        $stmt->execute(['maSV' => $maSV, 'maHP' => $maHP]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
    
}
?>
