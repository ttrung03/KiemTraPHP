<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Test1</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=SinhVienController&action=list">Sinh Viên</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=HocPhanController&action=list">Học Phần</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=DangKyController&action=list">Đăng Kí <span class="badge bg-light text-dark">(0)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=AuthController&action=login">Đăng Nhập</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
