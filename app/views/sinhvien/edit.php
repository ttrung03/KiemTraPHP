<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh Sửa Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Chỉnh Sửa Thông Tin Sinh Viên</h2>
        <form action="index.php?controller=SinhVienController&action=update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="maSV" value="<?= htmlspecialchars($sinhVien['MaSV']) ?>">
            <input type="hidden" name="hinhCu" value="<?= htmlspecialchars($sinhVien['Hinh']) ?>">

            <div class="mb-3">
                <label class="form-label">Họ Tên</label>
                <input type="text" name="hoTen" class="form-control" value="<?= htmlspecialchars($sinhVien['HoTen']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giới Tính</label>
                <select name="gioiTinh" class="form-control">
                    <option value="Nam" <?= ($sinhVien['GioiTinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
                    <option value="Nữ" <?= ($sinhVien['GioiTinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày Sinh</label>
                <input type="date" name="ngaySinh" class="form-control" value="<?= htmlspecialchars($sinhVien['NgaySinh']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh hiện tại</label><br>
                <?php if (!empty($sinhVien['Hinh'])): ?>
                    <img src="<?= htmlspecialchars($sinhVien['Hinh']) ?>" width="100">
                <?php else: ?>
                    <span class="text-muted">Chưa có ảnh</span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Chọn ảnh mới (nếu có)</label>
                <input type="file" name="hinh" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Mã Ngành</label>
                <select name="maNganh" class="form-control">
                    <?php foreach ($dsNganh as $nganh) : ?>
                        <option value="<?= $nganh['MaNganh'] ?>" <?= ($sinhVien['MaNganh'] == $nganh['MaNganh']) ? 'selected' : '' ?>>
                            <?= $nganh['TenNganh'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
            <a href="index.php?controller=SinhVienController&action=list" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
