<?php
require_once __DIR__ . '/../../../app/models/SinhVien.php';
$sinhVienModel = new SinhVien();
$sinhVienList = $sinhVienModel->getAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<?php require_once __DIR__ . '/../../shares/navbar.php'; ?>
    <div class="container mt-5">
        <h2 class="mb-4">Quản Lý Sinh Viên</h2>

        <!-- Nút Thêm Sinh Viên -->
        <a href="index.php?controller=SinhVienController&action=create" class="btn btn-success mb-3">➕ Thêm Sinh Viên</a>

        <!-- Kiểm tra danh sách sinh viên -->
        <?php if (empty($sinhVienList)) : ?>
            <div class="alert alert-warning">Chưa có sinh viên nào trong danh sách!</div>
        <?php else : ?>

        <!-- Bảng danh sách sinh viên -->
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Mã SV</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Hình Ảnh</th>
                    <th>Ngành</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sinhVienList as $sv) : ?>
                    <tr>
                        <td><?= htmlspecialchars($sv['MaSV']) ?></td>
                        <td><?= htmlspecialchars($sv['HoTen']) ?></td>
                        <td><?= htmlspecialchars($sv['GioiTinh']) ?></td>
                        <td><?= date("d/m/Y", strtotime($sv['NgaySinh'])) ?></td>
                        <td>
                            <?php if (!empty($sv['Hinh'])) : ?>
                                <img src="<?= htmlspecialchars($sv['Hinh']) ?>" width="60" height="60" class="rounded">
                            <?php else : ?>
                                <span class="text-muted">Không có ảnh</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($sv['MaNganh']) ?></td>
                        <td>
                            <a href="index.php?controller=SinhVienController&action=detail&id=<?= $sv['MaSV'] ?>" class="btn btn-info btn-sm">📄 Xem</a>
                            <a href="index.php?controller=SinhVienController&action=edit&id=<?= $sv['MaSV'] ?>" class="btn btn-warning btn-sm">✏️ Sửa</a>
                            <a href="index.php?controller=SinhVienController&action=delete&id=<?= $sv['MaSV'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">🗑️ Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</body>
</html>
