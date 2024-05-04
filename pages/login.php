<?php
    require_once('./process/process_login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="icon" href="../img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/general.css">
</head>

<body>
    <div class="wrapper d-flex justify-content-center align-items-center vh-100" style="background-color: var(--ground-color);">
        <div class="container p-3 bg-white rounded py-5" style="width: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center">Đăng nhập</h2>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="loginAccount" class="form-label">Tài khoản</label>
                    <input type="text" class="form-control" id="loginAccount" name="loginAccount" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="btnLogin" class="btn btn-primary">Đăng nhập</button>
                    <h4 class="error py-2"><?php echo $errorName ?></h4>
                    <a href="./register.php">Chưa có tài khoản? Đăng ký ngay</a>
                </div>
            </form>
        </div>

</body>

</html>