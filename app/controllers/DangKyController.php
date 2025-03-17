<?php
session_start();
require_once __DIR__ . '/../models/DangKy.php';

class DangKyController {
    private $dangKyModel;

    public function __construct() {
        $this->dangKyModel = new DangKy();
    }

    // Hiển thị danh sách học phần đã đăng ký
    public function list() {
        if (!isset($_SESSION['maSV'])) {
            header("Location: index.php?controller=AuthController&action=login");
            exit();
        }
    
        $maSV = $_SESSION['maSV'];
        $hocPhanList = $this->dangKyModel->getHocPhanBySinhVien($maSV);
        require_once __DIR__ . '/../views/dangky/list.php';
    }
    

    // Đăng ký học phần
    public function dangKy() {
        if (!isset($_SESSION['maSV']) || !isset($_GET['id'])) {
            header("Location: index.php?controller=HocPhanController&action=list");
            exit();
        }
    
        $maSV = $_SESSION['maSV']; // 🔹 Lấy MSSV từ SESSION
        $maHP = $_GET['id'];
    
        if (empty($maSV) || empty($maHP)) {
            die("Lỗi: Không có Mã Sinh Viên hoặc Mã Học Phần!");
        }
    
        // 🔹 Kiểm tra xem sinh viên đã đăng ký học phần này chưa
        if ($this->dangKyModel->kiemTraHocPhan($maSV, $maHP)) {
            $_SESSION['error'] = "Bạn đã đăng ký học phần này rồi!";
        } else {
            $this->dangKyModel->dangKyHocPhan($maSV, $maHP);
            $_SESSION['success'] = "Đăng ký thành công!";
        }
    
        header("Location: index.php?controller=DangKyController&action=list");
        exit();
    }
    
    


    // Xóa một học phần khỏi đăng ký
    public function xoaHocPhan() {
        if (!isset($_SESSION['user']) || !isset($_GET['id'])) {
            header("Location: index.php?controller=DangKyController&action=list");
            exit();
        }

        $maSV = $_SESSION['user']['MaSV'];
        $maHP = $_GET['id'];
        $this->dangKyModel->xoaHocPhan($maSV, $maHP);

        header("Location: index.php?controller=DangKyController&action=list");
        exit();
    }

    // Xóa toàn bộ học phần đã đăng ký
    public function xoaTatCaHocPhan() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=DangKyController&action=list");
            exit();
        }

        $maSV = $_SESSION['user']['MaSV'];
        $this->dangKyModel->xoaTatCaHocPhan($maSV);

        header("Location: index.php?controller=DangKyController&action=list");
        exit();
    }
}
?>
