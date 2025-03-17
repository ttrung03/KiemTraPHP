<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác Nhận Xóa Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Xóa Sinh Viên</h2>
        <p>Bạn có chắc chắn muốn xóa sinh viên <strong><?= htmlspecialchars($sinhVien['HoTen']) ?></strong> không?</p>
        <table class="table table-bordered">
            <tr>
                <th>Mã Sinh Viên</th>
                <td><?= htmlspecialchars($sinhVien['MaSV']) ?></td>
            </tr>
            <tr>
                <th>Họ Tên</th>
                <td><?= htmlspecialchars($sinhVien['HoTen']) ?></td>
            </tr>
            <tr>
                <th>Ngành Học</th>
                <td><?= htmlspecialchars($sinhVien['MaNganh']) ?></td>
            </tr>
            <tr>
                <th>Hình Ảnh</th>
                <td>
                    <?php if (!empty($sinhVien['Hinh'])): ?>
                        <img src="<?= htmlspecialchars($sinhVien['Hinh']) ?>" width="120">
                    <?php else: ?>
                        <span class="text-muted">Không có ảnh</span>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <form action="index.php?controller=SinhVienController&action=destroy" method="POST">
            <input type="hidden" name="maSV" value="<?= htmlspecialchars($sinhVien['MaSV']) ?>">
            <button type="submit" class="btn btn-danger">🗑️ Xóa</button>
            <a href="index.php?controller=SinhVienController&action=list" class="btn btn-secondary">🔙 Quay lại</a>
        </form>
    </div>
</body>
</html>
