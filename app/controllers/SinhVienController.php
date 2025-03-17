<?php
require_once __DIR__ . '/../models/SinhVien.php';
require_once __DIR__ . '/../models/NganhHoc.php'; // 

class SinhVienController {
    private $sinhVienModel;
    private $nganhHocModel; //  Thêm biến này

    public function __construct() {
        $this->sinhVienModel = new SinhVien();
        $this->nganhHocModel = new NganhHoc(); //  Khởi tạo đối tượng NganhHoc
    }

    public function list() {
        $sinhVienList = $this->sinhVienModel->getAll();
        require_once __DIR__ . '/../views/sinhvien/list.php';
    }

    public function create() {
        $dsNganh = $this->nganhHocModel->getAll(); //  Lấy danh sách ngành khi thêm
        require_once __DIR__ . '/../views/sinhvien/create.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $uploadDir = "uploads/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Xử lý upload ảnh
            $hinh = "";
            if (!empty($_FILES['hinh']['name'])) {
                $fileName = time() . "_" . basename($_FILES['hinh']['name']);
                $targetPath = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $targetPath)) {
                    $hinh = $targetPath;
                }
            }

            // Lấy dữ liệu từ form
            $data = [
                'maSV' => $_POST['maSV'],
                'hoTen' => $_POST['hoTen'],
                'gioiTinh' => $_POST['gioiTinh'],
                'ngaySinh' => $_POST['ngaySinh'],
                'hinh' => $hinh,
                'maNganh' => $_POST['maNganh']
            ];

            $this->sinhVienModel->themSinhVien($data);
            header("Location: index.php?controller=SinhVienController&action=list");
            exit();
        }
    }

    public function edit() {
        if (!isset($_GET['id'])) {
            die("Lỗi: Thiếu mã sinh viên!");
        }

        $maSV = $_GET['id'];
        $sinhVien = $this->sinhVienModel->getById($maSV);
        $dsNganh = $this->nganhHocModel->getAll(); // 📌 Lấy danh sách ngành để hiển thị trong form sửa

        if (!$sinhVien) {
            die("Không tìm thấy sinh viên!");
        }

        require_once __DIR__ . '/../views/sinhvien/edit.php';
    }

    public function update() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSV = $_POST['maSV'];
            $hinhCu = $_POST['hinhCu']; // Ảnh cũ nếu không thay đổi

            // Xử lý upload ảnh mới nếu có
            $uploadDir = "uploads/";
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $hinh = $hinhCu;
            if (!empty($_FILES['hinh']['name'])) {
                $fileName = time() . "_" . basename($_FILES['hinh']['name']);
                $targetPath = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $targetPath)) {
                    $hinh = $targetPath;
                }
            }

            // Cập nhật vào database
            $data = [
                'maSV' => $maSV,
                'hoTen' => $_POST['hoTen'],
                'gioiTinh' => $_POST['gioiTinh'],
                'ngaySinh' => $_POST['ngaySinh'],
                'hinh' => $hinh,
                'maNganh' => $_POST['maNganh']
            ];

            $this->sinhVienModel->update($data);
            header("Location: index.php?controller=SinhVienController&action=list");
            exit();
        }
    }

    public function detail() {
        $sinhVien = $this->sinhVienModel->getById($_GET['id']);
        require_once __DIR__ . '/../views/sinhvien/detail.php';
    }

    public function delete() {
        if (!isset($_GET['id'])) {
            die("Lỗi: Thiếu mã sinh viên!");
        }
    
        $maSV = $_GET['id'];
        $sinhVien = $this->sinhVienModel->getById($maSV);
    
        if (!$sinhVien) {
            die("Không tìm thấy sinh viên!");
        }
    
        require_once __DIR__ . '/../views/sinhvien/delete.php';
    }
    
    public function destroy() {
        if (!isset($_POST['maSV'])) {
            die("Lỗi: Không có mã sinh viên để xóa!");
        }
    
        $maSV = $_POST['maSV'];
        $this->sinhVienModel->delete($maSV);
    
        // Chuyển hướng về danh sách sau khi xóa
        header("Location: index.php?controller=SinhVienController&action=list");
        exit();
    }
    
}
?>
