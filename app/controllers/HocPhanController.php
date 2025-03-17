<?php
require_once __DIR__ . '/../models/HocPhan.php';

class HocPhanController {
    private $hocPhanModel;

    public function __construct() {
        $this->hocPhanModel = new HocPhan();
    }

    //  Hiển thị danh sách học phần
    public function list() {
        $hocPhanList = $this->hocPhanModel->getAll();
        require_once __DIR__ . '/../views/hocphan/list.php';
    }

    //  Hiển thị form thêm học phần
    // public function create() {
    //     require_once __DIR__ . '/../views/hocphan/create.php';
    // }

    //  Xử lý thêm học phần mới
    // public function store() {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $data = [
    //             'maHP' => $_POST['maHP'],
    //             'tenHP' => $_POST['tenHP'],
    //             'soTinChi' => $_POST['soTinChi']
    //         ];
    //         $this->hocPhanModel->themHocPhan($data);
    //         header("Location: index.php?controller=HocPhanController&action=list");
    //         exit();
    //     }
    // }
}
?>
