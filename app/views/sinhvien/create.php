<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<?php require_once __DIR__ . '/../../shares/navbar.php'; ?>
    <div class="container mt-5">
        <h2>Thêm Sinh Viên</h2>
        <form action="index.php?controller=SinhVienController&action=store" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Mã Sinh Viên</label>
                <input type="text" name="maSV" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Họ Tên</label>
                <input type="text" name="hoTen" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giới Tính</label>
                <select name="gioiTinh" class="form-control" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày Sinh</label>
                <input type="date" name="ngaySinh" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" name="hinh" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Mã Ngành</label>
                <input type="text" name="maNganh" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="index.php?controller=SinhVienController&action=list" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
