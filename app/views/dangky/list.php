<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký Học Phần</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <?php require_once __DIR__ . '/../../shares/navbar.php'; ?>

    <div class="container mt-5">
        <h2>Đăng Ký Học Phần</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mã HP</th>
                    <th>Tên Học Phần</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $tongTinChi = 0;
                foreach ($hocPhanList as $hp): 
                    $tongTinChi += $hp['SoTinChi'];
                ?>
                    <tr>
                        <td><?= htmlspecialchars($hp['MaHP']) ?></td>
                        <td><?= htmlspecialchars($hp['TenHP']) ?></td>
                        <td><?= htmlspecialchars($hp['SoTinChi']) ?></td>
                        <td>
                            <a href="index.php?controller=DangKyController&action=xoaHocPhan&id=<?= $hp['MaHP'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><strong>Số học phần:</strong> <?= count($hocPhanList) ?></p>
        <p><strong>Tổng số tín chỉ:</strong> <?= $tongTinChi ?></p>
        <a href="index.php?controller=DangKyController&action=xoaTatCaHocPhan" class="btn btn-warning">Xóa Đăng Ký</a>
    </div>
</body>
</html>
