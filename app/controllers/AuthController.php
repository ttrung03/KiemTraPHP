<?php
session_start();
require_once __DIR__ . '/../models/SinhVien.php';

class AuthController {
    private $sinhVienModel;

    public function __construct() {
        $this->sinhVienModel = new SinhVien();
    }

    // 📌 Hiển thị form đăng nhập
    public function login() {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    // 📌 Xử lý đăng nhập & chuyển hướng đến trang học phần
    public function authenticate() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_POST['maSV'];
            $sinhVien = $this->sinhVienModel->checkMSSV($maSV);
    
            if ($sinhVien) {
                // 🔹 Lưu thông tin sinh viên vào SESSION
                $_SESSION['user'] = $sinhVien;
                $_SESSION['maSV'] = $sinhVien['MaSV']; // Lưu MSSV để dùng sau này
                header("Location: index.php?controller=HocPhanController&action=list"); // 🚀 Chuyển hướng đến học phần
                exit();
            } else {
                $_SESSION['error'] = "Mã sinh viên không tồn tại!";
                header("Location: index.php?controller=AuthController&action=login");
                exit();
            }
        }
    }

    // 📌 Đăng xuất
    public function logout() {
        session_destroy();
        header("Location: index.php?controller=AuthController&action=login");
        exit();
    }
}
?>
