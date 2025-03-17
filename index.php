<?php
// Bật hiển thị lỗi để debug (Chỉ bật khi phát triển, không nên dùng trên server thật)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kết nối database
require_once 'app/config/database.php';

// Lấy controller và action từ URL, nếu không có thì mặc định là `SinhVienController@list`
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'SinhVienController';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Xác định đường dẫn controller
$controllerPath = "app/controllers/$controllerName.php";

// Kiểm tra controller có tồn tại không
if (!file_exists($controllerPath)) {
    die(" Lỗi: Controller không tồn tại - $controllerName");
}

// Gọi controller
require_once $controllerPath;

// Kiểm tra class có tồn tại không
if (!class_exists($controllerName)) {
    die(" Lỗi: Class không tồn tại - $controllerName");
}

// Khởi tạo controller
$controllerInstance = new $controllerName();

// Kiểm tra action có tồn tại trong controller không
if (!method_exists($controllerInstance, $action)) {
    die(" Lỗi: Action không tồn tại - $action");
}

// Gọi action tương ứng
$controllerInstance->$action();
?>
