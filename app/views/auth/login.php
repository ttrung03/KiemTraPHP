<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <?php require_once __DIR__ . '/../../shares/navbar.php'; ?>

    <div class="container mt-5">
        <h2>ĐĂNG NHẬP</h2>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="index.php?controller=AuthController&action=authenticate" method="POST">
            <div class="mb-3">
                <label class="form-label">MSSV</label>
                <input type="text" name="maSV" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>
