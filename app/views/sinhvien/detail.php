<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Chi Tiết Sinh Viên</h2>
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
                <th>Giới Tính</th>
                <td><?= htmlspecialchars($sinhVien['GioiTinh']) ?></td>
            </tr>
            <tr>
                <th>Ngày Sinh</th>
                <td><?= date("d/m/Y", strtotime($sinhVien['NgaySinh'])) ?></td>
            </tr>
            <tr>
                <th>Ngành Học</th>
                <td><?= htmlspecialchars($sinhVien['TenNganh']) ?></td>
            </tr>
            <tr>
                <th>Hình Ảnh</th>
                <td>
                    <?php if (!empty($sinhVien['Hinh'])): ?>
                        <img src="<?= htmlspecialchars($sinhVien['Hinh']) ?>" width="120">
                    <?php else: ?>
                        <span class="text-muted">Chưa có ảnh</span>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <a href="index.php?controller=SinhVienController&action=list" class="btn btn-secondary"> Quay lại</a>
    </div>
</body>
</html>
